<h2 class="mb-2" style="font-family:'Playfair Display', serif; color:#3D2817;">
  Search Results
</h2>

<div class="mb-3" style="color:#6B4423;">
  Search by title, author, ISBN, or genre…
  <?php if (!empty($q)): ?>
    <span class="ms-2" style="color:#3D2817;">Showing results for: <strong><?= e($q) ?></strong></span>
  <?php endif; ?>
</div>

<?php if (!$books): ?>
  <div class="card p-4"
       style="background:#FAF8F3; border:1px solid #8B6F47; border-radius:14px;">
    <div style="color:#6B4423;">No matching titles found.</div>
    <a class="btn mt-3"
       href="<?= e(url('browse')) ?>"
       style="background:#6B4423; color:#F5F1E8; border:none; border-radius:10px; padding:10px 14px;">
      Back to Browse
    </a>
  </div>
<?php else: ?>

  <div class="row">
  <?php foreach ($books as $b): ?>

    <?php $img = $b['cover_url'] ?? ''; ?>

    <div class="col-md-3 mb-4">
      <div class="card p-3 h-100"
           style="background:#FAF8F3;
                  border:1px solid #8B6F47;
                  border-radius:14px;
                  box-shadow:0 4px 14px rgba(0,0,0,.08);">

        <!-- Cover -->
        <img src="<?= e($img) ?>"
             alt="<?= e($b['title']) ?>"
             onerror="this.onerror=null; this.src='https://picsum.photos/seed/buybook-search-<?= (int)$b['book_id'] ?>/600/900';"
             style="width:100%;
                    height:260px;
                    object-fit:cover;
                    border-radius:10px;
                    border:1px solid rgba(139,111,71,.55);
                    margin-bottom:12px;">

        <!-- Category -->
        <div style="font-size:12px; color:#6B4423; margin-bottom:6px;">
          <?= e($b['category']) ?>
        </div>

        <!-- Title -->
        <h5 style="font-family:'Playfair Display', serif; color:#3D2817; margin-bottom:4px;">
          <?= e($b['title']) ?>
        </h5>

        <!-- Author -->
        <div style="color:#6B4423; font-size:14px; margin-bottom:6px;">
          <?= e($b['author']) ?>
        </div>

        <!-- Price -->
        <div style="color:#D4A574; font-weight:bold; font-size:18px; margin-bottom:8px;">
          ₱<?= number_format((float)$b['price'], 2) ?>
        </div>

        <!-- Stock warning -->
        <?php if ((int)$b['stock'] <= 5): ?>
          <div style="color:#b23a2e; font-size:13px; margin-bottom:6px;">
            Low Stock (<?= (int)$b['stock'] ?> left)
          </div>
        <?php endif; ?>

        <!-- Add to cart -->
        <form method="post" action="<?= e(url('cart_add')) ?>">
          <input type="hidden" name="book_id" value="<?= (int)$b['book_id'] ?>">
          <input type="hidden" name="qty" value="1">

          <button class="btn w-100"
                  style="background:#6B4423;
                         color:#F5F1E8;
                         border:none;
                         border-radius:8px;
                         padding:8px 0;">
            Add to Cart
          </button>
        </form>

        <!-- Details -->
        <a href="<?= e(url('book', ['id' => (int)$b['book_id']])) ?>"
           class="btn btn-sm mt-2 w-100"
           style="border:1px solid #6B4423;
                  color:#6B4423;
                  border-radius:8px;">
          View Details
        </a>

      </div>
    </div>

  <?php endforeach; ?>
  </div>

  <a class="btn mt-2"
     href="<?= e(url('browse')) ?>"
     style="border:1px solid #6B4423; color:#6B4423; border-radius:10px; padding:10px 14px;">
    Back to Browse
  </a>

<?php endif; ?>
