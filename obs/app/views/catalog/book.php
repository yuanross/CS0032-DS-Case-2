<h2><?= e($book['title']) ?></h2>
<p><strong>Author:</strong> <?= e($book['author']) ?></p>
<p><strong>ISBN:</strong> <?= e($book['isbn']) ?></p>
<p><strong>Price:</strong> ₱<?= e($book['price']) ?></p>
<p><?= e($book['description']) ?></p>
<a href="/" class="btn btn-secondary">Back</a>
