<?php
declare(strict_types=1);

final class BookController {

  public static function home(): void {
    $pdo = DB::pdo();
    $books = $pdo->query("SELECT * FROM books ORDER BY book_id DESC LIMIT 8")->fetchAll();
    view('catalog/home', ['books' => $books]);
  }

  public static function browse(): void {
    $pdo = DB::pdo();

    $category = trim($_GET['category'] ?? '');
    $sort = trim($_GET['sort'] ?? 'newest');
    $min = $_GET['min'] ?? '';
    $max = $_GET['max'] ?? '';

    $where = [];
    $params = [];

    if ($category !== '') {
      $where[] = "category = ?";
      $params[] = $category;
    }
    if ($min !== '' && is_numeric($min)) {
      $where[] = "price >= ?";
      $params[] = (float)$min;
    }
    if ($max !== '' && is_numeric($max)) {
      $where[] = "price <= ?";
      $params[] = (float)$max;
    }

    $orderBy = "book_id DESC";
    if ($sort === 'price_low') $orderBy = "price ASC";
    if ($sort === 'price_high') $orderBy = "price DESC";

    $sql = "SELECT * FROM books";
    if ($where) $sql .= " WHERE " . implode(" AND ", $where);
    $sql .= " ORDER BY $orderBy LIMIT 50";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $books = $stmt->fetchAll();

    view('catalog/browse', [
      'books' => $books,
      'category' => $category,
      'sort' => $sort,
      'min' => $min,
      'max' => $max
    ]);
  }

  public static function view(): void {
    $id = (int)($_GET['id'] ?? 0);
    if ($id <= 0) redirect_route('/');

    $pdo = DB::pdo();
    $stmt = $pdo->prepare("SELECT * FROM books WHERE book_id = ?");
    $stmt->execute([$id]);
    $book = $stmt->fetch();

    if (!$book) redirect_route('/');

    // Related (same category)
    $related = [];
    if (!empty($book['category'])) {
      $r = $pdo->prepare("SELECT * FROM books WHERE category = ? AND book_id != ? ORDER BY book_id DESC LIMIT 6");
      $r->execute([$book['category'], $id]);
      $related = $r->fetchAll();
    }

    view('catalog/book', ['book' => $book, 'related' => $related]);
  }

  public static function search(): void {
    $qraw = trim($_GET['q'] ?? '');
    $q = '%' . $qraw . '%';

    $pdo = DB::pdo();
    $stmt = $pdo->prepare("
    SELECT * FROM books
    WHERE title LIKE ?
     OR author LIKE ?
     OR isbn LIKE ?
     OR category LIKE ?
    LIMIT 50
    ");
    $stmt->execute([$q, $q, $q, $q]);

    $books = $stmt->fetchAll();

    view('catalog/search', ['books' => $books, 'q' => $qraw]);
  }
}
