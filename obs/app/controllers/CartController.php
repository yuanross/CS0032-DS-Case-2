<?php
declare(strict_types=1);

final class CartController {

  private static function &cart(): array {
    if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
      $_SESSION['cart'] = []; // book_id => qty
    }
    return $_SESSION['cart'];
  }

  public static function index(): void {
    $cart = self::cart();
    $items = [];
    $subtotal = 0.0;

    if ($cart) {
      $pdo = DB::pdo();
      $ids = array_keys($cart);

      $placeholders = implode(',', array_fill(0, count($ids), '?'));
      $stmt = $pdo->prepare("SELECT * FROM books WHERE book_id IN ($placeholders)");
      $stmt->execute($ids);
      $books = $stmt->fetchAll();

      foreach ($books as $b) {
        $id = (int)$b['book_id'];
        $qty = (int)($cart[$id] ?? 0);
        if ($qty <= 0) continue;

        $line = (float)$b['price'] * $qty;
        $subtotal += $line;

        $items[] = [
          'book' => $b,
          'qty' => $qty,
          'line_total' => $line,
        ];
      }
    }

    $tax = round($subtotal * 0.12, 2);
    $total = round($subtotal + $tax, 2);

    view('cart/index', compact('items', 'subtotal', 'tax', 'total'));
  }

  public static function add(): void {
    $id = (int)($_POST['book_id'] ?? 0);
    $qty = (int)($_POST['qty'] ?? 1);

    if ($id > 0) {
      $qty = max(1, min($qty, 99));
      $cart = &self::cart();
      $cart[$id] = (int)($cart[$id] ?? 0) + $qty;
    }

    redirect_route('cart');
  }

  /**
   * ✅ Update Cart then go back to Books (home)
   */
  public static function update(): void {
    $cart = &self::cart();
    $updates = $_POST['qty'] ?? null;

    if (!is_array($updates)) {
      redirect_route('/'); // back to Books
    }

    foreach ($updates as $bookId => $qty) {
      $id = (int)$bookId;
      $q = (int)$qty;

      if ($id <= 0) continue;

      if ($q <= 0) {
        unset($cart[$id]); // remove item
      } else {
        $cart[$id] = min(max($q, 1), 99);
      }
    }

    redirect_route('/'); // ✅ back to Books tab
  }

  public static function remove(): void {
    $id = (int)($_POST['book_id'] ?? 0);
    $cart = &self::cart();

    if ($id > 0) unset($cart[$id]);

    redirect_route('cart');
  }

  public static function clear(): void {
    unset($_SESSION['cart']);
    redirect_route('cart');
  }
}
