<?php


 require '../../private/initialize.php';

Main::require_login_admin();

$id = Main::h(Main::u($_GET['id']));

$transfer = Transfer::find_by_account_number_id($id);
if ($transfer == false) {
  Main::redirect_to(Main::url_for("/bankadmin/transaction/index.php"));
}

if (Main::is_post_request()) {

  $transfer->delete($id);
  $session->message('Transaction was deleted successfully.');
  Main::redirect_to(Main::url_for("/bankadmin/transaction/index.php"));
}
?>

<?php require_once SHARED_PATH."/admin_header.php"; ?>
  <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3 d-md-none">Account Statements</h4>
<div class="card mt-md-4">
  <div class="card-body">
  	    <a href="<?php echo Main::url_for("/bankadmin/transaction/index.php") ?>">&laquo;Back to Transaction</a><br><br>
    <strong><h1>Delete Transaction!</h1></strong>
    <p>Are You Sure You want to delete this Transaction??</p>
<ul class="list-group mb-3">
    <li class="list-group-item"><h6>Reciever Bank Name: <?php echo Main::h($transfer->reciever_bank_name); ?></h6></li>
    <li class="list-group-item"><h6>Reciever Account Number: <?php echo Main::h($transfer->reciever_account_number); ?></h6></li>
    <li class="list-group-item"><h6>Reciever Name: <?php echo Main::h($transfer->reciever_name); ?></h6></li>
   <li class="list-group-item"><h6>Sender Account Number: <?php echo Main::h($transfer->sender_account_number); ?></h6></li>
    <li class="list-group-item"><h6>Amount: <?php print Main::h($logged_user->currency  . " ") ?><?php echo Main::h($transfer->amount); ?></h6></li>        
    <li class="list-group-item"><h6>Transfer Date: <?php echo Main::h($transfer->transfer_date); ?></h6></li>     
    <li class="list-group-item"><h6>Route Number: <?php echo Main::h($transfer->routing_number); ?></h6></li>
    <li class="list-group-item"><h6>Ref Number: <?php echo Main::h($transfer->ref_numb); ?></h6></li> 
    <li class="list-group-item"><h6>Transfer Description: <?php echo Main::h($transfer->Transfer_description); ?></h6></li>                                                 
  </ul>
    <form action="<?php echo Main::h(Main::url_for("/bankadmin/transaction/delete.php?id=".(Main::u($id)))); ?>" method="post">
        <button type="submit" class="btn btn-danger" name="delete">DELETE</button>
    </form>
         
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
</div>
  <!-- /#wrapper -->

<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>
