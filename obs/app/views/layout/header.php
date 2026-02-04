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
  <a class="navbar-brand" href="<?= e(url('/')) ?>">OBS</a>

  <form class="d-flex" method="get" action="<?= e(url('/')) ?>" style="max-width:420px; width:100%;">
    <input type="hidden" name="r" value="search">
    <input class="form-control form-control-sm me-2" name="q" placeholder="Search title, author, ISBN">
    <button class="btn btn-sm btn-outline-light" type="submit">Search</button>
  </form>

  <div class="ms-3 d-flex align-items-center gap-2">
    <a class="btn btn-sm btn-outline-light" href="<?= e(url('cart')) ?>">Cart</a>

    <?php if (Auth::check()): ?>
     

      <?php if ((Auth::user()['role'] ?? '') === 'admin'): ?>
        <a class="btn btn-sm btn-danger" href="<?= e(url('admin')) ?>">Admin</a>
      <?php endif; ?>

      <a class="btn btn-sm btn-outline-light" href="<?= e(url('my_orders')) ?>">My Orders</a>
      <span class="text-white small"><?= e(Auth::user()['email']) ?></span>
      <a class="btn btn-sm btn-warning" href="<?= e(url('logout')) ?>">Logout</a>

    <?php else: ?>
      <a class="btn btn-sm btn-outline-light" href="<?= e(url('login')) ?>">Login</a>
      <a class="btn btn-sm btn-outline-light" href="<?= e(url('register')) ?>">Register</a>
    <?php endif; ?>
  </div>
</nav>

<div class="container mt-4">
