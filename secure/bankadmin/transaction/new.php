<?php


 require_once '../../private/initialize.php'; 

Main::require_login_admin();
 if (Main::is_post_request()) {
   $args = $_POST['transfer'];
   // print_r($args);

   $transfer = new Transfer($args);
  if ($args['amount'] >= "1" && $args['transfer_status'] == "Success" && $args['credit'] >="1" && $args['transfer_type'] == "Credit"){ 
   $reciver_email =  $args['reciver_email'];
   print $reciever_account_number = $args['reciever_account_number'];   
   // $find_account =User::find_by_account_number($reciever_account_number);
   $amount = $args['amount'];
  update_account_balance($amount,$reciever_account_number); 
  $result = $transfer->save();
    if ($result === true) {
   $new_id = $transfer->ref_numb;
  $session->message('Transaction Created.');
   Main::redirect_to(Main::url_for("/bankadmin/transaction/view.php?id=".Main::h($new_id)));
 }else {
  // $errors = $result;
 }
   }elseif ($args['amount'] >= "1" && $args['transfer_status'] == "Success" && $args['debit'] >="1" && $args['transfer_type'] == "Debit") {
   $reciver_email =  $args['reciver_email'];
   $reciever_account_number = $args['reciever_account_number'];   
   // $find_account =User::find_by_account_number($reciever_account_number);
   $amount = $args['amount'];
  deduct_account_balance($amount,$reciever_account_number); 
  $result = $transfer->save();
    if ($result === true) {
   $new_id = $transfer->ref_numb;
  $session->message('Transaction Created.');
   Main::redirect_to(Main::url_for("/bankadmin/transaction/view.php?id=".Main::h($new_id)));
   }
 }
}
 else {
   $transfer = new Transfer;
   
 }

?>

<?php require_once SHARED_PATH."/admin_header.php"; ?>

      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3 ">Fund Transfer</h4>
          <div class="card">
            <div class="card-body">
  <?php  echo Main::display_errors($transfer->errors) ;?>
    <form action="<?php Main::h($_SERVER['PHP_SELF']) ?>" method="POST">     
    <?php  require_once 'formFields.php'; ?>                       

  <button type="submit" class="btn btn-primary rounded-0" id="transfer_btn">Transfer</button>
</form>
          </div>
        </div>
    <!-- /#page-content-wrapper -->

  </div>
</div>
  <!-- /#wrapper -->



<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>
