<?php


require '../../private/initialize.php';

Main::require_login_admin();

$id = $_GET['id']; 
if ($_GET['id'] === '') {
  Main::redirect_to(Main::url_for("/index.php"));
}
if (!isset($_GET['id'])) {
   Main::redirect_to(Main::url_for("/index.php"));
}

 $transfer = Transfer::find_by_account_number($id);
 $user = User::find_by_account_number($id);
if ($transfer == false) {
  Main::redirect_to(Main::url_for("/index.php"));
}

?>
<?php $page_title = 'Account Statements'; ?>

<?php require_once SHARED_PATH."/admin_header.php"; ?>
      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3 d-md-none">Account Statements</h4>
<div class="card mt-md-4">
  <div class="card-body">
<div class="table-responsive">
  <table class="table">
     <caption class="h5 font-weight-lighter text-muted" style="caption-side: top;">All Transactions</caption> 
     <caption class="h5 font-weight-lighter text-muted" style="caption-side: bottom;">Avaliable Balance : <?php print Main::h($logged_user->currency  . " "). Main::h($user->account_balance) ?></caption>      
    <thead>
    <tr>
      <th scope="col">Reciver's Account Number</th>
      <th scope="col">Transaction Date</th>
      <th scope="col">Refrence No#</th>
      <th scope="col">Debit (Dr)</th>
      <th scope="col">Credit (Cr)</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
<?php
 foreach ($transfer as $transfers): ?>  
  <tbody>
    <tr>
      <th scope="row"><?php print Main::h($transfers->reciever_account_number) ?></th>
      <td><?php print Main::h($transfers->transfer_date) ?></td>
      <td><?php print Main::h($transfers->ref_numb) ?></td>
      <td><?php print Main::h($logged_user->currency  . " ") ?><?php print Main::h($transfers->debit) ?></td>
      <td><?php print Main::h($logged_user->currency  . " ") ?><?php print Main::h($transfers->credit) ?></td>
      <td><?php print Main::h($transfers->transfer_status) ?></td>
    </tr>
  </tbody>
<?php endforeach; ?>
  </table>
</div>         
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
</div>
  <!-- /#wrapper -->

<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>