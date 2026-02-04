<?php
declare(strict_types=1);

final class AuthController {

  public static function loginForm(): void {
    view('auth/login');
  }

  public static function registerForm(): void {
    view('auth/register');
  }

  public static function login(): void {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
      redirect_route('login');
    }

    $pdo = DB::pdo();
    $stmt = $pdo->prepare("SELECT user_id, email, password_hash, role FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password_hash'])) {
      // simple behavior: go back to login
      redirect_route('login');
    }

    Auth::login($user);
    redirect_route('/'); // goes to Books page inside your base_url
  }

  public static function register(): void {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') redirect_route('register');

    $pdo = DB::pdo();
    $check = $pdo->prepare("SELECT user_id FROM users WHERE email = ?");
    $check->execute([$email]);
    if ($check->fetch()) redirect_route('register');

    $hash = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO users (email, password_hash, role) VALUES (?, ?, 'customer')");
    $stmt->execute([$email, $hash]);

    redirect_route('login');
  }

  public static function logout(): void {
    Auth::logout();
    redirect_route('/');
  }
}
