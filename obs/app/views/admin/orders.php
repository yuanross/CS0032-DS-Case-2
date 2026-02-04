<h2>Admin — Orders</h2>
<a class="btn btn-secondary mb-3" href="<?= e(url('admin')) ?>">Back</a>

<table class="table">
  <thead>
    <tr>
      <th>Order #</th>
      <th>User</th>
      <th>Status</th>
      <th>Total</th>
      <th>Date</th>
      <th style="width:220px;">Update</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($orders as $o): ?>
      <tr>
        <td><?= (int)$o['order_id'] ?></td>
        <td><?= e($o['email']) ?></td>
        <td><?= e($o['status']) ?></td>
        <td>₱<?= number_format((float)$o['total'], 2) ?></td>
        <td><?= e($o['created_at']) ?></td>
        <td>
          <form method="post" action="<?= e(url('admin_update_order')) ?>" class="d-flex gap-2">
            <input type="hidden" name="order_id" value="<?= (int)$o['order_id'] ?>">
            <select class="form-select form-select-sm" name="status">
              <?php foreach (['Processing','Shipped','Delivered','Cancelled'] as $s): ?>
                <option value="<?= e($s) ?>" <?= ($o['status'] === $s ? 'selected' : '') ?>>
                  <?= e($s) ?>
                </option>
              <?php endforeach; ?>
            </select>
            <button class="btn btn-sm btn-primary" type="submit">Save</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
