<?php 

require '../../private/initialize.php';

Main::require_login_admin();


 $id = (($_GET['id']));

   $site = Site::find_by_id($id);
   if ($site == false) {
     Main::redirect_to(Main::url_for("/site/"));
   }

 if (Main::is_post_request()) {
   $args = $_POST['site'];
   $site->merge_attributes($args); //This will have the form Values not the Database Values Anymore..
   $result = $site->save();

   if ($result === true) {
     $session->message('Site was Updated successfully.');
     Main::redirect_to(Main::url_for("/site/view.php?id=".Main::h(Main::u($id))));
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
          <h4 class="text-center mt-3 mb-3">Edit Site</h4>
<div class="card mt-3">
  <div class="card-body">
    <?php  echo Main::display_errors($site->errors) ;?>
<form action="<?php echo Main::h(Main::url_for("/site/edit.php?id=".(Main::u($id)))); ?>" method="post">
  <?php require_once 'formFields.php'; ?>
  <button type="submit" id=""class="btn btn-primary rounded-0">Edit Site</button>
</form>

  </div>
</div>          
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>
