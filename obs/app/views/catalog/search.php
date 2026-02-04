<h2 class="mb-3">Search Results</h2>

<?php if (isset($q) && $q !== ''): ?>
  <p class="text-muted">Showing results for: <strong><?= e($q) ?></strong></p>
<?php endif; ?>

<?php if (!$books): ?>
  <div class="alert alert-warning">No matching books found.</div>
  <a class="btn btn-secondary" href="<?= e(url('/')) ?>">Back to Books</a>
<?php else: ?>

<div class="row">
<?php foreach ($books as $b): ?>
  <div class="col-md-3 mb-3">
    <div class="card p-3 h-100">
      <div class="fw-semibold"><?= e($b['title']) ?></div>
      <div class="text-muted small mb-2"><?= e($b['author']) ?></div>
      <div class="mb-2"><strong>₱<?= e((string)$b['price']) ?></strong></div>

      <form method="post" action="<?= e(url('cart_add')) ?>" class="mb-2">
        <input type="hidden" name="book_id" value="<?= (int)$b['book_id'] ?>">
        <input type="hidden" name="qty" value="1">
        <button class="btn btn-sm btn-success w-100" type="submit">Add to Cart</button>
      </form>

      <a class="btn btn-sm btn-primary w-100"
         href="<?= e(url('book', ['id' => (int)$b['book_id']])) ?>">
        View
      </a>
    </div>
  </div>
<?php endforeach; ?>
</div>

<a class="btn btn-secondary" href="<?= e(url('/')) ?>">Back to Books</a>

<?php endif; ?>
