<?php
declare(strict_types=1);

session_start();

/* Load .env */
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
  foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
    $line = trim($line);
    if ($line === '' || str_starts_with($line, '#')) continue;
    if (!str_contains($line, '=')) continue;
    [$k, $v] = explode('=', $line, 2);
    putenv(trim($k) . '=' . trim($v));
  }
}

/* Core */
require_once __DIR__ . '/../app/core/helpers.php';
require_once __DIR__ . '/../app/core/db.php';
require_once __DIR__ . '/../app/core/auth.php';
require_once __DIR__ . '/../app/core/router.php';

/* Controllers */
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/BookController.php';
require_once __DIR__ . '/../app/controllers/CartController.php';
require_once __DIR__ . '/../app/controllers/OrderController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';

/* Router */
$router = new Router();

/* Catalog */
$router->get('browse', fn() => BookController::browse());
$router->get('/', fn() => BookController::home());
$router->get('book', fn() => BookController::view());
$router->get('search', fn() => BookController::search());

/* Auth */
$router->get('login', fn() => AuthController::loginForm());
$router->post('login', fn() => AuthController::login());
$router->get('register', fn() => AuthController::registerForm());
$router->post('register', fn() => AuthController::register());
$router->get('logout', fn() => AuthController::logout());


/* Cart */
$router->get('cart', fn() => CartController::index());
$router->post('cart_add', fn() => CartController::add());
$router->post('cart_update', fn() => CartController::update());
$router->post('cart_remove', fn() => CartController::remove());
$router->get('cart_clear', fn() => CartController::clear());

/* Orders */
$router->get('checkout', fn() => OrderController::checkoutForm());
$router->post('place_order', fn() => OrderController::placeOrder());
$router->get('my_orders', fn() => OrderController::myOrders());

/* Admin */
$router->get('admin', fn() => AdminController::dashboard());
$router->get('admin_books', fn() => AdminController::books());
$router->post('admin_add_book', fn() => AdminController::addBook());
$router->post('admin_delete_book', fn() => AdminController::deleteBook());
$router->get('admin_orders', fn() => AdminController::orders());
$router->post('admin_update_order', fn() => AdminController::updateOrderStatus());

/* Dispatch */
$route = $_GET['r'] ?? '/';
$router->dispatch($route);
