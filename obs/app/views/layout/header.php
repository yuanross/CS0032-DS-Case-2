<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>OBS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="/">OBS</a>

  <form class="d-flex" method="get" action="/">
    <input type="hidden" name="r" value="search">
    <input class="form-control form-control-sm me-2" name="q" placeholder="Search title, author, ISBN">
    <button class="btn btn-sm btn-outline-light">Search</button>
  </form>

  <div class="ms-3">
    <?php if (Auth::check()): ?>
      <span class="text-white me-2"><?= e(Auth::user()['email']) ?></span>
      <a class="btn btn-sm btn-outline-light" href="/?r=logout">Logout</a>
    <?php else: ?>
      <a class="btn btn-sm btn-outline-light" href="/?r=login">Login</a>
      <a class="btn btn-sm btn-outline-light" href="/?r=register">Register</a>
    <?php endif; ?>
  </div>
</nav>

<div class="container mt-4">
