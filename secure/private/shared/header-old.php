
    <script>
      (function(d,t) {
        var BASE_URL="https://app.chatwoot.com";
        var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=BASE_URL+"/packs/js/sdk.js";
        g.defer = true;
        g.async = true;
        s.parentNode.insertBefore(g,s);
        g.onload=function(){
          window.chatwootSDK.run({
            websiteToken: '9UQ9b3fewYADzWxPQoorciqx',
            baseUrl: BASE_URL
          })
        }
      })(document,"script");
    </script>
    


<?php

Main::require_login();

$transfer = Transfer::find_by_account_number($logged_user->account_number);  ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Meta Tags -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print SITE_NAME ?></title>
    
	<!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<!-- Daterangepicker CSS -->
    <link href="<?php print Main::url_for("/app/vendors/daterangepicker/daterangepicker.css")?>" rel="stylesheet" type="text/css" />

	<!-- Data Table CSS -->
    <link href="<?php print Main::url_for("/app/vendors/datatables.net-bs5/css/dataTables.bootstrap5.min.css")?>" rel="stylesheet" type="text/css" />
    <link href="<?php print Main::url_for("/app/vendors/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css")?>" rel="stylesheet" type="text/css" />

	<!-- CSS -->
    <link href="<?php print Main::url_for("/app/dist/css/style.css")?>" rel="stylesheet" type="text/css">

<style>
	.card {
    border-radius: 0 !important;
}
</style>	
</head>
<body>
	<!-- Wrapper -->
	<div class="hk-wrapper" data-layout="navbar" data-layout-style="default" data-menu="light" data-footer="simple">
		<!-- Top Navbar -->
		<nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
			<div class="container-fluid">
				<!-- Start Nav -->
				<div class="nav-start-wrap flex-fill">
					<!-- Brand -->
					<a class="navbar-brand d-xl-flex d-none flex-shrink-0" href="<?php print Main::url_for("/app/") ?>">						
						<img style="width: 50px !important; height: 50px !important;" class="brand-img img-fluid" src="<?php print Main::url_for("/assets/images/logoIcon/logo.png") ?>" alt="brand" />
					</a>
					<!-- /Brand -->
					<button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>
					
					<!-- Navbar Nav -->
					<div class="hk-menu">
						<!-- Brand -->
						<div class="menu-header d-xl-none">
							<span>
								<a class="navbar-brand" href="<?php print Main::url_for("/app/") ?>">									
									<img style="width: 50px !important; height: 50px !important;" class="brand-img img-fluid" src="<?php print Main::url_for("/assets/images/logoIcon/logo.png") ?>" alt="brand" />
								</a>
								<button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
									<span class="icon">
										<span class="svg-icon fs-5">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
												<line x1="10" y1="12" x2="20" y2="12"></line>
												<line x1="10" y1="12" x2="14" y2="16"></line>
												<line x1="10" y1="12" x2="14" y2="8"></line>
												<line x1="4" y1="4" x2="4" y2="20"></line>
											</svg>
										</span>
									</span>
								</button>
							</span>
						</div>
						<!-- /Brand -->
						
						<!-- Main Menu -->
						<div data-simplebar class="nicescroll-bar">
							<div class="menu-content-wrap">
								<div class="menu-group">
									<ul class="navbar-nav flex-column">
										<li class="nav-item active">
											<a class="nav-link" href="<?php print Main::url_for("/app/") ?>">
												<span class="nav-link-text">Overview</span>
												<!-- <span class="badge badge-sm badge-soft-pink ms-xl-2 ms-auto">Hot</span> -->
											</a>
										</li>

										<!-- <li class="nav-item">
											<a class="nav-link" href="email.html">
												<span class="nav-link-text">Services</span>
											</a>
										</li> -->

										<li class="nav-item">
											<a class="nav-link" href="<?php print Main::url_for("/app/transfer.php") ?>">
												<span class="nav-link-text">Fund Transfer</span>
											</a>
										</li>	
										
										<li class="nav-item">
											<a class="nav-link" href="<?php print Main::url_for("/app/statements.php") ?>">
												<span class="nav-link-text">Transaction History</span>
											</a>
										</li>

										<li class="nav-item">
											<a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#dash_scrumboard">
												<span class="nav-link-text">Setting</span>
											</a>
											<ul id="dash_scrumboard" class="nav flex-column collapse   nav-children">
												<li class="nav-item">
													<ul class="nav flex-column">
														<li class="nav-item">
															<a class="nav-link" href="<?php print Main::url_for("/app/profile.php") ?>"><span class="nav-link-text">Profile</span></a>
														</li>
														<li class="nav-item d-none">
															<a class="nav-link" href="#"><span class="nav-link-text">Change Pin</span></a>
														</li>
														<li class="nav-item d-none">
															<a class="nav-link" href="#"><span class="nav-link-text">Change Password</span></a>
														</li>
													</ul>
												</li>
											</ul>
										</li>

										<li class="nav-item">
											<a class="nav-link" href="<?php print Main::url_for("/logout.php") ?>">
												<span class="nav-link-text">Sign Out</span>
											</a>
										</li>																							
									</ul>	
								</div>
							</div>
						</div>
						<!-- /Main Menu -->
					</div>
					<div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
					<!-- /Navbar Nav -->

				</div>
				<!-- /Start Nav -->
				
				<!-- End Nav -->
				<div class="nav-end-wrap">

					<ul class="navbar-nav flex-row">
						
						<li class="nav-item">
							<div class="dropdown ps-2">
								<a class=" dropdown-toggle no-caret" href="#" role="button" data-bs-display="static" data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="outside" aria-expanded="false">
									<div class="avatar avatar-rounded avatar-xs">
										<img src="<?php print Main::url_for("/images/".$logged_user->image_link) ?>" alt="user" class="avatar-img">
									</div>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="p-2">
										<div class="media">
											<div class="media-body">
												<div class="dropdown">
													<a href="#" class="d-block dropdown-toggle link-dark fw-medium"  data-bs-toggle="" data-dropdown-animation data-bs-auto-close="inside"><?php print $logged_name ?></a>
												</div>
												<a href="<?php print Main::url_for("/logout.php") ?>" class="d-block fs-8 link-secondary"><u>Sign Out</u></a>
											</div>
										</div>
									</div>
									<div class="dropdown-divider d-none"></div>
									<h6 class="dropdown-header d-none">Manage Account</h6>									
									<a class="dropdown-item d-none" href="#"><span class="dropdown-icon feather-icon"><i data-feather="settings"></i></span><span>Change Pin</span></a>

									<a class="dropdown-item d-none" href="#"><span class="dropdown-icon feather-icon"><i data-feather="settings"></i></span><span>Change Password</span></a>

									<div class="dropdown-divider"></div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<!-- /End Nav -->
			</div>									
		</nav>