<?php
declare(strict_types=1);

final class Auth {
  public static function check(): bool {
    return isset($_SESSION['user']);
  }

  public static function user(): ?array {
    return $_SESSION['user'] ?? null;
  }

  public static function login(array $user): void {
    $_SESSION['user'] = [
      'user_id' => $user['user_id'],
      'email' => $user['email'],
      'role' => $user['role'],
    ];
  }

  public static function logout(): void {
    unset($_SESSION['user']);
  }

  public static function requireLogin(): void {
    if (!self::check()) {
      redirect_route('login');
    }
  }

  public static function requireAdmin(): void {
    self::requireLogin();
    if ((self::user()['role'] ?? '') !== 'admin') {
      http_response_code(403);
      echo "403 Forbidden";
      exit;
    }
  }
}
