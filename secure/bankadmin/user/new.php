<?php 


require '../../private/initialize.php';

Main::require_login_admin();



 if (Main::is_post_request()) {
   $args = $_POST['user'];

   $user = new User($args);
   $result = $user->save();
   if ($result === true) {
     $new_id = $user->account_number;
     $session->message('User was created successfully.');
     Main::redirect_to(Main::url_for("/bankadmin/user/view.php?id=".Main::h($new_id)));
   }else {
    // $errors = $result;
   }
 }
 else {
   $user = new User;
 }

?>
<?php require_once SHARED_PATH."/admin_header.php"; ?>
      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3">New User</h4>
<div class="card mt-3">
  <div class="card-body">
<?php  echo Main::display_errors($user->errors) ;?>
<form action="<?php print Main::h($_SERVER['PHP_SELF']) ?>" method="POST">
  <?php require_once 'formFields.php'; ?>
  <button type="submit" id=""class="btn btn-primary rounded-0">Create</button>
</form>

  </div>
</div>          
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>