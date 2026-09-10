<?php 

require_once '../../private/initialize.php'; ?>

<?php 
Main::require_login_admin();
 $users = User::find_all(); ?>
<?php require_once SHARED_PATH."/admin_header.php"; ?>
      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3">All Users</h4>
<div class="card mt-3">
  <div class="card-body">
<div class="table-responsive">
  <table class="table">
    <a href="<?php print Main::url_for("/bankadmin/user/upload.php") ?>">New User</a>  
    <thead>
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Account No#</th>
      <th scope="col">Balance</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <?php foreach ($users as $user): ?>
  <tbody>
    <tr>
      <th scope="row"><?php print Main::h($user->full_name)  ?></th>
      <td><?php print Main::h($user->account_number) ?></td>
      <td><?php print Main::h($user->currency  . " ") ?><?php print Main::h(number_format($user->account_balance,2)) ?></td>
      <td><a href="<?php print Main::url_for("/bankadmin/user/view.php?id=".Main::h($user->account_number)) ?>">View</a></td>
      <td><a href="<?php print Main::url_for("/bankadmin/user/edit.php?id=".Main::h($user->account_number)) ?>">Edit</a></td>
      <td><a href="<?php print Main::url_for("/bankadmin/user/delete.php?id=".Main::h($user->account_number)) ?>">Delete</a></td>
    </tr>
  </tbody>
<?php endforeach;  ?>
  </table>
</div>
  </div>
</div>          
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>