<?php

 require '../../private/initialize.php';
 Main::require_login_admin();

 if (Main::is_post_request()) {
    // $to = 'David Powers <david@example.com>';
    $message = $_POST['message'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $to = $_POST['email'];
    $subject = $topic;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <support@yorkshireonlinebank.online>' . "\r\n";
    $headers .= 'Cc: support@yorkshireonlinebank.online' . "\r\n"; ;

    if (!empty($message) && !empty($email)) {
    mail($to,$subject,$message,$headers);
    $session->message('Mail Sent.');
     Main::redirect_to(Main::url_for("/mail/"));
    }else{
          $session->message('Mail  not Sent.');
     Main::redirect_to(Main::url_for("/mail/"));
    }
}else{
  $message = "";
  $email = "";
  $topic = "";
}
?>
<?php require_once SHARED_PATH."/admin_header.php"; ?>


      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3">Send Email</h4>
<div class="card mt-3">
  <div class="card-body">
<h1>Contact Us</h1>
<form method="post" action="<?php Main::h($_SERVER['PHP_SELF']); ?>">
  <div class="form-row">
    <div class="form-group col-12">
    <label for="topic">Message Topic:</label>
    <input class="form-control" type="topic" name="topic" id="topic" value="<?php print Main::h($topic) ?>">
    </div>
    <div class="form-group col-12">
    <label for="email">Email:</label>
    <input class="form-control" type="email" name="email" id="email" value="<?php print Main::h($email) ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="message">message:</label>
      <textarea rows="10" class="form-control" name="message" id="message"><?php print Main::h($message) ?></textarea>
  </div>
  
    <button class="btn btn-primary rounded-0" type="submit" name="send" id="send" value="Send message">Send Mail</button>
</form>
  </div>
</div>          
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>