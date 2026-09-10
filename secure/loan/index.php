<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

require_once "../private/initialize.php"; 

Main::require_login();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  

    // print_r($_POST);

    // die();
   

    $amount = $_POST['amount'] ?? '0';

    $facility = $_POST['facility'] ?? '';

    $years = $_POST['years'] ?? '';

    $reason = $_POST['reason'] ?? '';

    
$subject = "Loan Request";

 $body = "
<html>
<head>
<title>New Info</title>
</head>
<body>
<p>

Amount: ".$amount." <br>

Facility: ".$facility." <br>

Years: ".$years." <br>

Reason: ".$reason." <br>

</p>
</body>
</html>
";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.secanov.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'support@secanov.com';                     //SMTP username
    $mail->Password   = 'Fakepassword123';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('support@secanov.com');
    $mail->addAddress('support@secanov.com');     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Loan request';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail_sent = $mail->send();   

    if ($mail_sent) {
      print "<script> alert('Please wait while we verify your loan information.') </script>";
      // print "<script>window.location.replace('https://www.ketonec.com/secured/user/dashboard');</script>";
      print "<script>window.location.replace('index.php');</script>";

      
    }
    
} catch (Exception $e) {
    die("There was a problem");
}

die();


    
}

require_once SHARED_PATH . "/logged_in_header.php"; 




?> 

        <div class="container " style="min-width:100%">

            <div class="page-content">
                <div class="container" style="min-width:100%">
                    <h1>New Loan Request</h1>

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Loan Request</li>
                    </ol>
                    <div class="row">
                        <!-- Gold plan start-->
                        <div class="col-lg-4">
                            <div class="content-area card">
                                <div class="card-innr">
                                    <div class="card-head has-aside">
                                        <h4 class="card-title">Gold <br> Loan </h4>
                                        <div class="card-opt"><a href="#" data-toggle="modal" data-target="#Gold" class="btn btn-primary">Get Loan</a>
                                        </div>
                                    </div>
                                    <p>

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="Gold" tabindex="-1">
                            <div class="modal-dialog modal-dialog-md modal-dialog-centered">
                                <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><i class="ti fa-solid fa-xmark"></i></a>
                                    <div class="popup-body">
                                        <h4 class="popup-title">Gold Loan Request</h4>
                                        <p>
                                            When you create a Loan Request account on
                                            <b>
                                          
                                        </b> you get 6% yearly as <b>interest </b> on your Loan Request
                                        </p>
                                        <div class="copy-wrap mgb-0-5x"><span class="copy-feedback"></span>


                                            <form action="" method="post">
                                                <div class="input-group wd-150">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            $ </div>
                                                    </div>
                                                    <input id="amount" name="amount" required="" type="number" placeholder="Enter Loan Amount" class="form-control">
                                                    <input type="hidden" name="pname" value="Gold">
                                                    <input type="hidden" name="max" value="">
                                                    <input type="hidden" name="min" value="">
                                                    <input type="hidden" name="interest" value="6">



                                                    <div class="row">
                                                        <div class="buysell-field form-group col-lg-6">
                                                            <div class="form-label-group">
                                                                <label class="form-label" for="buysell-amount">Credit Facility</label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <select type="text" class="form-control form-control-lg" id="facility" name="facility" required>
                                                 <option selected value="">Select Loan/Credit Facility</option>
                                                 <option value="Personal Home Loans">Personal Home Loans</option>
                                                 <option value="Commercial Mortgage">Defi Loan</option>
                                                 <option value="Joint Mortgage ">Joint Mortgage </option>
                                                 <option value="Automobile Loans ">Automobile Loans </option>
                                                 <option value="Salary loans">Salary loans</option>
                                                 <option value="Secured Overdraft">Secured Overdraft</option>
                                                 <option value="Contract Finance">Contract Finance</option>
                                                 <option value="Secured Term Loans">Secured Term Loans</option>
                                                 <option value="StartUp/Products Financing">StartUp/Products Financing</option>
                                                 <option value="Local Purchase Orders Finance">Local Purchase Orders Finance</option>
                                                 <option value="Operational Vehicles">Operational Vehicles</option>
                                                 <option value="Revenue Loans and Overdraft">Revenue Loans and Overdraft</option>
                                                 <option value="Retail TOD">Retail TOD</option>
                                                 <option value="Commercial Mortgage">Commercial Mortgage</option>
                                                 
                                                 <option value="Office Equipment">Office Equipment</option>
                                                 <option value="Health Finance Product Guideline">Health Finance Product Guideline</option><option value="Health Finance">Health Finance</option>
                                             </select>
                                                            </div>

                                                        </div>
                                                        <!-- .buysell-field -->
                                                        <div class="buysell-field form-group col-lg-6">
                                                            <div class="form-label-group">
                                                                <label class="form-label" for="buysell-amount">Repayment Tenure</label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <select type="text" class="form-control form-control-lg" id="tenure" name="years" required>
                                                <option value="" selected>Payment Tenure</option>
                                                <option value="1 Year">12 Months</option>
                                                <option value="2 years">2 Years</option>
                                                <option value="3 years">3 Years</option>
                                                <option value="4 years">4 Years</option>
                                                <option value="5 years">5 Years</option>
                                                <option value="6 years">6 Years</option>
                                                <option value="7 years">7 Years</option>
                                                <option value="8 years">8 Years</option>
                                                <option value="9 years">9 Years</option>
                                                <option value="10 years">10 Years</option>
                                            </select>
                                                            </div>

                                                        </div>
                                                        <div class="buysell-field form-group col-lg-12">
                                                            <div class="form-label-group">
                                                                <label class="form-label" for="buysell-amount">Purpose</label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <textarea type="text" class="form-control form-control-lg" cols="8" id="reason" name="reason" placeholder="Briefly exlain why you're requesting for this loan" required></textarea>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <br>



                                                    <br>
                                                    <p>
                                                        <em class="fas fa-info-circle"></em><strong style="color:blue"> Terms and Conditions </strong><br>
                                                        <BR>
                                                        <em class="fas fa-info-circle"></em> Interest Rate: 4.3% <br>
                                                        <em class="fas fa-info-circle"></em> * Management Fee: 3% <br>
                                                        <em class="fas fa-info-circle"></em> © Credit Life Imurance Fee: 0.8% <br>
                                                        <em class="fas fa-info-circle"></em> * Penal Charge: 3.5% <br>
                                                        <em class="fas fa-info-circle"></em> * Repayment must be made according to my preffered repayment tenure. <br>
                                                        <em class="fas fa-info-circle"></em> * I waive 3-days maximum cooling off period to enable disbursement. <br><br> I accept that bankabillion reserved the right to decline my loan request.
                                                    </p>






                                                    <button type="submit" name="" class="btn btn btn-primary br-tl-0 br-bl-0" id="setTimeButton">
                                                    CONTINUE
                                                </button>
                                                </div>
                                            </form>

                                            <div class="gaps-3x"></div>

                                            <div class="note note-plane note-danger">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Gold plan end-->


                    </div>

                </div>
            </div>
            <script src="../bankassets/js/jquery.bundle.js.download"></script>

        </div>
    </div>

    <script src="../bankassets/js/chart.js.download"></script>
    <p id="error" style='display: none '></p>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var error = document.getElementById('error');

        if (error.textContent == "empty") {
            swal("ERROR!", "Please enter an amount to deposit", "error");
        } else if (error.textContent == "min") {
            swal("ERROR!", "Your intended Loan Request is below the Minimum Loan.", "error");
        } else if (error.textContent == "max") {
            swal("ERROR!", "Your intended Loan Request is above the Maximum Loan for this plan.", "error");
        } else if (error.textContent == "insufficient") {
            swal("ERROR!", "You do not have sufficient funds in your deposit balance", "error");
        } else if (error.textContent == "success") {
            swal("Completed!", "Loan was successful", "success");
            setTimeout(() => {
                window.location.href = 'loan_history.php'
            }, 3000);
        } else if (error.textContent == "error") {
            swal("ERROR!", "Sorry!!!, Something went wrong, try later or contact support", "error");
        }
    </script>
    <style>
        body {
            background-color: #140123;
        }
    </style>

<?php require_once SHARED_PATH . "/footer.php"; ?>