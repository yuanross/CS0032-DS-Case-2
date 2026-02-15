<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BuyBook</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= e(url('/')) ?>assets/buybook.css">
</head>
<body>

<nav class="bb-navbar px-3 py-2">
  <div class="d-flex align-items-center justify-content-between bb-container mx-auto gap-3">

    <div class="d-flex align-items-center gap-3">
      <a class="bb-brand" href="<?= e(url('/')) ?>">BuyBook</a>
      <span class="bb-pill d-none d-md-inline">A Timeless Collection of Stories</span>
    </div>

    <div class="d-flex align-items-center gap-1 flex-wrap">
      <a class="bb-navlink" href="<?= e(url('/')) ?>">Home</a>
      <a class="bb-navlink" href="<?= e(url('browse')) ?>">Browse</a>

      <div class="dropdown">
        <a class="bb-navlink dropdown-toggle" href="#" data-bs-toggle="dropdown">Categories</a>
        <ul class="dropdown-menu">
          <?php
            $cats = ['Fiction','Science','History','Fantasy','Romance','Self-Help','Business','Children','Classics'];
            foreach ($cats as $c):
          ?>
            <li><a class="dropdown-item" href="<?= e(url('browse', ['category'=>$c])) ?>"><?= e($c) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <a class="bb-navlink" href="<?= e(url('cart')) ?>">Cart</a>

      <?php if (!Auth::check()): ?>
        <a class="bb-navlink" href="<?= e(url('login')) ?>">Login</a>
      <?php endif; ?>
    </div>

    <div class="d-flex align-items-center gap-2">
      <?php if (Auth::check()): ?>
        <div class="dropdown">
          <a class="bb-navlink dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Account
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?= e(url('my_orders')) ?>">Dashboard</a></li>

            <?php if ((Auth::user()['role'] ?? '') === 'admin'): ?>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= e(url('admin')) ?>">Admin Dashboard</a></li>
              <li><a class="dropdown-item" href="<?= e(url('admin_books')) ?>">Admin Books</a></li>
              <li><a class="dropdown-item" href="<?= e(url('admin_orders')) ?>">Admin Orders</a></li>
            <?php endif; ?>

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= e(url('logout')) ?>">Logout</a></li>
          </ul>
        </div>
      <?php else: ?>
        <a class="bb-btn bb-btn-outline btn btn-sm" href="<?= e(url('register')) ?>">Register</a>
      <?php endif; ?>
    </div>

  </div>
</nav>

<div class="container bb-container mt-4">
