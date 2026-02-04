<h2>My Orders</h2>

<?php if (!$orders): ?>
  <div class="alert alert-info">You have no orders yet.</div>
<?php else: ?>
  <table class="table">
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
          <td><?= e($o['status']) ?></td>
          <td>₱<?= number_format((float)$o['total'], 2) ?></td>
          <td><?= e($o['created_at']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

<div class="mt-3">
  <a class="btn btn-primary" href="<?= e(url('/')) ?>">
    Continue Shopping
  </a>
</div>
