<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../private/initialize.php";


// die('dddd');


if (Main::is_post_request()) {

  if ($logged_user->transfer_status == "Disable") {
  
    print "<script>alert('".$logged_user->transfer_status_message."')</script>";
  
    print "<script>window.location.replace('index.php');</script>";
    
    die();
  }  

  //Load Composer's autoloader
require '../vendor/autoload.php';

  $args = $_POST['transfer'];
  
  $args['cot'] = $logged_user->cot;
  
  $args['tax_id'] = $logged_user->tax_id;
  
  $args['bvt'] = $logged_user->bvt;

  // print_r($args);

  // die();

  if ($args['amount'] > $logged_user->account_balance) {
    
    print "<script>alert('Insufficient balance to complete this transaction.')</script>";

    print "<script>window.location.replace('index.php');</script>";
    
    die();

  }

  $transfer = new Transfer($args);

  $result = $transfer->save();

  if (!$result) {
    
    print "<script>alert('There was problem with your transfer.')</script>";

    print "<script>window.location.replace('index.php');</script>";
    
    die();

  }

  $new_id = $transfer->id;

  if ($logged_user->account_active_status == "Easy") {

    // if ($logged_user->account_active_status == "Complex") {    



    $sql = "UPDATE transfers SET otp_confirmed = '1' ";

    $sql .= "WHERE id = '".$new_id."' ";
    
    $result = $db->query($sql);

    if ($result) {

      print "<script>alert('Please enter your OTP code')</script>";

      print "<script>window.location.replace('otp.php?id=".$new_id."');</script>";

      die();

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
  $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

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
                    <h1>Bank Fund Transfer</h1>
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

    <span class="float-start">Transaction Type</span>

    <span class="float-end" id="trax_type"></span>

  </li>


  <li class="list-group-item my-2 py-3 border">

<span class="float-start">Account Number</span>

<span class="float-end" id="account_number"></span>

</li>

  <li class="list-group-item my-2 py-3 border">

    <span class="float-start">Account Name</span>

    <span class="float-end" id="account_name"></span>

  </li>

  <li class="list-group-item my-2 py-3 border">

<span class="float-start">Bank Name</span>

<span class="float-end" id="bank_name"></span>

</li>

<li class="list-group-item my-2 py-3 border">

<span class="float-start">Bank Address</span>

<span class="float-end" id="bank_address"></span>

</li>

<li class="list-group-item my-2 py-3 border">

<span class="float-start">Bank State</span>

<span class="float-end" id="bank_state"></span>

</li>

<li class="list-group-item my-2 py-3 border">

<span class="float-start">Bank Country</span>

<span class="float-end" id="bank_country"></span>

</li>

<li class="list-group-item my-2 py-3 border">

<span class="float-start">IBAN / Routing Number</span>

<span class="float-end" id="iban_routing"></span>

</li>

<li class="list-group-item my-2 py-3 border d-none">

<span class="float-start">Swift Code</span>

<span class="float-end" id="swift_code_b"></span>

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
                                            
                                            <label for="">Transfer Type</label>
                                            <select style="height: 50px !important;"  class="form-control" name="transfer[transaction_type]" id="transaction_type">
                                                <!-- <option value="">Select</option> -->
                                                <?php foreach (Transfer::BankTransferTypes as $key): ?>
                                                <option value="<?php print $key  ?>"><?php print $key  ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            
                                            </div>
                                                </div>
                                            
                                            <div id="show_form" class="mb-4">    
                                            
                                            <div class="row">
                                            <div class="mb-3 form-group col-md-6">
                                                <label for="reciever_account_number">Account Number</label>
                                                <input required style="height: 50px !important;"  type="number" class="form-control rounded-0" id="reciever_account_number" name="transfer[reciever_account_number]" value="">
                                              </div>
                                            
                                                <div class="mb-3 form-group col-md-6">
                                                  <label for="reciever_name">Account Name</label>
                                                  <input required style="height: 50px !important;"  type="text" class="form-control rounded-0" id="reciever_name" name="transfer[reciever_name]" value="">
                                                </div>   
                                              </div>
                                              <div class="row">
                                            
                                              <div class="mb-3 form-group col-md-6">
                                                  <label for="reciever_bank_name">Bank Name</label>
                                                  <input required style="height: 50px !important;"  type="text" class="form-control rounded-0" id="reciever_bank_name" name="transfer[reciever_bank_name]" value="">
                                            
                                                  <!-- <select name="transfer[reciever_bank_name]" id="reciever_bank_name" class="form-control rounded-0">
                                                    <?php //foreach (Banks::find_all() as $key): ?>
                                                      <option value="<?php //print Main::h($key->name) ?>"><?php //print Main::h($key->name) ?></option>
                                                    <?php //endforeach ?>
                                                  </select>  -->
                                                </div>
                                            
                                                <div class="mb-3 form-group col-md-6">
                                                  <label for="rec_bank_address">Bank Address</label>
                                                  <input required style="height: 50px !important;"  type="text" class="form-control rounded-0" id="rec_bank_address" name="transfer[rec_bank_address]" value="">
                                                </div>
                                            
                                                <div class="mb-3 form-group col-md-6">
                                                  <label for="rec_bank_state">Bank State</label>
                                                  <input required style="height: 50px !important;"  type="text" class="form-control rounded-0" id="rec_bank_state" name="transfer[rec_bank_state]" value="">
                                                </div>
                                            
                                                <div class="mb-3 form-group col-md-6">
                                                  <label for="rec_bank_country">Bank Country</label>
                                                  <select class="form-control" id="rec_bank_country" name="transfer[rec_bank_country]">
                                                    <?php
                                                    
                                                    require_once ("../private/country.php");
                                                    
                                                    foreach ($countries AS $country): ?>
                                                    <option value="<?php print $country ?>"><?php print $country ?></option>
                                                    <?php endforeach ?>
                                                  </select>
                                                </div>
                                            
                                              <div class="mb-3 form-group col-md-6">
                                                <label for="routing_number">IBAN / Routing Number</label>
                                                <input required style="height: 50px !important;" type="text" class="form-control rounded-0" id="routing_number" name="transfer[routing_number]" value="">
                                              </div>
                                             
                                            </div>
                                              <div class="row">
                                                <div class="mb-3 form-group col-md-6 d-none">
                                                  <label for="sender_account_number">Sender's Account Number</label>
                                                  <input required style="height: 50px !important;" readonly  type="text" class="disable form-control" id="sender_account_number" value="<?php print Main::h($logged_user->account_number) ?>" name="transfer[sender_account_number]" >
                                                </div>
                                                <div class="mb-3 form-group col-md-6 d-none">
                                                  <label for="currency">Currency</label>
                                                  <select name="" id="" class="form-select">
                                            
                                                  <?php 
                                                  
                                                  $currencies = array(
                                                    'USD' => 'United States Dollar (USD)',
                                                    'EUR' => 'Euro (EUR)',
                                                    'GBP' => 'British Pound Sterling (GBP)',
                                                    'JPY' => 'Japanese Yen (JPY)',
                                                    'CHF' => 'Swiss Franc (CHF)',
                                                    'CAD' => 'Canadian Dollar (CAD)',
                                                    'AUD' => 'Australian Dollar (AUD)',
                                                    'NZD' => 'New Zealand Dollar (NZD)',
                                                    'CNY' => 'Chinese Yuan (CNY)',
                                                    'INR' => 'Indian Rupee (INR)',
                                                    'BRL' => 'Brazilian Real (BRL)',
                                                    'ZAR' => 'South African Rand (ZAR)',
                                                    'RUB' => 'Russian Ruble (RUB)',
                                                    'SGD' => 'Singapore Dollar (SGD)',
                                                    'HKD' => 'Hong Kong Dollar (HKD)'
                                                );
                                              
                                            foreach ($currencies as $key => $value): ?>
                                                    <option <?php if ($logged_user->currency == $value) {
                                                      print "selected";
                                                    } ?> value="<?php print $key ?>"><?php print $key ?></option>
                                            <?php endforeach; ?>        
                                                  </select>
                                                </div>
                                                <div class="mb-3 form-group col-12">
                                                  <label for="amount">Amount</label>
                                                  <input required style="height: 50px !important;"  type="text" class="form-control" id="amount" name="transfer[amount]" >
                                                </div>
                                            
                                                <div class="mb-3 form-group col-6 d-none">
                                                  <label for="amount">Currency</label>
                                                  <!-- <input required required style="height: 50px !important;"  type="text" class="form-control rounded-0" id="amount" name="transfer[amount]" > -->
                                                  <select name="" id="currency_type" class="form-control rounded-0" style="height: 50px !important;">
                                                    <?php foreach ($currencies as $key => $value ): ?>
                                            
                                                      <option <?php if ($logged_user->currency == $key) {
                                                      print "selected";
                                                    } ?> value="<?php print $key ?>"><?php print $value ?></option>
                                            
                                                    <?php endforeach ?>
                                                  </select>
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
                                                </div>
                                                
                                                <button class="btn btn-dark btn-lg" type="button" id="proceed_btn">Proceed</button>   
                                            
                                            </div>    
                                                                                    
                                            <div id="my_btns" class="mb-4">
                                            
                                            <?php //if ($logged_user->transfer_status == "Enable"): ?>
                                            
                                            <div>
                                                <button class="btn btn-dark btn-lg" type="submit" id="">Transfer</button>
                                            </div>
                                            
                                            <?php //endif ?>
                                            
                                            <!-- <?php //if ($logged_user->transfer_status =="Disable"): ?>
                                            
                                              <div>
                                                <button class="btn btn-dark btn-lg" type="button" id="disable_btn">Transfer</button>
                                            </div> -->
                                            
                                            <?php //endif; ?>
                                            
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