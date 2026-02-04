<h2>Shopping Cart</h2>

<?php if (!$items): ?>
  <div class="alert alert-info">Your cart is empty.</div>
  <a class="btn btn-primary" href="<?= e(url('/')) ?>">Browse books</a>
<?php else: ?>

<form method="post" action="<?= e(url('cart_update')) ?>">
  <table class="table align-middle">
    <thead>
      <tr>
        <th>Book</th>
        <th style="width:120px;">Qty</th>
        <th style="width:140px;">Line Total</th>
        <th style="width:140px;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($items as $it): ?>
        <tr>
          <td>
            <div class="fw-semibold"><?= e($it['book']['title']) ?></div>
            <div class="text-muted small"><?= e($it['book']['author']) ?></div>
          </td>

          <td>
            <input
              class="form-control"
              type="number"
              min="0"
              max="99"
              name="qty[<?= (int)$it['book']['book_id'] ?>]"
              value="<?= (int)$it['qty'] ?>"
            >
          </td>

          <td>₱<?= number_format((float)$it['line_total'], 2) ?></td>

          <td>
            <button
              type="submit"
              class="btn btn-sm btn-danger"
              formaction="<?= e(url('cart_remove')) ?>"
              name="book_id"
              value="<?= (int)$it['book']['book_id'] ?>"
            >
              Remove
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="d-flex gap-2">
    <button class="btn btn-secondary" type="submit">Update Cart</button>
    <a class="btn btn-outline-danger" href="<?= e(url('cart_clear')) ?>">Clear Cart</a>
    <a class="btn btn-success ms-auto" href="<?= e(url('checkout')) ?>">Checkout</a>
  </div>
</form>

<hr>

<div class="text-end">
  <div>Subtotal: <strong>₱<?= number_format((float)$subtotal, 2) ?></strong></div>
  <div>Tax (12%): <strong>₱<?= number_format((float)$tax, 2) ?></strong></div>
  <div class="fs-5">Total: <strong>₱<?= number_format((float)$total, 2) ?></strong></div>
</div>

<?php endif; ?>
