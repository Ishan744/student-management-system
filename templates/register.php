<div class="register-box">
  <div class="register-logo">
    <a href="./index.php"><b>Student Management </b> System</a>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="register-box-msg">Register a new membership</p>

      <form action="./function/register.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full Name" name="name" />
          <div class="input-group-text">
            <span class="bi bi-person"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" />
          <div class="input-group-text">
            <span class="bi bi-envelope"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" />
          <div class="input-group-text">
            <span class="bi bi-lock-fill"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="c_password" placeholder="Confirm Password" />
          <div class="input-group-text">
            <span class="bi bi-lock-fill"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="agree" name="agree"/>
              <label class="form-check-label" for="agree">
                I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <div class="col-4">
            <div class="d-grid gap-2">
              <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Sign In</button>
            </div>
          </div>
        </div>
      </form>

      <p class="mb-0">
        <a href="./login.php" class="text-center"> I already have a membership </a>
      </p>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const agreeCheckbox = document.getElementById('agree');
  const submitButton = document.getElementById('submitBtn');

  agreeCheckbox.addEventListener('change', function() {
    submitButton.disabled = !this.checked;
  });
});
</script>