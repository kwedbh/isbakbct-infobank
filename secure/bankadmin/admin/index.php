<?php

 require_once '../../private/initialize.php'; ?>
<?php Main::require_login_admin(); ?>
<?php
 $admins = Admin::find_all(); ?>
<?php require_once SHARED_PATH."/admin_header.php"; ?>
      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3">All Admin</h4>
<div class="card mt-3">
  <div class="card-body">
<div class="table-responsive">
  <table class="table">
    <a href="<?php print Main::url_for("/bankadmin/admin/new.php") ?>">New Admin</a>
    <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <?php foreach ($admins as $admin): ?>
  <tbody>
    <tr>
      <th scope="row"><?php print Main::h($admin->first_name)  ?></th>
      <td><?php print Main::h($admin->last_name) ?></td>
      <td><?php print Main::h($admin->email) ?></td>
      <td><a href="<?php print Main::url_for("/bankadmin/admin/view.php?id=".Main::h($admin->id)) ?>">View</a></td>
      <td><a href="<?php print Main::url_for("/bankadmin/admin/edit.php?id=".Main::h($admin->id)) ?>">Edit</a></td>
      <td><a href="<?php print Main::url_for("/bankadmin/admin/delete.php?id=".Main::h($admin->id)) ?>">Delete</a></td>
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
