<?php

 require_once '../private/initialize.php';


 $id = $logged_user->account_number;

   $user = User::find_by_account_number($id);
   if ($user == false) {
     Main::redirect_to(Main::url_for("/"));
   }

 if (Main::is_post_request()) {
   $args = $_POST['user'];
   $user->merge_attributes($args); //This will have the form Values not the Database Values Anymore..
   $result = $user->save();

   if ($result === true) {
     $session->message('Password Updated successfully.');
     Main::redirect_to(Main::url_for("/"));
  }
   else {
     // Show error and redisplay the form
   }
 }else {
  // Display the form
 } 

require_once SHARED_PATH . "/logged_in_header.php"; ?>
        <div class="container " style="min-width:100%">

            <div class="page-content">
                <div class="container" style="min-width:100%">
                    <h1>User's Account</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                    </ol>
                    <div class="row">
                        <div class="main-content col-lg-8">
                            <div class="content-area card">
                                <div class="card-innr">
                                    <div class="card-head">
                                        <h4 class="card-title">Profile Details </h4>
                                    </div>
                                    <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal-data">Personal Data</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Account
                                        Settings</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#password">Update
                                        Account <span style="text-transform: capitalize;">(Enter Current Password to update
                                            Profile )</span></a></li>
                                    </ul>
                                    <!-- .nav-tabs-line -->
                                    <div class="tab-content" id="profile-details">
                                        <div class="tab-pane fade show active" id="personal-data">
                                            <form action="">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-item input-with-label">
                                                            <label for="full-name" class="input-item-label">Full Name</label>
                                                            <input class="input-bordered" type="text" id="full-name" disabled="" value="<?php print Main::h($logged_name) ?>">
                                                        </div>
                                                        <!-- .input-item -->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-item input-with-label">
                                                            <label for="email-address" class="input-item-label">Email Address</label>
                                                            <input class="input-bordered" type="text" id="email-address" name="email-address" value="<?php print Main::h($logged_email) ?>" disabled="">
                                                        </div>
                                                        <!-- .input-item -->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-item input-with-label">
                                                            <label for="mobile-number" class="input-item-label">Mobile Number</label>
                                                            <input class="input-bordered" type="text" id="mobile-number" disabled="" value="<?php print Main::h($logged_user->phone) ?>">
                                                        </div>
                                                        <!-- .input-item -->
                                                    </div>
                                                    <div class="col-md-6 d-none">
                                                        <div class="input-item input-with-label">
                                                            <label for="date-of-birth" class="input-item-label">
                                                        Account Opening Date
                                                    </label>
                                                            <input class="input-bordered date-picker-dob" type="text" id="date-of-birth" disabled="" value="Hidden">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-item input-with-label">
                                                            <label for="occupation" class="input-item-label">
                                                        Occupation
                                                    </label>
                                                            <input class="input-bordered" type="text" id="occupation" disabled="" value="Hidden">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-item input-with-label">
                                                            <label for="nationality" class="input-item-label">Nationality</label>
                                                            <select class="select-bordered select-block select2-hidden-accessible" name="nationality" id="nationality" tabindex="-1" aria-hidden="true" disabled>
                                                        <option value="us"><?php print Main::h(strtoupper($logged_user->country)) ?></option>
                                                  </select>
                                                        </div>
                                                        <!-- .input-item -->
                                                    </div>
                                                    <!-- .col -->
                                                </div>
                                                <!-- .row -->
                                                <div class="gaps-1x"></div>
                                                <!-- 10px gap -->
                                                <div class="d-sm-flex justify-content-between align-items-center">
                                                    <span class="text-success"><i class="fa-regular fa-square-check"></i> Modifications cannot be made to these details</span>
                                                </div>
                                            </form>
                                            <!-- form -->
                                        </div>
                                        <!-- .tab-pane -->

                                        <div class="tab-pane fade" id="settings">
                                            <div class="pdb-1-5x">
                                                <h5 class="card-title card-title-sm text-dark">Security Settings</h5>
                                            </div>
                                            <div class="input-item">
                                                <input type="checkbox" class="input-switch input-switch-sm" id="save-log" checked="">
                                                <label for="save-log">Save my Activities Log</label>
                                            </div>
                                            <div class="input-item"><input type="checkbox" class="input-switch input-switch-sm" id="pass-change-confirm">
                                                <label for="pass-change-confirm">Confirm me through
                                            email before password change
                                      </label>
                                            </div>
                                            <div class="pdb-1-5x">
                                                <h5 class="card-title card-title-sm text-dark">Manage Notification</h5>
                                            </div>
                                            <div class="input-item"><input type="checkbox" class="input-switch input-switch-sm" id="latest-news" checked="">
                                                <label for="latest-news">Notify me by email about sales and latest news
                                      </label>
                                            </div>
                                            <div class="input-item"><input type="checkbox" class="input-switch input-switch-sm" id="activity-alert" checked="">
                                                <label for="activity-alert">Alert me by email for unusual activity.
                                      </label>
                                            </div>
                                            <div class="gaps-1x"></div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-success"><i class="fa-regular fa-square-check"></i> Setting has been updated</span>
                                            </div>
                                        </div>
                                        <!-- .tab-pane -->
                                        <div class="tab-pane fade" id="password">

                                            <form class="form" novalidate="" action="" method="post" enctype="multipart/form-data">
                                                <div class="tab-content pt-3">
                                                    <div class="tab-pane active">

                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="row d-none">
                                                                    <div class="col mb-3">
                                                                        <h4 class="card-title">Personal Info</h4>
                                                                        <div class="form-group">
                                                                            <label class="form-label">About</label>
                                                                            <textarea class="form-control" name="about" type="text" value="" rows="2" data-gramm="false" wt-ignore-input="true"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Upload Passport Photograph</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="image" class="custom-file-input" required>
                                                                                <label class="custom-file-label">Choose Image</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6 mb-3">
                                                                <div class="mb-2">
                                                                    <h4 class="card-title">Address</h4>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Country</label>
                                                                            <input disabled id="mobile" name="" type="text" value="<?php print Main::h(strtoupper($logged_user->country)) ?>" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group ">
                                                                            <label class="form-label">City </label>
                                                                            <div class="row gutters-xs">
                                                                                <div class="col-md-4 mb-3 col-12">
                                                                                    <input disabled id="mobile" name="" type="text" placeholder="State" value="<?php print Main::h($logged_user->city) ?>" class="form-control" required>
                                                                                </div>
                                                                                <div class="col-md-4 mb-3 col-12">
                                                                                    <input disabled id="mobile" name="" type="text" placeholder="City" value="<?php print Main::h($logged_user->phone) ?>" class="form-control" required>
                                                                                </div>
                                                                                <div class="col-md-4 mb-3 col-12">
                                                                                    <input disabled id="postcode" name="postcode" type="text" placeholder="Zip/Post code" value="<?php print Main::h($logged_user->zipcode) ?>" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row d-none">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Address <span class="d-none d-xl-inline">No</span></label>
                                                                            <input id="address" name="address" value="Ikorodu" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mb-3">
                                                                <div class="mb-2">
                                                                    <h4 class="card-title">Change Password (Leave empty if not changing)</h4>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label class="form-label">New Password</label>
                                                                            <input id="password" name="user[password]" type="password" value="" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Confirm Password</label>
                                                                            <input id="password-confirm" name="user[confirm_password]" type="password" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="float-right mt-0 mb-0">
                                                            <button class="btn btn-primary " type="submit" name="">Update Account</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- .tab-pane -->
                                    </div>

                                    <!-- .tab-content -->
                                </div>
                                <!-- .card-innr -->
                            </div>
                            <!-- .card -->
                            <div class="content-area card"></div>
                            <!-- .card -->
                        </div>
                        <!-- .col -->
                        <div class="aside sidebar-right col-lg-4">
                            <div class="account-info card">
                                <div class="card-innr">
                                    <h6 class="card-title card-title-sm">Your Account Status</h6>
                                    <ul class="btn-grp">
                                        <li><a class="btn btn-auto btn-xs btn-success">Email Verified</a></li>
                                        <li class="d-non"><a class="btn btn-auto btn-xs <?php 
                                        
                                        if ($logged_user->kyc_verified == 0) {
                                            print "btn-warning";
                                        }else{
                                            print "btn-success";
                                        }
                                        
                                        ?> ">KYC Pending</a></li>
                                    </ul>
                                    <div class="gaps-2-5x"></div>
                                    <h6 class="card-title card-title-sm">Main Account Number</h6>
                                    <div class="d-flex justify-content-between"><span><span><?php print $logged_acct ?></span> </span>
                                    </div>

                                    <br>

                                    <h6 class="card-title card-title-sm">Main Account Balance</h6>
                                    <div class="d-flex justify-content-between"><span><span><?php print $logged_user->currency." ". number_format($logged_user->account_balance) ?></span> </span>
                                    </div>

                                </div>
                            </div>

                            <?php if ($logged_user->kyc_verified == 0):?>

                            <div class="kyc-info card d-non">
                                <div class="card-innr">
                                    <h6 class="card-title card-title-sm"><?php print SITE_NAME ?> Identity Verification</h6>
                                    <p>To comply with regulation, customers will have to go through <?php print SITE_NAME ?> identity verification.
                                    </p>
                                    <p class="lead text-light pdb-0-5x">
                                        Your Account Has Not Been Verified Yet on <?php print SITE_NAME ?>. Please Upload A Means Of Identification To Get Verified On <?php print SITE_NAME ?> <br>
                                    </p>
                                    <h6 class="kyc-alert text-danger">* <?php print SITE_NAME ?> Account Verification Required for purchase token</h6>
                                    <a href="<?php print Main::url_for("/kyc/") ?>" class="btn btn-primary btn-block">Click to Proceed</a>
                                </div>
                            </div>

                            <?php endif; ?>

                        </div>
                        <!-- .col -->
                    </div>
                    <!-- .container -->

                    <script src="../bankassets/js/jquery.bundle.js.download"></script>


                </div>
            </div>
            <script src="../bankassets/js/chart.js.download"></script>

            <p id="error" style='display: none '></p>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                var error = document.getElementById('error');

                if (error.textContent == "empty") {
                    swal("EMPTY FIELD!", "Country, State, City, Zip and Address fields are required", "warning");

                } else if (error.textContent == "pass_empty") {
                    swal("ERROR!", "Enter Current Password To Update Profile", "error");

                } else if (error.textContent == "pass_error") {
                    swal("Error!", "Password is incorrect, Enter current password correctly to update profile", "error");

                } else if (error.textContent == "pass_mismatch") {
                    swal("ERROR!", "New Password & Confirm Password do not match.", "error");

                } else if (error.textContent == "success") {
                    swal("Updated!", "Profile Updated Successfully", "success");
                    setTimeout(() => {
                        window.location.href = 'profile.php'
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