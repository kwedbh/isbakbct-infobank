<?php

Main::require_login();


$transfer = Transfer::find_by_account_number($logged_user->account_number); ?>

<!doctype html>
<html lang="en">


<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Required meta tags -->

<title><?php print SITE_NAME ?></title>

<!-- Favicon -->
<link rel="icon" href="<?php print Main::url_for("/app/img/core-img/favicon.png")?>">

<!-- Plugins css -->
<link rel="stylesheet" href="<?php print Main::url_for("/app/css/default-assets/mini-event-calendar.min.css")?>">

<!-- Master Stylesheet CSS -->
<link rel="stylesheet" href="<?php print Main::url_for("/app/style.css")?>">

</head>

<body>
<!-- Preloader -->
<div id="preloader-area">
<div class="lds-ripple">
    <div></div>
    <div></div>
</div>
</div>
<!-- Preloader -->

<!-- ======================================
******* Main Page Wrapper **********
======================================= -->

<div class="main-container-wrapper">
<!-- Top bar area -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index-2.html"><img src="<?php print Main::url_for("/assets/images/logoIcon/logo.png") ?>" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index-2.html"><img src="<?php print Main::url_for("/assets/images/logoIcon/logo.png") ?>" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>
        
        <ul class="top-navbar-area navbar-nav navbar-nav-right">
            <li class="nav-item dropdown dropdown-animate">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <img class="mr-2 flex-30-img" src="<?php print Main::url_for("/app/img/shop-img/l5.png")?>" alt="">English<i class="arrow_carrot-down"></i>
              </a>
            </li>

            <li class="nav-item dropdown dropdown-animate">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                    <a class="dropdown-item preview-item d-flex align-items-center">
                        <div class="notification-thumbnail">
                            <div class="preview-icon bg-primary">
                                <i class="ti-info-alt mx-0"></i>
                            </div>
                        </div>
                        <div class="notification-item-content">
                            <h6>Welcome back <?php print $logged_name ?></h6>
                            <p class="mb-0">
                                Just now
                            </p>
                        </div>
                    </a>



                </div>
            </li>

            <li class="nav-item nav-profile dropdown dropdown-animate">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" id="profileDropdown">
                    <img src="<?php print Main::url_for("/images/".Main::h($logged_img))  ?>" alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown profile-top" aria-labelledby="profileDropdown">
                    <a href="#" class="dropdown-item"><i class="zmdi zmdi-account profile-icon" aria-hidden="true"></i> My profile</a>                    
                    <a href="#" class="dropdown-item"><i class="zmdi zmdi-brightness-7 profile-icon" aria-hidden="true"></i> Settings</a>
                    <a href="#" class="dropdown-item"><i class="ti-unlink profile-icon" aria-hidden="true"></i> Sign-out</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-xl-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="ti-layout-grid2"></span>
        </button>
    </div>
</nav>

<div class="container-fluid page-body-wrapper">
    <!-- Side Menu area -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <?php require_once SHARED_PATH . "/nav.php" ?>
    </nav>
