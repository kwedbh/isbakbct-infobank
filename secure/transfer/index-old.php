<?php require_once "../private/initialize.php"; 

require_once SHARED_PATH . "/logged_in_header.php"; ?>

    <div class="page-content">
        <div class="container " style="min-width:100%">

            <div class="page-content">
                <div class="container" style="min-width:100%">
                    <h1>Bank Fund Transfer</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="intl-transfer-card.php"><img src="../images/a1.png"> International Transfer</a>
                        </li>
                        <li>
                            <a href="usdt-transfer-card.php"><img src="../images/a1.png"> Crypto Transfer</a>
                        </li>
                    </ol>
                    <div class="row">
                        <div class="col-lg-12">

                            <form class="card" action="" method="post">
                                <div class="card-header">
                                    <h3 class="card-title">Bank Fund Transfer</h3>
                                    <a href="index.php" class="btn btn-danger" style="float:right">Cancel</a>
                                </div>
                                <br>
                                <center>
                                    <h4>Please request for OTP code before filling the transfer Form.</h4>
                                </center>

                                <div class="card-body">

                                    <div class="form-group">
                                        <label class="form-label">Enter Amount</label>
                                        <input id="amount" name="amount" type="number" class="form-control">
                                        <input name="transfer_type" type="hidden" class="form-control" required value="Inter-Bank">
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">Bank Account Number</label>
                                        <input id="accountno" name="accountno" type="number" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Enter OTP</label>
                                        <input id="otp" name="otp" type="text" value="" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" class="form-control" maxlength="4">
                                        <input class="input-bordered" type="hidden" id="db_otp" value="">

                                        <br><code>Click on <strong>Request OTP</strong> to get a new OTP for your transaction</code> <br>
                                        <button type="submit" name="sendotp" class="btn btn-primary">Request OTP</button>
                                    </div>

                                </div>


                        </div>

                        <div class="card-footer text-right">
                            <div class="d-flex">
                                <button type="button" onclick="openTpin()" class="btn btn-primary ml-auto">Transfer Fund</button>
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <style>
                                    #overlay,
                                    #transfer,
                                    #cot_transfer,
                                    #card_request {
                                        position: fixed;
                                        top: 0;
                                        left: 0;
                                        width: 100%;
                                        height: 100%;
                                        background-color: rgba(0, 0, 0, 0.8);
                                        z-index: 100;
                                        display: none;
                                    }
                                    
                                    .popup-content {
                                        padding: 14px 10px;
                                        line-height: 1.5;
                                        text-align: center;
                                    }
                                    
                                    .cnt223 a {
                                        text-decoration: none;
                                    }
                                    
                                    .popup-onload {
                                        margin: 0 auto;
                                        display: block;
                                        position: fixed;
                                        z-index: 101;
                                        top: 40%;
                                        left: 50%;
                                        margin-top: -300px;
                                        margin-left: -300px;
                                    }
                                    
                                    .cnt223 {
                                        min-width: 600px;
                                        width: 600px;
                                        min-height: 150px;
                                        margin: 100px auto;
                                        background: #f3f3f3;
                                        position: relative;
                                        z-index: 103;
                                        padding: 20px 35px 40px 35px;
                                        border-radius: 5px;
                                        box-shadow: 0 2px 5px #000;
                                    }
                                    
                                    .cnt223 p {
                                        clear: both;
                                        color: #555555;
                                        /* text-align: justify; */
                                        font-size: 20px;
                                        font-family: sans-serif;
                                    }
                                    
                                    .cnt223 p a {
                                        color: #d91900;
                                        font-weight: bold;
                                    }
                                    
                                    .cnt223 .x {
                                        float: right;
                                        height: 35px;
                                        left: 22px;
                                        position: relative;
                                        top: -25px;
                                        width: 34px;
                                    }
                                    
                                    .cnt223 .x:hover {
                                        cursor: pointer;
                                    }
                                    
                                    a.close {
                                        color: #fff;
                                        font-size: 180%;
                                        width: 100%;
                                        padding: 0 15px;
                                        height: 40px;
                                        margin: auto;
                                        background: #1F51FF;
                                        border: 0px;
                                        border-radius: 5px;
                                    }
                                    
                                    @media (max-width:800px) {
                                        .cnt223 {
                                            min-width: 90%;
                                            width: 90%;
                                            min-height: 150px;
                                            margin: 100px auto;
                                            padding: 15px 7px 30px 7px;
                                        }
                                        .cnt223 p {
                                            font-size: 15px;
                                        }
                                        .cnt223 h2 {
                                            font-size: 120%;
                                        }
                                        .popup-onload {
                                            margin: 0 auto;
                                            top: 40%;
                                            left: 50%;
                                            margin-top: -300px;
                                            margin-left: -190px;
                                        }
                                        a.close {
                                            color: #fff;
                                            font-size: 180%;
                                            width: 100%;
                                            padding: 8px 15px 0px 15px;
                                            height: 40px;
                                            font-weight: lighter;
                                            margin-top: -20px;
                                        }
                                    }
                                </style>
                                <!-- for withdrawal -->
                                <div id="overlay">
                                    <div class='popup-onload'>
                                        <div class='cnt223'>
                                            <div class="popup-content">
                                                <p>Enter Withdrawal Pin</p>
                                                <hr>
                                                <input class="input-bordered" type="text" name="wpin" placeholder="Enter Pin to complete withdrawal">
                                                <br><br>
                                                <button type="submit" name="submit" class="btn btn-primary" style="margin:6px 0px">Complete</button>
                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('overlay').style.display='none'">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- for withdrawal end here -->


                                <!-- for transfer pin-->
                                <div id="transfer">
                                    <div class='popup-onload'>
                                        <div class='cnt223'>
                                            <div class="popup-content">
                                                <small>you are about to innitiat a Transfer, click Next to continue or cancel now</small>
                                                <hr>
                                                <input class="input-bordered" type="text" id="tpin" name="tpin" value="1234" readonly hidden>
                                                <input class="input-bordered" type="hidden" id="db_tpin" value="1234">
                                                <br><br>
                                                <button type="button" onclick="t_pin()" class="btn btn-primary" style="margin:6px 0px">NEXT</button>
                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('transfer').style.display='none'">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- transfer pin end here -->


                                <!-- for transfer VAT-->
                                <div id="transfer">
                                    <div class='popup-onload'>
                                        <div class='cnt223'>
                                            <div class="popup-content">
                                                <p>Dear KWEDNG, you are about to initiate a transfer, kindly click on the PROCEED button to continue or CANCEL the transaction immediately.</p>
                                                <hr>
                                                <input class="input-bordered" type="text" id="tpin" name="tpin" value="1234" hidden readonly>
                                                <input class="input-bordered" type="hidden" id="db_tpin" value="1234" readonly hidden>
                                                <br><br>
                                                <button type="button" onclick="t_pin()" class="btn btn-primary" style="margin:6px 0px">Proceed</button>
                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('transfer').style.display='none'">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- transfer VAT end here -->



                                <!-- for transfer IMF-->
                                <div id="transfer">
                                    <div class='popup-onload'>
                                        <div class='cnt223'>
                                            <div class="popup-content">
                                                <p>Enter IMF Code</p>
                                                <hr>
                                                <input class="input-bordered" type="text" id="tpin" name="tpin" placeholder="Enter IMF Code">
                                                <input class="input-bordered" type="hidden" id="db_tpin" value="1234">
                                                <br><br>
                                                <button type="button" onclick="t_pin()" class="btn btn-primary" style="margin:6px 0px">Proceed</button>
                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('transfer').style.display='none'">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- transfer IMF end here -->

                                <!-- for transfer cot-->
                                <div id="cot_transfer">
                                    <div class='popup-onload'>
                                        <div class='cnt223'>
                                            <div class="popup-content">
                                                <p>Dear KWEDNG, we have received your request of Fund transfer. Please upload your passport for proper verification.</p>
                                                <hr>
                                                <input class="input-bordered" type="text" name="t_cot" value="9572" readonly hidden>

                                                <br><br><br>
                                                <button type="submit" name="transfer" class="btn btn-primary" style="margin:6px 0px">PROCEED TO UPLOAD</button>
                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('cot_transfer').style.display='none'">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- transfer cot end here -->

                                <!-- for card request -->
                                <div id="card_request">
                                    <div class='popup-onload'>
                                        <div class='cnt223'>
                                            <div class="popup-content">
                                                <p>Enter Transfer Pin</p>
                                                <hr>
                                                <input class="input-bordered" type="text" name="card_pin" placeholder="Enter Pin to complete card request">
                                                <code>Please enter your transfer pin to proceed card request</code>
                                                <br><br>
                                                <button type="submit" name="submit" class="btn btn-primary" style="margin:6px 0px">Complete</button>
                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('card_request').style.display='none'">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card request end here -->

                                <script>
                                    // for withdrawal
                                    function openWpin() {
                                        var amount;
                                        var gateway;
                                        var details;
                                        amount = document.getElementById('amount').value;
                                        gateway = document.getElementById('gateway').value;
                                        details = document.getElementById('details').value;
                                        if (amount == "" || gateway == "" || details == "") {
                                            swal("EMPTY FIELD!", "All field are reqiured for withdrawal", "warning");
                                        } else {
                                            document.getElementById('overlay').style.display = 'block';
                                        }
                                    }
                                    // withdrawal ends here

                                    // for transfer
                                    function openTpin() {
                                        var amount;
                                        var accountno;
                                        var otp;
                                        var db_otp;
                                        amount = document.getElementById('amount').value;
                                        accountno = document.getElementById('accountno').value;
                                        otp = document.getElementById('otp').value;
                                        db_otp = document.getElementById('db_otp').value;
                                        if (amount == "" || accountno == "" || otp == "") {
                                            swal("EMPTY FIELD!", "All field are reqiured for transfer", "warning");
                                        } else if (amount < 20) {
                                            swal("ERROR!", "Minimum Transfer amount is $20", "warning");
                                        } else if (otp != db_otp) {
                                            swal("ERROR!", "OTP you enter is incorrect, please check email for correct OTP or request for another", "warning");
                                        } else {
                                            document.getElementById('transfer').style.display = 'block';
                                        }
                                    }
                                    // for transfer ends here


                                    // validate transfer pin & open COT code
                                    function t_pin() {
                                        var t_pin;
                                        var db_tpin;
                                        t_pin = document.getElementById('tpin').value;
                                        db_tpin = document.getElementById('db_tpin').value;
                                        if (t_pin == "") {
                                            swal("ERROR!", "Please enter your transfer", "error");
                                        } else if (t_pin != db_tpin) {
                                            swal("INCORRECT!", "The transfer Transparency code you enter is incorrect", "error");
                                        } else {
                                            document.getElementById('transfer').style.display = 'none';
                                            document.getElementById('cot_transfer').style.display = 'block';
                                        }
                                    }
                                    // validate transfer pin & open COT code ends here

                                    // for card request
                                    function openCRpin() {
                                        var cardType;
                                        var dAddress;
                                        cardType = document.getElementById('cardType').value;
                                        dAddress = document.getElementById('dAddress').value;
                                        if (cardType == "" || dAddress == "") {
                                            swal("EMPTY FIELD!", "All field are reqiured for card request", "warning");
                                        } else {
                                            document.getElementById('card_request').style.display = 'block';
                                        }
                                    }
                                    //card request end here
                                </script>


                                <script src="../bankassets/js/chart.js.download"></script>
                                <p id="error" style='display: none '></p>
                                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                                <script>
                                    var error = document.getElementById('error');

                                    if (error.textContent == "empty") {
                                        swal("EMPTY FIELD!", "All field are reqiured for withdrawal", "warning");

                                    } else if (error.textContent == "otp_success") {
                                        swal("SENT!", "Check your account email for Your one time password (OTP), to proceed with transaction", "success");

                                    } else if (error.textContent == "self") {
                                        swal("Error!", "You cannot send money to yourself. Please check and try again.", "error");

                                    } else if (error.textContent == "not_found") {
                                        swal("ERROR!", "There is no user in BANKABILLION with  as account number. Please check and try again.", "error");

                                    } else if (error.textContent == "insufficient") {
                                        swal("Error!", "Insufficient funds, Add funds to your account to complete transaction", "error");

                                    } else if (error.textContent == "cot_error") {
                                        swal("ERROR!", "The transfer security pass you enter is incorrect, please contact support if you do not have a transfer security pass ", "error");

                                    } else if (error.textContent == "trans_success") {

                                        setTimeout(() => {
                                            window.location.href = 'upload-trans-card.php'
                                        }, 3000);
                                    } else if (error.textContent == "error") {
                                        swal("ERROR!", "Sorry!!!, Something went wrong, try later or contact support", "error");
                                    }
                                </script>
                            </div>
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

    <script src="../bankassets/js/chart.js" type="text/javascript"></script>

    <div class="footer-bar" style="background-color:#140123">
        <div class="container" style="background-color:#140123">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <ul class="footer-links">
                        <li><a href="#">FAQs</a></li>

                    </ul>
                </div>
                <div class="col-md-4 mt-2 mt-sm-0">
                    <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                        <div class="copyright-text" style="display: block ruby;">© BANKABILLION 2024</div>
                    </div>
                </div>
                <div id="google_translate_element"></div>

                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                            pageLanguage: 'en'
                        }, 'google_translate_element');
                    }
                </script>
            </div>
        </div>
    </div>

    <script src="../bankassets/js/element.js" type="text/javascript">
    </script>
    <script src="../bankassets/js/jquery.bundle.js" type="text/javascript"></script>
    <script src="../bankassets/js/script.js" type="text/javascript"></script>

    <script src="../bankassets/js/fmekoqrhkaymp8ficmkeyzzv0sr312no.js" type="text/javascript" async=""></script>








    </body>

</html>