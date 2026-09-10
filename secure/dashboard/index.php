<?php require_once "../private/initialize.php"; 

require_once SHARED_PATH . "/logged_in_header.php"; ?>


    <div class="page-content">
        <div class="container " style="min-width:100%">

            <div class="page-content">
                <div class="container " style="min-width:100%">
                    <div>
                        <strong style="background-color:#062868"><font color="white"><h1 style="color:white">User's Dashboard</h1></font></strong>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="index.php">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User's Dashboard</li>
                        </ol>
                    </div>




                    <br><br>
                    <center>
                        <?php if ($logged_user->card_front == '') {
                            print "No card available, view to upload your card";
                        }else{ ?>

                    <img src="<?php print Main::url_for("/images/".$logged_user->card_back) ?>"  with="25%" height="25%">


                        <?php } ?>
                        <br>
                        <br><a class="btn btn-primary" href="<?php print Main::url_for("/cards/") ?>">View Card</a>
                        <br>
                        <br><a class="btn btn-primary" href="<?php print Main::url_for("/transfer/") ?>">Transfer</a></center><br>


                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="token-statistics card card-token height-auto">
                                <div class="card-innr">
                                    <div class="token-balance token-balance-with-icon">
                                        <div class="token-balance-icon">
                                            <img src="<?php print Main::url_for("/logo.png") ?>" alt="logo">
                                        </div>
                                        <div class="token-balance-text">
                                            <h6 class="card-sub-title">Account Balance</h6>
                                            <span class="lead">
                                        <?php print CURRENCY. number_format($logged_user->account_balance) ?>                                        <span> </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="token-balance token-balance-s2">
                                        <h6 class="card-sub-title">Account Summary</h6>
                                        <ul class="token-balance-list">
                                            <li class="token-balance-sub d-none">
                                                <span class="lead">
                                          2 days ago
                                          </span>
                                                <span class="sub">Account Opening</span>
                                            </li>
                                            <li class="token-balance-sub">
                                                <span class="lead"></span>
                                                <span class="sub"></span>
                                            </li>
                                            <li class="token-balance-sub">
                                                <span class="lead">
                                            ACE6786<?php print $logged_user->id ?>                                        </span>
                                                <span class="sub">Account ID</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="token-information card card-full-height">
                                <div class="row no-gutters height-100">
                                    <div class="col-md-6 text-center">
                                        <div class="token-info">
                                            <img class="token-info-icon" src="../images/icon-national-id-color.png" alt="logo-sm">
                                            <div class="gaps-2x"></div>
                                            <h3 class="token-info-head text-light">Account Number</h3>
                                            <h5 class="token-info-sub"><?php print $logged_acct ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="token-info bdr-tl">
                                            <div>
                                                <ul class="token-info-list">
                                                    <center><img class="token-info-icon" src="../images/icon-national-id-color.png" alt="logo-sm"></center>
                                                    <li>
                                                        <center><span>Account Holder Name</span>
                                                            <br>
                                                            <strong><h4> <font color-"blue"><?php print strtoupper($logged_name) ?></font></h4></strong></center>
                                                    </li>

                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>




                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="token-statistics card card-token height-auto">
                                <div class="card-innr">
                                    <div class="token-balance token-balance-with-icon">
                                        <div class="token-balance-icon">
                                            <img src="<?php print Main::url_for("/logo.png") ?>" alt="logo">
                                        </div>
                                        <div class="token-balance-text">
                                            <h6 class="card-sub-title">Username</h6>
                                            <span class="lead">
                                        <?php print $logged_name ?>                                       
                                    </span>
                                        </div>
                                    </div>
                                    <div class="token-balance token-balance-s2">
                                        <h6 class="card-sub-title">Account Summary</h6>
                                        <ul class="token-balance-list">
                                            <li class="token-balance-sub">
                                                <span class="sub">
                                          <?php print $logged_email ?>
                                          </span>
                                                <span class="card-sub-title">Email Address</span>
                                            </li>
                                            <li class="token-balance-sub">
                                                <span class="lead"></span>
                                                <span class="sub"></span>
                                            </li>
                                            <li class="token-balance-sub">
                                                <span class="sub">
                                                <?php print Main::h($logged_user->phone) ?>                                      </span>
                                                <span class="card-sub-title">Phone Number</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="token-information card card-full-height">
                                <div class="row no-gutters height-100">
                                    <div class="col-md-6 text-center">
                                        <div class="token-info">
                                            <img class="token-info-icon" src="../images/icon-national-id-color.png" alt="logo-sm">
                                            <div class="gaps-2x"></div>
                                            <h3 class="token-info-head text-light">Account Type</h3>
                                            <h5 class="token-info-sub">SA</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="token-info bdr-tl">
                                            <div>
                                                <ul class="token-info-list">
                                                    <center><img class="token-info-icon" src="../images/icon-national-id-color.png" alt="logo-sm"></center>
                                                    <center>
                                                        <li>
                                                            <span>Last Login Date:</span> <br> <?php print
                                                            
                                                            date("F j, Y")
                                                            
                                                            ?> </li>
                                                    </center>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-6">
                            <div class="token-transaction card card-full-height">
                                <div class="card-innr">
                                    <div class="card-head has-aside">
                                        <h4 class="card-title">Recent Transactions</h4>
                                        <div class="card-opt">
                                            <a href="transfer_history.php" class="link ucap">
                                        View ALL &nbsp; <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                        </div>
                                    </div>
                                    <table class="table table-light table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>TRX </th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Dr/Cr</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <h4 class="text-center">You have not made and transaction yet.</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="token-sale-graph card card-full-height">
                                <div class="card-innr">
                                    <div class="card-head has-aside">
                                        <h4 class="card-title">Fund Transfer Chart </h4>
                                        <div class="card-opt">
                                            <div class="toggle-class dropdown-content"></div>
                                        </div>
                                    </div>
                                    <div id="curve_chart" style="width: auto; height: 300px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 m-auto">
                            <div class="card card-full-height">
                                <div class="card-innr">
                                    <div class="card-head has-aside pb-0">
                                        <h4 class="card-title">Recent Activities</h4>
                                    </div>
                                    <table class="data-table user-list">
                                        <tbody>
                                            <tr style="display:none">
                                                <td class="data-col dt-user">
                                                    <div class="user-block">
                                                        <div class="user-photo">
                                                            <img src="../images/kyc/logo.png" alt="">
                                                        </div>
                                                        <div class="user-info">
                                                            <span class="lead user-name">Register</span>
                                                            <span class="sub user-id">2024-11-24 15:06:45</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="data-col dt-join text-right">
                                                    <span class="join-time">
                                                      2 days ago                                                    </span>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <script>
                $('.input-cart-number').on('keyup change', function() {
                    $t = $(this);

                    if ($t.val().length > 3) {
                        $t.next().focus();
                    }

                    var card_number = '';
                    $('.input-cart-number').each(function() {
                        card_number += $(this).val() + ' ';
                        if ($(this).val().length == 4) {
                            $(this).next().focus();
                        }
                    })

                    $('.credit-card-box .number').html(card_number);
                });

                $('#card-holder').on('keyup change', function() {
                    $t = $(this);
                    $('.credit-card-box .card-holder div').html($t.val());
                });

                $('#card-holder').on('keyup change', function() {
                    $t = $(this);
                    $('.credit-card-box .card-holder div').html($t.val());
                });

                $('#card-expiration-month, #card-expiration-year').change(function() {
                    m = $('#card-expiration-month option').index($('#card-expiration-month option:selected'));
                    m = (m < 10) ? '0' + m : m;
                    y = $('#card-expiration-year').val().substr(2, 2);
                    $('.card-expiration-date div').html(m + '/' + y);
                })

                $('#card-ccv').on('focus', function() {
                    $('.credit-card-box').addClass('hover');
                }).on('blur', function() {
                    $('.credit-card-box').removeClass('hover');
                }).on('keyup change', function() {
                    $('.ccv div').html($(this).val());
                });


                /*--------------------
                CodePen Tile Preview
                --------------------*/
                setTimeout(function() {
                    $('#card-ccv').focus().delay(1000).queue(function() {
                        $(this).blur().dequeue();
                    });
                }, 500);

                /*function getCreditCardType(accountNumber) {
                  if (/^5[1-5]/.test(accountNumber)) {
                    result = 'mastercard';
                  } else if (/^4/.test(accountNumber)) {
                    result = 'visa';
                  } else if ( /^(5018|5020|5038|6304|6759|676[1-3])/.test(accountNumber)) {
                    result = 'maestro';
                  } else {
                    result = 'unknown'
                  }
                  return result;
                }

                $('#card-number').change(function(){
                  console.log(getCreditCardType($(this).val()));
                })*/
            </script>
            <script src="../bankassets/js/chart.js"></script>

        </div>
    </div>
    <style>
        body {
            background-color: #140123;
        }
    </style>

    

<?php require_once SHARED_PATH . "/footer.php" ?>   