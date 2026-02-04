<?php
declare(strict_types=1);

function e(string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $path): void {
  header("Location: $path");
  exit;
}

function base_path(string $relative): string {
  return __DIR__ . '/../../' . ltrim($relative, '/');
}

function log_error(string $msg): void {
  $file = base_path('storage/logs/app.log');
  @file_put_contents($file, '['.date('Y-m-d H:i:s')."] $msg\n", FILE_APPEND);
}

function view(string $path, array $data = []): void {
  extract($data);
  require __DIR__ . '/../views/layout/header.php';
  require __DIR__ . '/../views/' . $path . '.php';
  require __DIR__ . '/../views/layout/footer.php';
}
