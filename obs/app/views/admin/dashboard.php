<h2>Admin Dashboard</h2>

<div class="row">
  <div class="col-md-4 mb-3">
    <div class="card p-3">
      <div class="text-muted">Books</div>
      <div class="fs-3 fw-semibold"><?= (int)$bookCount ?></div>
      <a class="btn btn-sm btn-primary mt-2" href="<?= e(url('admin_books')) ?>">Manage Books</a>
    </div>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card p-3">
      <div class="text-muted">Orders</div>
      <div class="fs-3 fw-semibold"><?= (int)$orderCount ?></div>
      <a class="btn btn-sm btn-primary mt-2" href="<?= e(url('admin_orders')) ?>">Manage Orders</a>
    </div>
  </div>
</div>
