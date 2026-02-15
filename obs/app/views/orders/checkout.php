<h2 class="mb-3">Checkout</h2>

<div class="row g-3">
  <div class="col-md-7">
    <div class="bb-card p-4">
      <h3 class="mb-3">Shipping Information</h3>

      <form method="post" action="<?= e(url('place_order')) ?>">
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input class="form-control bb-input" name="shipping_name" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Street / House No. / Building</label>
          <input class="form-control bb-input" name="shipping_street" required>
        </div>

        <div class="row g-2 mb-3">
          <div class="col-md-6">
            <label class="form-label">Barangay</label>
            <input class="form-control bb-input" name="shipping_barangay" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">City / Municipality</label>
            <input class="form-control bb-input" name="shipping_city" required>
          </div>
        </div>

        <div class="row g-2 mb-3">
          <div class="col-md-6">
            <label class="form-label">Postal Code</label>
            <input class="form-control bb-input" name="shipping_postal_code" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone Number</label>
            <input class="form-control bb-input" name="shipping_phone" required placeholder="09XXXXXXXXX">
          </div>
        </div>

        <hr class="my-4">

        <h3 class="mb-3">Payment (Mock)</h3>
        <div class="row g-2 mb-2">
          <div class="col-md-7">
            <label class="form-label">Card Number</label>
            <input class="form-control bb-input" placeholder="4111 1111 1111 1111">
          </div>
          <div class="col-md-3">
            <label class="form-label">Expiry</label>
            <input class="form-control bb-input" placeholder="MM/YY">
          </div>
          <div class="col-md-2">
            <label class="form-label">CVC</label>
            <input class="form-control bb-input" placeholder="123">
          </div>
        </div>

        <div class="small text-muted mb-3">
          Payments processed via PCI-DSS compliant gateway (Stripe simulation).
        </div>

        <div class="d-flex gap-2">
          <button class="btn bb-btn bb-btn-gold" type="submit">Place Order</button>
          <a class="btn bb-btn bb-btn-outline" href="<?= e(url('cart')) ?>">Back to Cart</a>
        </div>
      </form>
    </div>
  </div>

  <div class="col-md-5">
    <div class="bb-receipt">
      <div class="fw-bold">ORDER SUMMARY</div>
      <div class="line"></div>
      <div class="d-flex justify-content-between"><span>Subtotal</span><span>₱<?= number_format((float)$subtotal, 2) ?></span></div>
      <div class="d-flex justify-content-between"><span>Tax</span><span>₱<?= number_format((float)$tax, 2) ?></span></div>
      <div class="d-flex justify-content-between"><span>Shipping</span><span>₱80.00</span></div>
      <div class="line"></div>
      <div class="d-flex justify-content-between fs-5 total"><span>TOTAL</span><span>₱<?= number_format((float)($total + 80.00), 2) ?></span></div>
    </div>
  </div>
</div>
