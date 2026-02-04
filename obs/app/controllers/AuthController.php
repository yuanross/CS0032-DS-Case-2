<?php
declare(strict_types=1);

final class AuthController {

  public static function loginForm(): void {
    view('auth/login');
  }

  public static function registerForm(): void {
    view('auth/register');
  }

  public static function register(): void {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
      redirect('/?r=register');
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);

    $pdo = DB::pdo();
    $stmt = $pdo->prepare(
      "INSERT INTO users (email, password_hash, role) VALUES (?, ?, 'customer')"
    );
    $stmt->execute([$email, $hash]);

    redirect('/?r=login');
  }

  public static function login(): void {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $pdo = DB::pdo();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password_hash'])) {
      redirect('/?r=login');
    }

    Auth::login($user);
    redirect('/');
  }

  public static function logout(): void {
    Auth::logout();
    redirect('/');
  }
}
