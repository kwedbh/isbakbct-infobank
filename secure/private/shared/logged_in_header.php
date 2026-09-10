<?php  Main::require_login(); ?>
<!DOCTYPE html>
<html lang="zxx" class="js" style="height: 100%;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="BANKABILLION">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BANKABILLION. Premium Online Banking System.">
    <script src="https://kit.fontawesome.com/890a8a1ff5.js" crossorigin="anonymous"></script>
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="<?php print Main::url_for("/logo.png") ?>">
    <!-- Site Title  -->
    <title><?php print SITE_NAME  ?> - User Dashboard</title>
    <!-- Vendor Bundle CSS -->
    <link rel="stylesheet" href="<?php print Main::url_for("/bankassets/css/vendor.bundle-62688.css")?>">
    <!-- Custom styles for this template -->
    <link href="../bankassets/css/style-62688.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="../bankassets/loader.js"type="text/javascript"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style>
    table {
    white-space: nowrap;
}

</style>    
    <div class="topbar-wrap" style="padding-top: 0px;">
        <div class="topbar is-sticky">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="topbar-nav d-lg-none">
                        <li class="topbar-nav-item relative">
                            <a class="toggle-nav" href="#">
                                <div class="toggle-icon">
                                    <span class="toggle-line"></span>
                                    <span class="toggle-line"></span>
                                    <span class="toggle-line"></span>
                                    <span class="toggle-line"></span>
                                </div>
                            </a>
                        </li>
                        <!-- .topbar-nav-item -->
                    </ul>
                    <!-- .topbar-nav -->
                    <a class="topbar-logo" href="<?php print Main::url_for("/dashboard/") ?>">
                        <img src="<?php print Main::url_for("/logo.png") ?>" srcset="<?php print Main::url_for("/logo.png") ?>" alt="logo">
                    </a>
                    <ul class="topbar-nav">
                        <li class="topbar-nav-item relative">
                            <span class="user-welcome d-none d-lg-inline-block">Welcome! <?php print Main::h(strtoupper($logged_name)) ?></span>
                            <a class="toggle-tigger user-thumb" href="#">

                                <img src="<?php print Main::url_for("/images/".$logged_user->image_link) ?>" class="user-photo" alt="">
                            </a>
                            <div class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown">
                                <div class="user-status">
                                    <h6 class="user-status-title">Account balance</h6>
                                    <div class="user-status-balance">
                                        <?php print CURRENCY. Main::h(number_format($logged_user->account_balance,2)) ?> <small></small>
                                    </div>
                                </div>
                                <ul class="user-links">
                                    <li>
                                        <a href="<?php print Main::url_for("/profile/") ?>">
                                            <i class="fa-solid fa-id-card"></i> My Profile
                                        </a>
                                    </li>
                                    <!--
                                <li>
                                    <a href="activity_log.php">
                                        <i class="fa-solid fa-eye"></i> Activity Log
                                    </a>
                                </li>
                              -->
                                </ul>
                                <ul class="user-links bg-light">
                                    <li>
                                        <a href="<?php print Main::url_for("/logout.php") ?>">
                                            <i class="fa-solid fa-power-off"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- .topbar-nav-item -->
                    </ul>
                    <!-- .topbar-nav -->
                </div>
            </div>
        </div>
        <div class="navbar">
            <div class="container">
                <div class="navbar-innr">
                    <ul class="navbar-menu">
                        <br><br>
                        <li class="" style="background-color:#08185C; display:none;">
                            <a href="https://wallet.bankabillion.org" target="blank">
                                <i class="fa-solid fa-home"></i>&nbsp;
                                <font color="white"> Open Crypto Wallet
                                </font>
                            </a>
                        </li>


                        <li class="">
                            <a href="<?php print Main::url_for("/dashboard/") ?>">
                                <i class="fa-solid fa-home"></i>&nbsp; Account
                            </a>
                        </li>


                        <li class="">
                            <a href="<?php print Main::url_for("/transfer/") ?>">
                                <i class="fa-solid fa-exchange"></i>&nbsp; Transfer
                            </a>
                        </li>






                        <li class="">
                            <a href="<?php print Main::url_for("/transfer_history/") ?>">
                                <i class="fa-solid fa-history"></i>&nbsp; Transactions
                            </a>
                        </li>


                        <li class="">
                            <a href="<?php print Main::url_for("/profile/") ?>">
                                <i class="fa-solid fa-user"></i>&nbsp; My Profile
                            </a>
                        </li>


                        <li class="">
                            <a href="<?php print Main::url_for("/loan/") ?>">
                                <i class="fa-solid fa-hand-holding-usd"></i>&nbsp; Loan Request
                            </a>
                        </li>


                        <li class="">
                            <a href="<?php print Main::url_for("/cards/") ?>">
                                <i class="fa-solid fa-credit-card"></i>&nbsp; Manage Cards
                            </a>
                        </li>



                        <li class="">
                            <a href="mailto:<?php print SITE_EMAIL ?>">
                                <i class="fa-solid fa-headset"></i>&nbsp; Support
                            </a>
                        </li>




                    </ul>

                </div>
                <!-- .navbar-innr -->
            </div>
            <!-- .container -->
        </div>
    </div>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../bankassets/css/style.css">

    <center>
        <div id="google_translate_element"></div>

        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en'
                }, 'google_translate_element');
            }
        </script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


    </center>