<?php 

require '../../private/initialize.php';



Main::require_login_admin();
$date_joined = date("d F Y") ;

 $id = Main::h(Main::u($_GET['id']));

if ($_GET['id'] === '') {
  Main::redirect_to(Main::url_for("/bankadmin/user/index.php"));
}
if (!isset($_GET['id'])) {
   Main::redirect_to(Main::url_for("/bankadmin/user/index.php"));
}

$user = User::find_by_account_number($id);
if ($user == false) {
  Main::redirect_to(Main::url_for("/bankadmin/user/index.php"));
}

if ($_GET['id'] === "pending") {
  User::update_account_0n_go(Main::account_number(),$date_joined,Main::otp_code(),$id);
    require_once SHARED_PATH."/activate_alert.php";
mail($to,$subject,$message,$headers);  
  Main::redirect_to(Main::url_for("/bankadmin/user/index.php"));
}else{
  //Do Nothing
}


 ?>
<?php require_once SHARED_PATH."/admin_header.php"; ?>
      <div class="container-fluid">
          <h4 class="text-center mt-3 mb-3"><?php print Main::h($user->full_name) ?></h4>
<div class="card mt-3">
  <div class="card-body">
  <img class="mb-3"  src="<?php print Main::url_for("/images/".Main::h($user->image_link))  ?>" style="width: 140px; max-width: 140px; height: 160px; max-height: 160px;"> 
  <ul class="list-group">

    <li class="list-group-item"><h6>Full Name: <?php echo Main::h($user->full_name); ?></h6></li>
    <li class="list-group-item"><h6>Email Address: <?php echo Main::h($user->email); ?></h6></li>
    <li class="list-group-item"><h6>Phone: <?php echo Main::h($user->phone); ?></h6></li>
    <li class="list-group-item"><h6>Account Number: <?php echo Main::h($user->account_number); ?></h6></li>
    <li class="list-group-item"><h6>Account Balance: <?php print Main::h($user->currency  . " ") ?><?php echo Main::h($user->account_balance); ?></h6></li> 
    <li class="list-group-item"><h6>User Transactions: <a href="<?php print Main::url_for("/bankadmin/user/transactions.php?id=".Main::h($user->account_number)) ?>">View Transactions</a></h6></li>       
    <li class="list-group-item"><h6>City: <?php echo Main::h($user->city); ?></h6></li>
    <li class="list-group-item"><h6>Date Joined: <?php echo Main::h($user->date_joined); ?></h6></li>     
    <li class="list-group-item"><h6>Zip Code: <?php echo Main::h($user->zipcode); ?></h6></li>
    <!-- <li class="list-group-item"><h6>Sort Code: <?php echo Main::h($user->sort_code); ?></h6></li>
    <li class="list-group-item"><h6>Route Number: <?php echo Main::h($user->route_number); ?></h6></li> -->
    <li class="list-group-item"><h6>Account Status: <?php echo Main::h($user->account_status); ?></h6></li> 
    <li class="list-group-item"><h6>Account Type: <?php echo Main::h($user->account_type); ?></h6></li>                                             
    <li class="list-group-item"><h6>Driver license Front:  <br><br>
    <img class="mb-3"  src="<?php print Main::url_for("/images/".Main::h($user->drivers_licence))  ?>" style="width: 140px; max-width: 140px; height: 160px; max-height: 160px;"></h6></li>                                             
    <li class="list-group-item"><h6>Driver license Back: 

    <br><br>
    <img class="mb-3"  src="<?php print Main::url_for("/images/".Main::h($user->drivers_licence_back))  ?>" style="width: 140px; max-width: 140px; height: 160px; max-height: 160px;">

    </h6></li>
    
    <li class="list-group-item"><h6>National ID:  <br><br>
    <img class="mb-3"  src="<?php print Main::url_for("/images/".Main::h($user->national_id))  ?>" style="width: 140px; max-width: 140px; height: 160px; max-height: 160px;"></h6></li>
    
    <li class="list-group-item"><h6>National ID Back:  <br><br>
    <img class="mb-3"  src="<?php print Main::url_for("/images/".Main::h($user->national_id_back))  ?>" style="width: 140px; max-width: 140px; height: 160px; max-height: 160px;"></h6></li>
    <li class="list-group-item"><h6>International Passport: 

    <br><br>
    <img class="mb-3"  src="<?php print Main::url_for("/images/".Main::h($user->int_pass))  ?>" style="width: 140px; max-width: 140px; height: 160px; max-height: 160px;">

    </h6></li>
    
    <br><br>

  <?php if ($user->account_status == "Pending"): ?>

    <!-- <div class="mt-5">

      <a href="approve.php?id=<?php //print Main::h($user->account_number) ?>" class="btn btn-success float-left">Approve</a>

      <a href="delete.php?id=<?php //print Main::h($user->account_number) ?>" class="btn btn-danger float-right">Decline</a>

  
    </div> -->

<?php endif; ?>
                                           
  </ul>

  </div>
</div>          
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>
