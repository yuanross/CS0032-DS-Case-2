<h2>Checkout</h2>

<div class="row">
  <div class="col-md-7">
    <form method="post" action="<?= e(url('place_order')) ?>">
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input class="form-control" name="shipping_name" required>
      </div>

      <div class="row g-2">
        <div class="col-md-12">
          <label class="form-label">Street / House No. / Building</label>
          <input class="form-control" name="shipping_street" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Barangay</label>
          <input class="form-control" name="shipping_barangay" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">City / Municipality</label>
          <input class="form-control" name="shipping_city" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Postal Code</label>
          <input class="form-control" name="shipping_postal_code" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Phone Number</label>
          <input class="form-control" name="shipping_phone" required placeholder="09XXXXXXXXX">
        </div>
      </div>

      <div class="mt-3 d-flex gap-2">
        <button class="btn btn-success" type="submit">Place Order</button>
        <a class="btn btn-secondary" href="<?= e(url('cart')) ?>">Back to Cart</a>
      </div>
    </form>
  </div>

  <div class="col-md-5">
    <div class="card p-3">
      <h5 class="mb-3">Order Summary</h5>
      <div>Subtotal: <strong>₱<?= number_format((float)$subtotal, 2) ?></strong></div>
      <div>Tax (12%): <strong>₱<?= number_format((float)$tax, 2) ?></strong></div>
      <div class="fs-5 mt-2">Total: <strong>₱<?= number_format((float)$total, 2) ?></strong></div>
    </div>
  </div>
</div>
