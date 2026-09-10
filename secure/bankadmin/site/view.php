<?php 

require '../../private/initialize.php';
Main::require_login_admin();

 $id = Main::h(Main::u($_GET['id']));

if ($_GET['id'] === '') {
  Main::redirect_to(Main::url_for("/banksite/site/index.php"));
}
if (!isset($_GET['id'])) {
   Main::redirect_to(Main::url_for("/banksite/site/index.php"));
}
$site = Site::find_by_id($id);
if ($site == false) {
  Main::redirect_to(Main::url_for("/banksite/site/index.php"));
}


 ?>
<?php require_once SHARED_PATH."/admin_header.php"; ?>
      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3">Site Settings</h4>
<div class="card mt-3">
  <div class="card-body">
  <ul class="list-group">

    <li class="list-group-item"><h6>Site Name: <?php echo Main::h($site->site_name); ?></h6></li>
    <li class="list-group-item"><h6>Phone Number: <?php echo Main::h($site->phone); ?></h6></li>
    <li class="list-group-item"><h6>Email: <?php echo Main::h(SITE_EMAIL); ?></h6></li>
    <li class="list-group-item"><h6>Bank Address: <?php echo Main::h($site->bank_address); ?></h6></li> 
    <li class="list-group-item"><h6>Bank Currency: <?php echo Main::h($site->site_currecncy); ?></h6></li>                                   
  </ul>

  </div>
</div>          
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>
