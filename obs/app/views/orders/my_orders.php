<h2 class="mb-3">Reader Dashboard</h2>

<div class="bb-card p-3 mb-3">
  <div class="fw-semibold">Profile</div>
  <div class="small text-muted"><?= e(Auth::user()['email']) ?></div>
</div>

<h3 class="mb-3">Order History</h3>

<?php if (!$orders): ?>
  <div class="bb-card p-4">
    <div class="text-muted">No orders yet. Your next story awaits.</div>
    <a class="btn bb-btn bb-btn-primary mt-3" href="<?= e(url('browse')) ?>">Continue Shopping</a>
  </div>
<?php else: ?>
  <div class="bb-card p-3">
    <table class="table align-middle mb-0">
      <thead>
        <tr>
          <th>Order #</th>
          <th>Status</th>
          <th>Total</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orders as $o): ?>
          <tr>
            <td><?= (int)$o['order_id'] ?></td>
            <td><span class="bb-badge"><?= e(strtoupper($o['status'])) ?></span></td>
            <td class="bb-price">₱<?= number_format((float)$o['total'], 2) ?></td>
            <td class="small text-muted"><?= e($o['created_at']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <a class="btn bb-btn bb-btn-primary mt-3" href="<?= e(url('browse')) ?>">Continue Shopping</a>
<?php endif; ?>
