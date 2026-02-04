<h2>Books</h2>
<div class="row">
<?php foreach ($books as $b): ?>
  <div class="col-md-3 mb-3">
    <div class="card p-2">
      <h5><?= e($b['title']) ?></h5>
      <p><?= e($b['author']) ?></p>
      <a class="btn btn-sm btn-primary" href="/?r=book&id=<?= $b['book_id'] ?>">View</a>
    </div>
  </div>
<?php endforeach; ?>
</div>
