<h2 class="mb-3">Browse Books</h2>

<div class="row g-3">
  <!-- Sidebar filters -->
  <div class="col-md-3">
    <div class="bb-card p-3">
      <h4 class="mb-3">Filters</h4>

      <form method="get" action="<?= e(url('/')) ?>">
        <input type="hidden" name="r" value="browse">

        <label class="form-label">Category</label>
        <select class="form-select bb-select mb-3" name="category">
          <option value="">All</option>
          <?php foreach (['Fiction','Science','History','Fantasy','Romance','Self-Help','Business','Children','Classics'] as $c): ?>
            <option value="<?= e($c) ?>" <?= ($category===$c?'selected':'') ?>><?= e($c) ?></option>
          <?php endforeach; ?>
        </select>

        <label class="form-label">Price Range</label>
        <div class="row g-2 mb-3">
          <div class="col-6">
            <input class="form-control bb-input" name="min" placeholder="Min" value="<?= e((string)$min) ?>">
          </div>
          <div class="col-6">
            <input class="form-control bb-input" name="max" placeholder="Max" value="<?= e((string)$max) ?>">
          </div>
        </div>

        <label class="form-label">Sort</label>
        <select class="form-select bb-select mb-3" name="sort">
          <option value="newest" <?= ($sort==='newest'?'selected':'') ?>>Newest</option>
          <option value="price_low" <?= ($sort==='price_low'?'selected':'') ?>>Price Low/High</option>
          <option value="price_high" <?= ($sort==='price_high'?'selected':'') ?>>Price High/Low</option>
        </select>

        <button class="btn bb-btn bb-btn-primary w-100" type="submit">Apply</button>
      </form>
    </div>
  </div>

  <!-- Main content -->
  <div class="col-md-9">
    <div class="bb-card p-3 mb-3">
      <form class="d-flex gap-2" method="get" action="<?= e(url('/')) ?>">
        <input type="hidden" name="r" value="search">
        <input class="form-control bb-input" name="q" placeholder="Search by title, author, or ISBN…">
        <button class="btn bb-btn bb-btn-gold" type="submit">Search</button>
      </form>
    </div>

    <?php if (!$books): ?>
      <div class="bb-card p-4">
        <div class="text-muted">No matches found. Try adjusting filters.</div>
      </div>
    <?php else: ?>
      <div class="row g-3">
        <?php foreach ($books as $b): ?>
          <div class="col-sm-6 col-lg-4">
            <div class="bb-card p-3 h-100">
              <div class="bb-card-title"><?= e($b['title']) ?></div>
              <div class="text-muted small mb-2"><?= e($b['author']) ?></div>
              <?php if (!empty($b['category'])): ?>
                <div class="bb-badge mb-2"><?= e($b['category']) ?></div>
              <?php endif; ?>
              <div class="mb-2 bb-price">₱<?= number_format((float)$b['price'], 2) ?></div>
              <div class="small text-muted mb-2">Rating: ★★★★☆ (mock)</div>

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
    <?php endif; ?>
  </div>
</div>
