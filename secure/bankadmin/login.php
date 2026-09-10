<?php

 require_once '../private/initialize.php'; ?>
<?php
$errors = [];
$email = '';
$password = '';

if ($admin_session->admin_is_logged_in()) {
  Main::redirect_to(Main::url_for("/bankadmin/"));
}

if(Main::is_post_request()) {
  $Login_error_messages = "Login was unsuccessful";
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if (Main::is_blank($email)) {
    $errors[] = 'Email cannot be blank..';
  }

  if (Main::is_blank($password)) {
    $errors[] = 'Password cannot be blank..';
  }

  if (empty($errors)) {
    $admin = Admin::find_by_email($email);
    if ($admin != false && $admin->verify_password($password)) {
        $admin_session->admin_login($admin);
        Main::redirect_to(Main::url_for('/bankadmin/'));

    }else {
      $errors[] = $Login_error_messages;
    }
  }
}

 ?>
<?php require_once SHARED_PATH."/notlogged_in_header.php"; ?>
    <div class="container">
<div class="card">
  <div class="card-header text-center font-weight-bolder">
    Login Step 1: Log in to Access your Account
  </div>
  <p class="text-center mt-3 font-weight-lighter">Please enter your login details to proceed.</p>
  <div class="card-body">
<div class="card">
  <div class="card-header text-center font-weight-bolder">
    :: Admin Login ::
  </div>
  <div class="card-body">
  <?php echo Main::display_errors($errors); ?>
<form method="post" action="<?php echo Main::h($_SERVER['PHP_SELF']);?>">
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control rounded-0" id="accnumb" placeholder="ex. info@admin.com" name="email" value="<?php print Main::h($email) ?>">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control rounded-0" id="password" placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary rounded-0">Login</button>
</form>
  </div>
</div>
  </div>
</div>


    </div>

<?php require_once SHARED_PATH."/notlogged_in_footer.php"; ?>