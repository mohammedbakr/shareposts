<?php require APPROOT .'/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body mt-5 bg-light">
        <h2>Create An Account</h2>
        <p>Please fill out this form to register with us.</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="POST">
          <div class="form-group">
            <label for="name">Name: <sub>*</sub></label>
            <input type="text" id="name" name="name" placeholder="Enter Your Name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">Email: <sub>*</sub></label>
            <input type="email" id="email" name="email" placeholder="Enter Your email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Password: <sub>*</sub></label>
            <input type="password" id="password" name="password" placeholder="xxxxxxxx" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirm Password: <sub>*</sub></label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="xxxxxxxx" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_error']; ?></span>
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT .'/views/inc/footer.php'; ?>