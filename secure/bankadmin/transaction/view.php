<?php

 require_once '../../private/initialize.php';

Main::require_login_admin();

 $id = Main::h(Main::u($_GET['id']));

if ($_GET['id'] === '') {
  Main::redirect_to(Main::url_for("/bankadmin/transaction/index.php"));
}
if (!isset($_GET['id'])) {
   Main::redirect_to(Main::url_for("/bankadmin/transaction/index.php"));
}

$transfer = Transfer::find_by_account_number_id($id);
if ($transfer == false) {
  Main::redirect_to(Main::url_for("/bankadmin/transaction/index.php"));
}

$reciever_account_number = $transfer->reciever_account_number;

$user = User::find_by_account_number($reciever_account_number);

// require_once SHARED_PATH."/credit_transaction.php"; 
// mail($to,$subject,$message,$headers);


if (Main::is_post_request()) {
  

  $args = $_POST;

  $sql = "UPDATE transfers SET transfer_date = '".$args['date_time']."'  ";

  $sql .= "WHERE ref_numb = '".$transfer->ref_numb."' ";

  $result = $db->query($sql);

  if ($result) {
    $session->message("Date Updated");

    Main::redirect_to(Main::url_for("/bankadmin/transaction/"));
  }
}

 ?>
<?php require_once SHARED_PATH."/admin_header.php"; ?>
      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3"><?php print Main::h($transfer->ref_numb) ?></h4>
<div class="card mt-3">
  <div class="card-body">
  <ul class="list-group">

    <li class="list-group-item"><h6>Sender Acc/No: <?php echo Main::h($transfer->sender_account_number); ?></h6></li>
    <li class="list-group-item"><h6>Reciever Name: <?php echo Main::h($transfer->reciever_name); ?></h6></li>
    <li class="list-group-item"><h6>Reciever's Account Number: <?php echo Main::h($transfer->reciever_account_number); ?></h6></li>
    <li class="list-group-item"><h6>Reciever Bank Name: <?php echo Main::h($transfer->reciever_bank_name); ?></h6></li>
    <li class="list-group-item"><h6>Reciever Email: <?php echo Main::h(MASTER_EMAIL); ?></h6></li>   
    <li class="list-group-item"><h6>Amount Sent : <?php print Main::h($logged_user->currency  . " ") ?><?php echo Main::h($transfer->amount); ?></h6></li> 
    <li class="list-group-item"><h6>BVT Code: <?php echo Main::h($transfer->bvt); ?></h6></li>       
    <li class="list-group-item"><h6>COT Code: <?php echo Main::h($transfer->cot_code); ?></h6></li>       
    <li class="list-group-item"><h6>TAX Code: <?php echo Main::h($transfer->tax_code); ?></h6></li>       
    <li class="list-group-item"><h6>OTP Code: <?php echo Main::h($transfer->otp_code); ?></h6></li>       
    <li class="list-group-item"><h6>Transfer Date: <?php echo Main::h($transfer->transfer_date); ?></h6></li>
    <li class="list-group-item"><h6>Transfer Status: <?php echo Main::h($transfer->transfer_status); ?></h6></li>     
    <li class="list-group-item"><h6>Reference Number: <?php echo Main::h($transfer->ref_numb); ?></h6></li>
    <li class="list-group-item"><h6>Credit: <?php print Main::h($logged_user->currency  . " ") ?><?php echo Main::h($transfer->credit); ?></h6></li>
    <li class="list-group-item"><h6>Debit: <?php print Main::h($logged_user->currency  . " ") ?><?php echo Main::h($transfer->debit); ?></h6></li>
    <li class="list-group-item"><h6>Description: <?php echo Main::h($transfer->Transfer_description); ?></h6></li>                                               
  </ul>

  <div class="mt-3">

<form action="" method="post">
      <div class="row">
    <div class="col-6">
      <label for="">Edit Date / Time</label>
      <input name="date_time" type="text" class="form-control">
    </div>
  </div>

   <button class="btn btn-danger" type="submit">Update</button>
</form>    

  </div>
  </div>
</div>          
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>
