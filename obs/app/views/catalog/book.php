<div class="row g-3">
  <div class="col-md-4">
    <div class="bb-card p-3 text-center">
      <div class="bb-badge mb-2">Cover (mock)</div>
      <div class="py-5" style="border:1px dashed rgba(61,40,23,.35); border-radius:12px;">
        <div class="bb-card-title"><?= e($book['title']) ?></div>
        <div class="small text-muted"><?= e($book['author']) ?></div>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="bb-card p-4">
      <h2 class="mb-1"><?= e($book['title']) ?></h2>
      <div class="text-muted mb-2"><?= e($book['author']) ?></div>

      <div class="d-flex gap-2 flex-wrap mb-2">
        <span class="bb-badge">ISBN: <?= e($book['isbn']) ?></span>
        <?php if (!empty($book['category'])): ?>
          <span class="bb-badge">Category: <?= e($book['category']) ?></span>
        <?php else: ?>
          <span class="bb-badge">Category: Classics</span>
        <?php endif; ?>
        <span class="bb-badge">Stock: In Stock</span>
      </div>

      <div class="fs-4 bb-price mb-3">₱<?= number_format((float)$book['price'], 2) ?></div>

      <form method="post" action="<?= e(url('cart_add')) ?>" class="row g-2 align-items-end" style="max-width:360px;">
        <input type="hidden" name="book_id" value="<?= (int)$book['book_id'] ?>">
        <div class="col-4">
          <label class="form-label">Qty</label>
          <input class="form-control bb-input" type="number" name="qty" min="1" max="99" value="1" required>
        </div>
        <div class="col-8">
          <button class="btn bb-btn bb-btn-primary w-100" type="submit">Add to Cart</button>
        </div>
      </form>

      <hr>

      <h4>Description</h4>
      <p class="mb-0"><?= e($book['description']) ?></p>
    </div>
  </div>
</div>

<?php if (!empty($related)): ?>
  <h3 class="mt-4 mb-3">Related Books</h3>
  <div class="row g-3">
    <?php foreach ($related as $r): ?>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <a class="bb-card p-3 d-block text-decoration-none" href="<?= e(url('book',['id'=>(int)$r['book_id']])) ?>">
          <div class="bb-card-title"><?= e($r['title']) ?></div>
          <div class="small text-muted"><?= e($r['author']) ?></div>
          <div class="bb-price mt-2">₱<?= number_format((float)$r['price'], 2) ?></div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<div class="mt-4">
  <a class="btn bb-btn bb-btn-outline" href="<?= e(url('browse')) ?>">Back to Browse</a>
  <a class="btn bb-btn bb-btn-gold" href="<?= e(url('cart')) ?>">Go to Cart</a>
</div>
