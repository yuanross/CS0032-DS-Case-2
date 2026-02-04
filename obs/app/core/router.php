<?php
declare(strict_types=1);

final class Router {
  private array $routes = ['GET' => [], 'POST' => []];

  private function normalize(string $route): string {
    $route = trim($route);
    if ($route === '' || $route === '/') return '/';
    $route = '/' . ltrim($route, '/');   // force leading slash
    return $route;
  }

  public function get(string $route, callable $handler): void {
    $this->routes['GET'][$this->normalize($route)] = $handler;
  }

  public function post(string $route, callable $handler): void {
    $this->routes['POST'][$this->normalize($route)] = $handler;
  }

  public function dispatch(string $route): void {
    $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
    $route = $this->normalize($route);

    $handler = $this->routes[$method][$route] ?? null;

    if (!$handler) {
      http_response_code(404);
      view('errors/404', ['route' => $route]);
      return;
    }

    try {
      $handler();
    } catch (Throwable $e) {
      log_error("Exception: {$e->getMessage()} in {$e->getFile()}:{$e->getLine()}");
      http_response_code(500);
      echo "Internal Server Error";
    }
  }
}
