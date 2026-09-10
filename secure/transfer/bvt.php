<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../private/initialize.php";

  //Load Composer's autoloader
require '../vendor/autoload.php';


$id = $_GET['id'];


$transfer = Transfer::find_by_id($id);

if (!$transfer) {
    Main::redirect_to(Main::url_for("/transfer/"));
}

if ($transfer->sender_account_number != $logged_acct) {    
    
    print "<script>alert('There was problem.')</script>";

    print "<script>window.location.replace('index.php');</script>";

    die();
}


if ($transfer->bvt_confirmed == 1) {
//  $session->message("Transfer successfully");
 Main::redirect_to(Main::url_for("/transfer/print.php?id=".Main::h($transfer->id)));
}

if (isset($_POST['otp_confirm'])) {
  
 sleep(1);
 $otp_code_confirm = $_POST['otp_code_confirm'] ?? "";
 if ($otp_code_confirm == $transfer->bvt) {
  

    $sql = "UPDATE transfers SET bvt_confirmed = '1', transfer_status = 'Success' ";

    $sql .= "WHERE id = '".$transfer->id."' ";
    
    $result = $db->query($sql);

    if ($result) {
      
      $sql = "UPDATE users SET account_balance = account_balance - '".$db->escape_string($transfer->amount)."' ";

      $sql .= "WHERE id = '".$db->escape_string($logged_user->id)."' ";

    //   print $sql;

    //   die();

      $result = $db->query($sql);

      if ($result) {

        require_once SHARED_PATH . "/trans_type_transaction.php";        


        $body = $trans_msg;

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = MAIL_SERVER;                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = SITE_EMAIL;                     //SMTP username
          $mail->Password   = MAIL_PASSWORD;                               //SMTP password
          $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
          //Recipients
          $mail->setFrom(SITE_EMAIL);
          $mail->addAddress($logged_email);     //Add a recipient
          $mail->addAddress(SITE_EMAIL);     //Add a recipient
          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject =  SITE_NAME . ' ' . $transfer->transfer_type . ' Transaction Notification';
          $mail->Body    = $body;
          $mail->AltBody = strip_tags($body);

          // PRINT $mail->Subject;

          // die();
        
          $mail_sent = $mail->send();   

          //  $mail_sent = TRUE;
        
          if ($mail_sent) {
        
            print "<script>alert('Transfer Successful')</script>";

            print "<script>window.location.replace('print.php?id=".$transfer->id."');</script>";

            // print '<script>window.location.replace("statements.php");</script>';

            // Redirect the current page to index.php after a delay (e.g., 2 seconds)
            print '<script>
    window.onload = function() {
        window.location.replace("index.php");
    };
</script>';
        
            die();
        
            
          }
          
        } catch (Exception $e) {
          die("There was a problem");
        }                
        
      }

    }

}else{
   $session->message("Invalid BVT code entered.");
 Main::redirect_to(Main::url_for("/transfer/bvt.php?id=".Main::h($id)));
}
}

require_once SHARED_PATH . "/logged_in_header.php"; 

?>

<style>
    label{

        /* color: #fff !important; */
    }
</style>

    <div class="page-content">
        <div class="container " style="min-width:100%">

            <div class="page-content">
                <div class="container" style="min-width:100%">
                    <h1>Enter your One time code</h1>
                    <div class="row card">
                        <div class="col-lg-12">

                        <form action="?id=<?php print $id ?>" class="form-inline d-flex justify-content-center mt-3" method="POST">
                        <?php echo Main::display_session_message(); ?>
                        <br>
<div class="form-group mx-sm-3 mb-2">
<label for="otp" class="sr-only">OTP</label>
<input required type="text" class="form-control rounded-0" id="otp" placeholder="Enter the BVT CODE" name="otp_code_confirm">
</div>
<button id="otp_confirm" type="submit" class="btn btn-primary mb-2 rounded-0 mr-2" name="otp_confirm">Confirm</button>
<img class="d-none" id="loading" src="<?php print Main::url_for("/images/loading.gif") ?>" style="height: 50px; width: 40px;">
</form>

<ul class="list-group">
<li class="list-group-item"><h6>Receiver Bank Name: <?php echo Main::h($transfer->reciever_bank_name); ?></h6></li>
<li class="list-group-item"><h6>Receiver Account Number: <?php echo Main::h($transfer->reciever_account_number); ?></h6></li>
<li class="list-group-item"><h6>Receiver Name: <?php echo Main::h($transfer->reciever_name); ?></h6></li>
<li class="list-group-item d-none"><h6>Receiver Email: <?php echo Main::h($transfer->reciver_email); ?></h6></li>
<li class="list-group-item"><h6>Sender Account Number: <?php echo Main::h($transfer->sender_account_number); ?></h6></li>
<li class="list-group-item"><h6>Reference Number: <?php echo Main::h($transfer->ref_numb); ?></h6></li>
<li class="list-group-item"><h6>Amount: <?php print $logged_user->currency  . " "?><?php echo number_format($transfer->amount,2); ?></h6></li>
<li class="list-group-item"><h6>Transfer Date: <?php echo Main::h($transfer->transfer_date); ?></h6></li>
<li class="list-group-item"><h6>Route Number: <?php echo Main::h($transfer->routing_number); ?></h6></li>
<li class="list-group-item"><h6>Ref Number: <?php echo Main::h($transfer->ref_numb); ?></h6></li>
<li class="list-group-item"><h6>Transaction Date: <?php echo Main::h($transfer->transfer_date); ?></h6></li>
</ul>                              

                         
                    </div>
                </div>

            </div>
        </div>

        <script src="../bankassets/js/jquery.bundle.js.download"></script>


    </div>
    </div>

    <script src="../bankassets/js/chart.js.download"></script>
    </div>



    <style>
        body {
            background-color: #140123;
        }
    </style>

<?php require_once SHARED_PATH . "/footer.php" ;