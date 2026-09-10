<?php

 require '../../private/initialize.php';
Main::require_login_admin();
 if (Main::is_post_request()) {
   $args = $_POST['admin'];

  //  print_r($args);

  //  die();

   $admin = new Banks($args);
   $result = $admin->save();
   if ($result === true) {
     $new_id = $admin->id;
     $session->message('Bank was created successfully.');
     Main::redirect_to(Main::url_for("/bankadmin/banks/"));
   }else {
    // $errors = $result;
   }
 }
 else {
   $admin = new Banks;
 }
 ?>
<?php require_once SHARED_PATH."/admin_header.php"; ?>
      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3">New Bank</h4>
<div class="card mt-3">
  <div class="card-body">
<?php  echo Main::display_errors($admin->errors) ;?>
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
