<?php


 require_once '../../private/initialize.php'; 

Main::require_login_admin();

 $id = (($_GET['id']));

   $transfer = Transfer::find_by_account_number_id($id);
   if ($transfer == false) {
     Main::redirect_to(Main::url_for("/bankadmin/transaction/"));
   }

 if (Main::is_post_request()) {
   $args = $_POST['transfer'];
   $transfer->merge_attributes($args); //This will have the form Values not the Database Values Anymore..
   $result = $transfer->save();

   if ($result === true) {
     $session->message('Transaction was Updated successfully.');
     Main::redirect_to(Main::url_for("/bankadmin/transaction/view.php?id=".Main::h(Main::u($id))));
  }
   else {
     // Show error and redisplay the form
   }
 }else {
  // Display the form
 }
?>
<?php require_once SHARED_PATH."/admin_header.php"; ?>

      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3 ">Fund Transfer</h4>
          <div class="card">
            <div class="card-body">
  <?php  echo Main::display_errors($transfer->errors) ;?>
    <form action="<?php echo Main::h(Main::url_for("/bankadmin/transaction/edit.php?id=".(Main::u($id)))); ?>" method="post">
    <?php  require_once 'formFields.php'; ?>                       

  <button type="submit" class="btn btn-primary rounded-0" id="transfer_btn">Edit Transfer</button>
</form>
          </div>
        </div>
    <!-- /#page-content-wrapper -->

  </div>
</div>
  <!-- /#wrapper -->



<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>
