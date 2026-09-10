<?php

 require_once '../../private/initialize.php'; 
 
Main::require_login_admin(); 

require_once SHARED_PATH."/admin_header.php"; ?>
      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3">All Banks</h4>
<div class="card mt-3">
  <div class="card-body">
<div class="table-responsive">
  <table class="table">
    <a href="new.php">New Bank</a>
    <thead>
    <tr>
      <th scope="col">Bank  Name</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <?php foreach (Banks::find_all() as $bank): ?>
  <tbody>
    <tr>
      <th scope="row"><?php print Main::h($bank->name)  ?></th>
      <td><a href="">View</a></td>
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
