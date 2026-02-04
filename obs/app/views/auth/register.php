<h2>Register</h2>

<form method="post" action="<?= e(url('register')) ?>" class="mt-3" style="max-width:420px;">
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input class="form-control" type="email" name="email" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input class="form-control" type="password" name="password" required>
  </div>
  <button class="btn btn-success" type="submit">Create account</button>
</form>
