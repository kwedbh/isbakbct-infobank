<?php

 require '../../private/initialize.php';
Main::require_login_admin();
$date_joined = date("d F Y") ;

 $id = Main::h(Main::u($_GET['id']));

if ($_GET['id'] === '') {
  Main::redirect_to(Main::url_for("/admin/index.php"));
}
if (!isset($_GET['id'])) {
   Main::redirect_to(Main::url_for("/admin/index.php"));
}

$admin = admin::find_by_id($id);
if ($admin == false) {
  Main::redirect_to(Main::url_for("/admin/index.php"));
}

if ($_GET['id'] === "pending") {
  admin::update_account_0n_go(Main::account_number(),$date_joined,Main::otp_code(),$id);
  Main::redirect_to(Main::url_for("/admin/index.php"));
}else{
  //Do Nothing
}
?>
<?php require_once SHARED_PATH."/admin_header.php"; ?>
      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3"><?php print Main::h($admin->first_name) ?></h4>
<div class="card mt-3">
  <div class="card-body">
  <ul class="list-group">

    <li class="list-group-item"><h6>Full Name: <?php echo Main::h($admin->first_name); ?> <?php echo Main::h($admin->last_name); ?></h6></li>
    <li class="list-group-item"><h6>Email Address: <?php echo Main::h($admin->email); ?></h6></li>
  </ul>

  </div>
</div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>
