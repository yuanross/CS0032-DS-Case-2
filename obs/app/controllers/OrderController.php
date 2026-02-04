<?php
declare(strict_types=1);

final class OrderController {

  private static function cartItemsAndTotals(): array {
    $cart = $_SESSION['cart'] ?? [];
    if (!$cart) return ['items' => [], 'subtotal' => 0.0, 'tax' => 0.0, 'total' => 0.0];

    $pdo = DB::pdo();
    $ids = array_keys($cart);
    $placeholders = implode(',', array_fill(0, count($ids), '?'));

    $stmt = $pdo->prepare("SELECT * FROM books WHERE book_id IN ($placeholders)");
    $stmt->execute($ids);
    $books = $stmt->fetchAll();

    $items = [];
    $subtotal = 0.0;

    foreach ($books as $b) {
      $id = (int)$b['book_id'];
      $qty = (int)($cart[$id] ?? 0);
      if ($qty <= 0) continue;

      $line = (float)$b['price'] * $qty;
      $subtotal += $line;

      $items[] = [
        'book_id' => $id,
        'title' => $b['title'],
        'unit_price' => (float)$b['price'],
        'qty' => $qty,
        'line_total' => $line,
      ];
    }

    $tax = round($subtotal * 0.12, 2);
    $total = round($subtotal + $tax, 2);

    return ['items' => $items, 'subtotal' => $subtotal, 'tax' => $tax, 'total' => $total];
  }

  public static function checkoutForm(): void {
    Auth::requireLogin();

    $data = self::cartItemsAndTotals();
    if (!$data['items']) redirect_route('cart');

    view('orders/checkout', $data);
  }

  public static function placeOrder(): void {
    Auth::requireLogin();

    $shippingName = trim($_POST['shipping_name'] ?? '');
    $street = trim($_POST['shipping_street'] ?? '');
    $barangay = trim($_POST['shipping_barangay'] ?? '');
    $city = trim($_POST['shipping_city'] ?? '');
    $postal = trim($_POST['shipping_postal_code'] ?? '');
    $phone = trim($_POST['shipping_phone'] ?? '');

    if ($shippingName === '' || $street === '' || $barangay === '' || $city === '' || $postal === '' || $phone === '') {
      redirect_route('checkout');
    }

    $data = self::cartItemsAndTotals();
    if (!$data['items']) redirect_route('cart');

    // Keep the old shipping_address field for display/compatibility
    $shippingAddress = "{$street}, Brgy. {$barangay}, {$city}, {$postal} | Phone: {$phone}";

    $pdo = DB::pdo();

    try {
      $pdo->beginTransaction();

      $stmt = $pdo->prepare(
        "INSERT INTO orders
          (user_id, status, subtotal, tax, total, shipping_name, shipping_street, shipping_barangay, shipping_city, shipping_postal_code, shipping_phone, shipping_address)
         VALUES
          (?, 'Processing', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
      );

      $stmt->execute([
        Auth::user()['user_id'],
        $data['subtotal'],
        $data['tax'],
        $data['total'],
        $shippingName,
        $street,
        $barangay,
        $city,
        $postal,
        $phone,
        $shippingAddress
      ]);

      $orderId = (int)$pdo->lastInsertId();

      $itemStmt = $pdo->prepare(
        "INSERT INTO order_items (order_id, book_id, unit_price, quantity, line_total)
         VALUES (?, ?, ?, ?, ?)"
      );

      foreach ($data['items'] as $it) {
        $itemStmt->execute([
          $orderId,
          $it['book_id'],
          $it['unit_price'],
          $it['qty'],
          $it['line_total'],
        ]);
      }

      $pdo->commit();
      unset($_SESSION['cart']);

      redirect_route('my_orders');

    } catch (Throwable $e) {
      $pdo->rollBack();
      log_error("Order failed: {$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
      echo "Order failed. Please try again.";
      exit;
    }
  }

  public static function myOrders(): void {
    Auth::requireLogin();

    $pdo = DB::pdo();
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY order_id DESC");
    $stmt->execute([Auth::user()['user_id']]);
    $orders = $stmt->fetchAll();

    view('orders/my_orders', ['orders' => $orders]);
  }
}
