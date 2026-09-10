<?php 

// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../../private/initialize.php';

require '../../vendor/autoload.php';

Main::require_login_admin();

$id = Main::h(Main::u($_GET['id']));

$user = User::find_by_account_number($id);
if ($user == false) {
  Main::redirect_to(Main::url_for("/bankadmin/user/pending.php"));
}


    $args = [];

    $args['account_status'] = 'Active'; 
    $args['account_active_status'] =  "Active";
    $args['kyc_verified'] =  "1";
    
    $user->merge_attributes($args); // This will now have the form values, not the database values anymore
    $result = $user->save();

    if ($result) {
      require_once SHARED_PATH.'/activate_alert.php';

      // PHPMailer configuration
      $mail = new PHPMailer(true);
      try {
          // SMTP settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
          require_once SHARED_PATH."/mail_setting.php";
          $mail->addAddress($user->email);

          // Email content
          $mail->isHTML(true);
          $mail->Subject = $subject;
          $mail->Body = $message;
          $mail->AltBody = strip_tags($message);

          $mail->send(); // Uncomment to enable email sending
          print "<script>alert('user was approved successfully.');
          window.location.replace('./index.php')
          </script>                    
          ";
      } catch (Exception $e) {
          // Handle email sending error

          print "<script>alert('user was approved successfully.');
          window.location.replace('./index.php/')
          </script>";

          $session->message('user was approved successfully.');
          Main::redirect_to(Main::url_for("/bankadmin/user/"));
      }
    }
    
