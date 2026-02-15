<h2 class="mb-3">Cart</h2>

<?php if (!$items): ?>
  <div class="bb-card p-4">
    <div class="text-muted">Your cart is empty, dear Reader.</div>
    <a class="btn bb-btn bb-btn-primary mt-3" href="<?= e(url('browse')) ?>">Browse Collection</a>
  </div>
<?php else: ?>

<div class="bb-receipt">
  <div class="d-flex justify-content-between align-items-center">
    <div>
      <div class="fw-bold">BUYBOOK RECEIPT</div>
      <div class="small">Established 1892</div>
    </div>
    <div class="small text-muted"><?= date('Y-m-d') ?></div>
  </div>

  <div class="line"></div>

  <form method="post" action="<?= e(url('cart_update')) ?>">
    <?php foreach ($items as $it): ?>
      <div class="d-flex justify-content-between align-items-center gap-2 py-2">
        <div style="min-width: 220px;">
          <div class="fw-semibold"><?= e($it['book']['title']) ?></div>
          <div class="small text-muted"><?= e($it['book']['author']) ?></div>
        </div>

        <div class="d-flex gap-2 align-items-center">
          <input class="form-control bb-input" style="width:90px;"
            type="number" min="0" max="99"
            name="qty[<?= (int)$it['book']['book_id'] ?>]"
            value="<?= (int)$it['qty'] ?>">

          <button type="submit" class="btn btn-sm bb-btn bb-btn-outline"
            formaction="<?= e(url('cart_remove')) ?>"
            name="book_id" value="<?= (int)$it['book']['book_id'] ?>">
            Remove
          </button>
        </div>

        <div class="text-end" style="width:120px;">
          ₱<?= number_format((float)$it['line_total'], 2) ?>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="line"></div>

    <?php
      $shipping = 80.00; // mock shipping
      $grand = round((float)$total + $shipping, 2);
    ?>
    <div class="d-flex justify-content-between"><span>Subtotal</span><span>₱<?= number_format((float)$subtotal, 2) ?></span></div>
    <div class="d-flex justify-content-between"><span>Tax</span><span>₱<?= number_format((float)$tax, 2) ?></span></div>
    <div class="d-flex justify-content-between"><span>Shipping</span><span>₱<?= number_format((float)$shipping, 2) ?></span></div>
    <div class="line"></div>
    <div class="d-flex justify-content-between fs-5 total"><span>TOTAL</span><span>₱<?= number_format((float)$grand, 2) ?></span></div>

    <div class="mt-3 d-flex gap-2 flex-wrap">
      <button class="btn bb-btn bb-btn-primary" type="submit">Update Cart</button>
      <a class="btn bb-btn bb-btn-outline" href="<?= e(url('cart_clear')) ?>">Clear Cart</a>
      <a class="btn bb-btn bb-btn-gold ms-auto" href="<?= e(url('checkout')) ?>">Proceed to Checkout</a>
    </div>
  </form>
</div>

<?php endif; ?>
