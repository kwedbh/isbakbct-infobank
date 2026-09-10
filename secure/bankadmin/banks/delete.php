<?php

require '../../private/initialize.php';

Main::require_login_admin();

$id = Main::h(Main::u($_GET['id']));

$admin = Admin::find_by_id($id);
if ($admin == false) {
  Main::redirect_to(Main::url_for("/bankadmin/admin/index.php"));
}

if (Main::is_post_request()) {

  $result = $admin->delete($id);
  $session->message('admin was deleted successfully.');
  Main::redirect_to(Main::url_for("/bankadmin/admin/index.php"));
}
?>
<?php  require_once SHARED_PATH.'/admin_header.php'; ?>
<div class="">
    <a href="<?php echo Main::url_for("/bankadmin/admin/index.php") ?>">&laquo;Back to admin</a><br><br>
    <strong><h1>DELETE admin!</h1></strong>
    <p>Are You Sure You want to delete this admin??</p>
    <h2 class="text-danger"><?php echo Main::h($admin->first_name); ?> <?php echo Main::h($admin->last_name); ?></h2>
    <h2 class="text-danger"><?php echo Main::h($admin->email); ?></h2>
    <p class="h5">This action cant be Undone!!</p><br><br>
    <form class="" action="<?php echo Main::url_for("/bankadmin/admin/delete.php?id=".Main::h(Main::u($admin->id))); ?>" method="post">
        <button type="submit" class="btn btn-danger">DELETE</button>
    </form>
  </div>
</div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>
