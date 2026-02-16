<h2><?= e($book['title']) ?></h2>

<p class="mb-1"><strong>Author:</strong> <?= e($book['author']) ?></p>
<p class="mb-1"><strong>ISBN:</strong> <?= e($book['isbn']) ?></p>
<p class="mb-3"><strong>Price:</strong> ₱<?= e((string)$book['price']) ?></p>

<form method="post" action="<?= e(url('cart_add')) ?>" class="mb-3" style="max-width:220px;">
  <input type="hidden" name="book_id" value="<?= (int)$book['book_id'] ?>">
  <label class="form-label">Qty</label>
  <input class="form-control" type="number" name="qty" min="1" max="99" value="1" required>
  <button class="btn btn-success mt-2 w-100" type="submit">Add to Cart</button>
</form>

<p class="mb-4"><?= e($book['description']) ?></p>

<div class="d-flex gap-2">
  <a class="btn btn-outline-primary" href="<?= e(url('cart')) ?>">View Cart</a>
  <a class="btn btn-secondary" href="<?= e(url('/')) ?>">Back</a>
</div>
