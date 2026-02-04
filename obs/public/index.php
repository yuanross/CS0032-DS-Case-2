<?php
declare(strict_types=1);

session_start();

/*
 |-----------------------------------------------------------
 | Load .env (simple loader – no composer)
 |-----------------------------------------------------------
*/
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
  foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
    if (str_starts_with(trim($line), '#')) continue;
    if (!str_contains($line, '=')) continue;
    [$key, $value] = explode('=', $line, 2);
    putenv(trim($key) . '=' . trim($value));
  }
}

/*
 |-----------------------------------------------------------
 | Core includes
 |-----------------------------------------------------------
*/
require __DIR__ . '/../app/core/helpers.php';
require __DIR__ . '/../app/core/db.php';
require __DIR__ . '/../app/core/auth.php';
require __DIR__ . '/../app/core/router.php';

/*
 |-----------------------------------------------------------
 | Controllers
 |-----------------------------------------------------------
*/
require __DIR__ . '/../app/controllers/AuthController.php';
require __DIR__ . '/../app/controllers/BookController.php';

/*
 |-----------------------------------------------------------
 | Routing
 |-----------------------------------------------------------
*/
$router = new Router();

/* Public pages */
$router->get('/', fn() => BookController::home());
$router->get('/search', fn() => BookController::search());
$router->get('/book', fn() => BookController::view());

/* Auth */
$router->get('/login', fn() => AuthController::loginForm());
$router->post('/login', fn() => AuthController::login());
$router->get('/register', fn() => AuthController::registerForm());
$router->post('/register', fn() => AuthController::register());
$router->get('/logout', fn() => AuthController::logout());

/*
 |-----------------------------------------------------------
 | Dispatch
 |-----------------------------------------------------------
*/
$route = $_GET['r'] ?? '/';
$router->dispatch($route);
