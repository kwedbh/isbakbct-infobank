<?php

//Page Title
if (!isset($page_title)) {
  Main::h($page_title = 'Home');
}

//Site Name

if (!isset($site_name)) {
     $site_name = Main::h(SITE_NAME ?? '');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php print Main::url_for("/Secured_Page/DAPP/ysbonline/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php print Main::url_for("/Secured_Page/DAPP/ysbonline/css/style.css") ?>">
    <!-- icon library -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Login - <?php print Main::h(SITE_NAME) ?></title>

  <style>
.footer_login {
   /*position: fixed;*/
   left: 0;
   bottom: 0;
   width: 100%;
}
</style>
  </head>


  <body data-spy="scroll" data-target="#navBarSite" data-offset="100">
  <!-- Navigation -->
<header id="header" class="desk_tab_nav container-fluid">
    <!-- Mobile nav -->
    <div class="container mobile-nav d-md-none desk_tab_nav" >
      <div class="hamburger-btn">
        <i class="fa fa-bars" aria-hidden ="true"></i>
        <i class="fa fa-times" aria-hidden ="true"></i>
      </div>
    </div>
    <!-- Desktop nav Bar -->

    <div class="d-none d-md-inline " id="navBarSite">
      <ul class="list-inline text-center ">
        <li class="float-left text-uppercase text-white list-inline-item mr-2 mt-3"><a class="text-white" href="<?php print Main::url_for("/Secured_Page/DAPP/ysbonline/") ?>"><img class="logo" src="<?php print Main::url_for("/Secured_Page/DAPP/ysbonline/login/logo.png") ?>" alt=""></a></li>
        <li class="mt-5 text-uppercase text-white list-inline-item mr-3"><h6><a class="text-white" href="#">About</a></h6></li>
        <li class="mt-5 text-uppercase text-white list-inline-item mr-3"><h6><a class="text-white" href="#">Contact</a></h6></li>
      </ul>
        </div>
      </ul>
    </div>
</header><br><br><br><br><br>