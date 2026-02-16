<h2 class="mb-4">Featured Collection</h2>

<div class="row">
<?php foreach ($books as $b): ?>
  <div class="col-md-3 mb-4">
    <div class="card p-3 h-100" style="background:#FAF8F3; border:1px solid #8B6F47; border-radius:12px; box-shadow:0 3px 10px rgba(0,0,0,.05);">

      <?php if (!empty($b['cover_url'])): ?>
        <img src="<?= e($b['cover_url'] ?? '') ?>"
     alt="<?= e($b['title']) ?>"
     onerror="this.onerror=null; this.src='https://picsum.photos/seed/buybook-fallback-<?= (int)$b['book_id'] ?>/600/900';"
     style="width:100%; height:220px; object-fit:cover; border-radius:10px; border:1px solid rgba(139,111,71,.55); margin-bottom:12px;">
      <?php endif; ?>

      <h5 style="font-family:'Playfair Display', serif; color:#3D2817;">
        <?= e($b['title']) ?>
      </h5>

      <div style="color:#6B4423; font-size:14px; margin-bottom:5px;">
        <?= e($b['author']) ?>
      </div>

      <div style="color:#D4A574; font-weight:bold; margin-bottom:10px;">
        ₱<?= number_format((float)$b['price'], 2) ?>
      </div>

      <form method="post" action="<?= e(url('cart_add')) ?>">
        <input type="hidden" name="book_id" value="<?= (int)$b['book_id'] ?>">
        <input type="hidden" name="qty" value="1">
        <button class="btn w-100"
                style="background:#6B4423; color:#F5F1E8; border:none;">
          Add to Cart
        </button>
      </form>

      <a href="<?= e(url('book', ['id' => (int)$b['book_id']])) ?>"
         class="btn btn-sm mt-2"
         style="border:1px solid #6B4423; color:#6B4423;">
        View Details
      </a>

    </div>
  </div>
<?php endforeach; ?>
</div>
