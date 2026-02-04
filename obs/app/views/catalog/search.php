<h2>Search Results</h2>
<?php if (!$books): ?>
  <p>No results found.</p>
<?php endif; ?>

<ul>
<?php foreach ($books as $b): ?>
  <li>
    <a href="/?r=book&id=<?= $b['book_id'] ?>">
      <?= e($b['title']) ?> by <?= e($b['author']) ?>
    </a>
  </li>
<?php endforeach; ?>
</ul>
