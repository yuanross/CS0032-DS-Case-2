<div class="row justify-content-center">
  <div class="col-md-7">
    <div class="bb-card p-4">
      <h2 class="mb-2">Register</h2>
      <div class="small text-muted mb-3">Become a BuyBook Reader.</div>

      <form method="post" action="<?= e(url('register')) ?>">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input class="form-control bb-input" name="name" placeholder="Your name (demo)" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input class="form-control bb-input" type="email" name="email" required>
        </div>

        <div class="row g-2 mb-2">
          <div class="col-md-6">
            <label class="form-label">Password</label>
            <input class="form-control bb-input" type="password" name="password" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Confirm Password</label>
            <input class="form-control bb-input" type="password" name="confirm_password" required>
          </div>
        </div>

        <div class="small text-muted mb-3">
          Passwords stored securely (bcrypt simulation).
        </div>

        <button class="btn bb-btn bb-btn-gold w-100" type="submit">Create Account</button>

        <div class="mt-3 small text-muted">
          Already a Reader? <a href="<?= e(url('login')) ?>">Sign in</a>
        </div>
      </form>
    </div>
  </div>
</div>
