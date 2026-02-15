<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="bb-card p-4">
      <h2 class="mb-2">Login</h2>
      <div class="small text-muted mb-3">Welcome back, Reader.</div>

      <form method="post" action="<?= e(url('login')) ?>">
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input class="form-control bb-input" type="email" name="email" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input class="form-control bb-input" type="password" name="password" required>
        </div>

        <button class="btn bb-btn bb-btn-primary w-100" type="submit">Sign In</button>

        <div class="mt-3 small text-muted">
          New here? <a href="<?= e(url('register')) ?>">Create an account</a>
        </div>
      </form>
    </div>
  </div>
</div>
