<?php
declare(strict_types=1);

function e(string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function base_url(): string {
  // Hard-set base path so it NEVER goes to localhost root
  // Your app lives here in XAMPP:
  // http://localhost/CS0032-DS-Case-2/obs/public/
  return '/CS0032-DS-Case-2/obs/public';
}

function url(string $route = '/', array $params = []): string {
  $base = rtrim(base_url(), '/');

  if ($route === '/' || $route === '') {
    return $base . '/';
  }

  $params = array_merge(['r' => $route], $params);
  return $base . '/?' . http_build_query($params);
}

function redirect(string $absoluteOrRelative): void {
  header("Location: $absoluteOrRelative");
  exit;
}

function redirect_route(string $route = '/', array $params = []): void {
  redirect(url($route, $params));
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
