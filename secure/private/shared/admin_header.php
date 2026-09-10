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

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard - <?php print Main::h(SITE_NAME) ?></title>

  <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   <link rel="stylesheet" href="<?php print Main::url_for("/css/style.css") ?>">

   <!-- icon library -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



  <!-- Custom styles for this template -->
  <style>
    body {
  overflow-x: hidden;
  /*background-color: #D3D3D3;*/
}

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}
  </style>

</head>

<body>
      <!-- Page Content -->
<div id="page-content-wrapper">

      <nav class="navbar navbar-light border-bottom" style="background-color: #00518f;">        
        <a href="<?php print Main::url_for("/bankadmin/") ?>"><img class="logo mr-3 mt-2 img-fluid" style="width: 100%; height:70px;" src="<?php print Main::url_for("/assets/images/logoIcon/logo.png") ?>" alt="logo"></a>
              <i class="mr-2 mr-md-0 fas fa-bars d-md-none text-white" id="menu-toggle" style="font-size: 35px;"></i>
        <!-- <h3 class=" text-white d-none d-md-inline">Dashboard</h3>               -->
        <span class="float-right h5 text-white mr-2 mr-md-0 d-none d-md-inline"><i class="fas fa-circle text-success"></i> <?php print $_SESSION['admin_email'] ?></span>        
      </nav>
      <?php echo Main::display_session_message(); ?>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class=" border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><?php print Main::h(SITE_NAME) ?> </div>
      <div class="list-group list-group-flush">
        <a href="<?php print Main::url_for("/bankadmin/user/") ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user"></i> Active Users</a>
        <!-- <a href="<?php //print Main::url_for("/bankadmin/user/pending.php") ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user"></i> Pending Users</a>         -->
        <a href="<?php print Main::url_for("/bankadmin/banks/") ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user"></i> Banks</a>        
        <a href="<?php print Main::url_for("/bankadmin/admin/") ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user"></i> Admins</a>
        <a href="<?php print Main::url_for("/bankadmin/transaction/") ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user"></i> Transactions</a>        
        <a href="<?php print Main::url_for("/bankadmin/site/") ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-cog"></i> Site Settings</a>
        <a href="<?php print Main::url_for("/bankadmin/mail/") ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-cog"></i> Send Message</a>        
        <a href="<?php print Main::url_for("/bankadmin/logout.php") ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-power-off"></i> Sign Out</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->