<?php
declare(strict_types=1);

final class BookController {

  public static function home(): void {
    $pdo = DB::pdo();
    $books = $pdo->query("SELECT * FROM books ORDER BY book_id DESC LIMIT 12")->fetchAll();
    view('catalog/home', ['books' => $books]);
  }

  public static function view(): void {
    $id = (int)($_GET['id'] ?? 0);
    if ($id <= 0) redirect_route('/');

    $pdo = DB::pdo();
    $stmt = $pdo->prepare("SELECT * FROM books WHERE book_id = ?");
    $stmt->execute([$id]);
    $book = $stmt->fetch();

    if (!$book) redirect_route('/');

    view('catalog/book', ['book' => $book]);
  }

  public static function search(): void {
    $qraw = trim($_GET['q'] ?? '');
    $q = '%' . $qraw . '%';

    $pdo = DB::pdo();
    $stmt = $pdo->prepare("SELECT * FROM books WHERE title LIKE ? OR author LIKE ? OR isbn LIKE ? LIMIT 50");
    $stmt->execute([$q, $q, $q]);

    $books = $stmt->fetchAll();
    view('catalog/search', ['books' => $books, 'q' => $qraw]);
  }
}
