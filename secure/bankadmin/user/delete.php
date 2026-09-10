<?php 


require '../../private/initialize.php';

Main::require_login_admin();

$id = Main::h(Main::u($_GET['id']));

$user = User::find_by_account_number($id);
if ($user == false) {
  Main::redirect_to(Main::url_for("/bankadmin/user/index.php"));
}

if (Main::is_post_request()) {

  $result = $user->delete($id);
  $session->message('user was deleted successfully.');
  Main::redirect_to(Main::url_for("/bankadmin/user/index.php"));
}
?>
<?php  require_once SHARED_PATH.'/admin_header.php'; ?>
<div class="">
    <a href="<?php echo Main::url_for("/bankadmin/user/index.php") ?>">&laquo;Back to User</a><br><br>
    <strong><h1>DELETE user!</h1></strong>
    <p>Are You Sure You want to delete this user??</p>
    <h2 class="text-danger"><?php echo Main::h($user->full_name); ?></h2>
    <h2 class="text-danger"><?php echo Main::h($user->account_number); ?></h2>
    <p class="h5">This action cant be Undone!!</p><br><br>
    <form class="" action="<?php echo Main::url_for("/bankadmin/user/delete.php?id=".Main::h(Main::u($user->account_number))); ?>" method="post">
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
