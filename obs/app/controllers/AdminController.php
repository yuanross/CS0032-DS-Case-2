<?php
declare(strict_types=1);

final class AdminController {

  public static function dashboard(): void {
    Auth::requireAdmin();

    $pdo = DB::pdo();
    $bookCount = (int)$pdo->query("SELECT COUNT(*) AS c FROM books")->fetch()['c'];
    $orderCount = (int)$pdo->query("SELECT COUNT(*) AS c FROM orders")->fetch()['c'];

    view('admin/dashboard', [
      'bookCount' => $bookCount,
      'orderCount' => $orderCount,
    ]);
  }

  public static function books(): void {
    Auth::requireAdmin();

    $pdo = DB::pdo();
    $books = $pdo->query("SELECT * FROM books ORDER BY book_id DESC")->fetchAll();
    view('admin/books', ['books' => $books]);
  }

  public static function addBook(): void {
    Auth::requireAdmin();

    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $isbn = trim($_POST['isbn'] ?? '');
    $price = (float)($_POST['price'] ?? 0);
    $description = trim($_POST['description'] ?? '');

    if ($title === '' || $author === '' || $isbn === '' || $price <= 0) {
      redirect_route('admin_books');
    }

    $pdo = DB::pdo();
    $stmt = $pdo->prepare("INSERT INTO books (title, author, isbn, price, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $author, $isbn, $price, $description]);

    redirect_route('admin_books');
  }

  public static function deleteBook(): void {
    Auth::requireAdmin();

    $id = (int)($_POST['book_id'] ?? 0);
    if ($id <= 0) redirect_route('admin_books');

    $pdo = DB::pdo();
    $stmt = $pdo->prepare("DELETE FROM books WHERE book_id = ?");
    $stmt->execute([$id]);

    redirect_route('admin_books');
  }

  public static function orders(): void {
    Auth::requireAdmin();

    $pdo = DB::pdo();
    $orders = $pdo->query("
      SELECT o.*, u.email
      FROM orders o
      JOIN users u ON u.user_id = o.user_id
      ORDER BY o.order_id DESC
    ")->fetchAll();

    view('admin/orders', ['orders' => $orders]);
  }

  public static function updateOrderStatus(): void {
    Auth::requireAdmin();

    $orderId = (int)($_POST['order_id'] ?? 0);
    $status = trim($_POST['status'] ?? '');

    $allowed = ['Processing', 'Shipped', 'Delivered', 'Cancelled'];
    if ($orderId <= 0 || !in_array($status, $allowed, true)) {
      redirect_route('admin_orders');
    }

    $pdo = DB::pdo();
    $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE order_id = ?");
    $stmt->execute([$status, $orderId]);

    redirect_route('admin_orders');
  }
}
