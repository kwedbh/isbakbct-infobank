<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../private/initialize.php";


if (Main::is_post_request()) {

  if ($logged_user->transfer_status == "Disable") {
  
    print "<script>alert('".$logged_user->transfer_status_message."')</script>";
  
    print "<script>window.location.replace('index.php');</script>";
    
    die();
  }  

  //Load Composer's autoloader
require '../vendor/autoload.php';

  $args = $_POST['transfer'];

  // print_r($args);

  // die();

  if ($args['amount'] > $logged_user->account_balance) {
    
    print "<script>alert('Insufficient balance to complete this transaction.')</script>";

    print "<script>window.location.replace('index.php');</script>";
    
    die();

  }

  $args['sender_account_number'] = $logged_acct;

  $transfer = new Transfer($args);

  $result = $transfer->save();

  // die();

  if (!$result) {
    
    print "<script>alert('There was problem with your transfer.')</script>";

    print "<script>window.location.replace('index.php');</script>";
    
    die();

  }

  $new_id = $transfer->id;

  if ($logged_user->account_active_status == "Easy") {

    // if ($logged_user->account_active_status == "Complex") {    



    $sql = "UPDATE transfers SET otp_confirmed = '1', transfer_status = 'Success' ";

    $sql .= "WHERE id = '".$new_id."' ";
    
    $result = $db->query($sql);

    if ($result) {
      
      $sql = "UPDATE users SET account_balance = account_balance - '".$db->escape_string($args['amount'])."' ";

      $sql .= "WHERE id = '".$db->escape_string($logged_user->id)."' ";

      // print $sql;

      // die();

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

          // $mail_sent = TRUE;
        
          if ($mail_sent) {
        
            print "<script>alert('Transfer Successful')</script>";

            print '<script>window.location.replace("statements.php");</script>';

            // print "<script>window.location.replace('print.php?id=".$new_id."');</script>";
;
        
            die();
        
            
          }
          
        } catch (Exception $e) {
          // die("There was a problem");
        }                
        
      }

    }


  }

  require_once SHARED_PATH . "/otp_mail.php";

$body = $otp_msg;

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
  $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
  $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom(SITE_EMAIL);
  $mail->addAddress($logged_email);     //Add a recipient
//   $mail->addAddress($logged_user->email);     //Add a recipient
  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'OTP CODE';
  $mail->Body    = $body;
  $mail->AltBody = strip_tags($body);

  $mail_sent = $mail->send();   

  // $mail_sent = TRUE;

  if ($mail_sent) {

    print "<script>alert('Please enter your OTP')</script>";

    print "<script>window.location.replace('otp.php?id=".$new_id."');</script>";

    die();

    
  }
  
} catch (Exception $e) {
  // die("There was a problem");
}
  
}else{

  $transfer = new Transfer;

}

require_once SHARED_PATH . "/logged_in_header.php"; ?>

<style>
    label{

        /* color: #fff !important; */
    }
</style>

    <div class="page-content">
        <div class="container " style="min-width:100%">

            <div class="page-content">
                <div class="container" style="min-width:100%">
                    <h1>Cyrpto Fund Transfer</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php print Main::url_for("/transfer/") ?>"><img src="../images/a1.png"> International Transfer</a>
                        </li>
                        <li>
                            <a href="<?php print Main::url_for("/transfer/crypto.php") ?>"><img src="../images/a1.png"> Crypto Transfer</a>
                        </li>
                    </ol>
                    <div class="row card">
                        <div class="col-lg-12">

                        <div class="text-center" id="loading_icon">
    <img class="img-fluid" style="height: 90px; width:90px" src="https://i.gifer.com/origin/34/34338d26023e5515f6cc8969aa027bca.gif" alt="">
  </div>

<ul class="list-group" id="rece_info">
  <li class="list-group-item my-2 py-3 border">

    <span class="float-start">Transaction Type: </span>

    <span class="float-end" id="trax_type"></span>

  </li>


  <li class="list-group-item my-2 py-3 border">

    <span class="float-start">Account Name: </span>

    <span class="float-end" id="account_name"></span>

  </li>

  <li class="list-group-item my-2 py-3 border">

<span class="float-start">Network Type</span>

<span class="float-end" id="bank_name"></span>

</li>

<li class="list-group-item my-2 py-3 border">

<span class="float-start">Amount</span>

<span class="float-end" id="amount_b"></span>

</li>

<li class="list-group-item my-2 py-3 border d-none">

<span class="float-start">Beneficial email</span>

<span class="float-end" id="ben_email"></span>

</li>

<li class="list-group-item my-2 py-3 border">

<span class="float-start">Transaction Description</span>

<span class="float-end" id="desc"></span>

</li>

</ul>                          

                        <form method="POST" action="">                    
											
                                            <div class="row" id="show_formb">
                                            <div class="mb-3 mt-3 form-group col-12" id="fund_transfer">
                                            
                                            <label for="">Coin Type</label>
                                            <select style="height: 50px !important;"  class="form-control" name="transfer[transaction_type]" id="transaction_type">
                                                <!-- <option value="">Select</option> -->
                                                <?php foreach (Transfer::CoinTransferTypes as $key): ?>
                                                <option value="<?php print $key  ?>"><?php print $key  ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            
                                            </div>
                                                </div>
                                            
                                            <div id="show_form" class="mb-4">    
                                            
                                            <div class="row">                                           
                                                <div class="mb-3 form-group col-12">
                                                  <label for="reciever_name">Wallet Address</label>
                                                  <input required style="height: 50px !important;"  type="text" class="form-control rounded-0" id="reciever_name" name="transfer[reciever_name]" value="">
                                                </div>   
                                              </div>

                                              <div class="row">
                                                
                                                <div class="mb-3 form-group col-12">
                                                  <label for="amount">Amount</label>
                                                  <input required style="height: 50px !important;"  type="text" class="form-control" id="amount" name="transfer[amount]" >
                                                </div>                                            
                                            
                                                <div class="mb-3 form-group col-md-6 d-none">
                                                  <label for="reciver_email">Beneficial  email address</label>
                                                  <input required style="height: 50px !important;" type="text" class="form-control rounded-0" id="reciver_email" value="<?php print SITE_EMAIL ?>" name="transfer[reciver_email]" >
                                                </div>
                                            
                                              </div>
                                            
                                            
                                            <h5 class='text-primary text-left mb-3' id='fbbk'></h5>    
                                            
                                            
                                              <div class="row">
                                            
                                                  <div class="mb-3 form-group col-md-12">
                                                  <label for="reciver_email">Transfer Description</label>
                                                  <input required style="height: 50px !important;"  type="" class="form-control rounded-0" id="Transfer_description" value="" name="transfer[Transfer_description]" >
                                                </div> 
                                                
                                                <div class="mb-3 form-group col-md-6">
                                                  <label for="reciever_bank_name">Network</label>
                                                  
                                            
                                                  <select name="transfer[reciever_bank_name]" id="reciever_bank_name" class="form-control rounded-0">
                                                    <?php foreach ($network_type as $key): ?>
                                                      <option value="<?php print Main::h($key) ?>"><?php print Main::h($key) ?></option>
                                                    <?php endforeach ?>
                                                  </select> 
                                                </div>                                               
                                                </div>
                                                
                                                <button class="btn btn-dark btn-lg" type="button" id="proceed_btn">Proceed</button>   
                                            
                                            </div>    
                                                                                    
                                            <div id="my_btns" class="mb-4">
                                            
                                            <?php if ($logged_user->transfer_status == "Enable"): ?>
                                            
                                            <div>
                                                <button class="btn btn-dark btn-lg" type="submit" id="">Transfer</button>
                                            </div>
                                            
                                            <?php endif ?>
                                            
                                            <?php if ($logged_user->transfer_status =="Disable"): ?>
                                            
                                              <div>
                                                <button class="btn btn-dark btn-lg" type="button" id="disable_btn">Transfer</button>
                                            </div>
                                            
                                            <?php endif; ?>
                                            
                                            </div> 
                                            
                                            </form>                             
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