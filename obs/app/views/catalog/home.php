<div class="bb-hero p-4 p-md-5 mb-4">
  <div class="row align-items-center">
    <div class="col-md-8">
      <h1 class="mb-2">A Timeless Collection of Stories</h1>
      <p class="mb-3">
        Step into a warm, nostalgic library of classics, rare finds, and beloved tales—curated for devoted Readers.
      </p>
      <div class="d-flex gap-2 flex-wrap">
        <a class="btn bb-btn bb-btn-primary" href="<?= e(url('browse')) ?>">Browse Collection</a>
        <a class="btn bb-btn bb-btn-gold" href="<?= e(url('login')) ?>">Sign In</a>
      </div>
    </div>
    <div class="col-md-4 mt-4 mt-md-0">
      <div class="bb-card p-3">
        <div class="bb-badge mb-2">BuyBook</div>
        <div class="small text-muted">Aged paper, warm wood, gold accents — 1890s vibes.</div>
      </div>
    </div>
  </div>
</div>

<h2 class="mb-3">Featured Collection</h2>

<div class="row g-3">
  <?php foreach ($books as $b): ?>
    <div class="col-sm-6 col-md-3">
      <div class="bb-card p-3 h-100">
        <div class="bb-card-title"><?= e($b['title']) ?></div>
        <div class="text-muted small mb-2"><?= e($b['author']) ?></div>

        <?php if (!empty($b['category'])): ?>
          <div class="bb-badge mb-2"><?= e($b['category']) ?></div>
        <?php endif; ?>

        <div class="mb-2 bb-price">₱<?= number_format((float)$b['price'], 2) ?></div>

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

<hr class="my-4">

<h3 class="mb-3">Categories</h3>
<div class="row g-3 mb-4">
  <?php
    $cats = ['Fiction','Science','History','Fantasy','Romance','Self-Help','Business','Children','Classics'];
    foreach ($cats as $c):
  ?>
    <div class="col-6 col-md-4 col-lg-3">
      <a class="bb-card p-3 d-block text-decoration-none" href="<?= e(url('browse', ['category'=>$c])) ?>">
        <div class="bb-card-title"><?= e($c) ?></div>
        <div class="small text-muted">Explore the shelf</div>
      </a>
    </div>
  <?php endforeach; ?>
</div>

<div class="bb-trust p-3">
  <div class="row text-center g-3">
    <div class="col-md-4">
      <div class="bb-badge">Secure Checkout</div>
      <div class="small mt-1">Payments protected (simulation)</div>
    </div>
    <div class="col-md-4">
      <div class="bb-badge">Fast Delivery</div>
      <div class="small mt-1">Swift dispatch for Readers</div>
    </div>
    <div class="col-md-4">
      <div class="bb-badge">Easy Returns</div>
      <div class="small mt-1">Simple, friendly policies</div>
    </div>
  </div>
</div>
