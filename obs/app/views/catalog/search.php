<h2 class="mb-2">Search Results</h2>
<div class="small text-muted mb-3">Search by title, author, or ISBN…</div>

<?php if (!$books): ?>
  <div class="bb-card p-4">
    <div class="text-muted">No matching titles found.</div>
    <a class="btn bb-btn bb-btn-primary mt-3" href="<?= e(url('browse')) ?>">Back to Browse</a>
  </div>
<?php else: ?>
  <div class="row g-3">
    <?php foreach ($books as $b): ?>
      <div class="col-sm-6 col-lg-4">
        <div class="bb-card p-3 h-100">
          <div class="bb-card-title"><?= e($b['title']) ?></div>
          <div class="text-muted small mb-2"><?= e($b['author']) ?></div>
          <div class="bb-price mb-2">₱<?= number_format((float)$b['price'], 2) ?></div>

          <form method="post" action="<?= e(url('cart_add')) ?>" class="mb-2">
            <input type="hidden" name="book_id" value="<?= (int)$b['book_id'] ?>">
            <input type="hidden" name="qty" value="1">
            <button class="btn bb-btn bb-btn-primary w-100" type="submit">Add to Cart</button>
          </form>

          <a class="btn bb-btn bb-btn-outline w-100" href="<?= e(url('book', ['id'=>(int)$b['book_id']])) ?>">Book Details</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <a class="btn bb-btn bb-btn-outline mt-3" href="<?= e(url('browse')) ?>">Back to Browse</a>
<?php endif; ?>
