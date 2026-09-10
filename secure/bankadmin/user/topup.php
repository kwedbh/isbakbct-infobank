<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

require_once '../../private/initialize.php'; 

define("SITE_URL", 'https://secanov.com/' );

?>

<?php

$id  = $_GET['id'];

$user = User::find_by_id($id);

if (!$user) {

$session->message("User not found");

Main::redirect_to(Main::url_for("/admin/user"));


}


if (Main::is_post_request()) {

require '../../vendor/autoload.php';    

$args = $_POST;

// $args['balance']  = $user->balance + (float)$args['amount'];

$sql = "UPDATE  users SET account_balance =  account_balance + ".(float)$args['amount']." " ;

$sql .= "WHERE id = '".$user->id."' ";

// print $sql;

// print_r($args);

// die();

$result = $db->query($sql);


if ($result) {

$mail = new PHPMailer(true);

try {
//Server settings

require_once SHARED_PATH."/mail_setting.php";

$mail->addAddress($user->email, $user->full_name);

//Add a recipient

//Content

$mail->isHTML(true);  

//Set email format to HTML
$body = '
<div marginheight="0" marginwidth="0" style="margin:0px;background-color:#f2f3f8">
<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8">
<tbody><tr>
<td>
<table style="background-color:#f2f3f8;max-width:670px;margin:0 auto" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td style="height:80px">&nbsp;</td>
</tr>
<tr>
<td style="text-align:center">
<a href='.SITE_URL.'>
<img width="60" src='.SITE_URL.'logo.png'.' class="CToWUd" data-bit="iit">
</a>
</td>
</tr>
<tr>
<td style="height:20px">&nbsp;</td>
</tr>
<tr>
<td>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff;border-radius:3px;text-align:center">
<tbody><tr>
<td style="height:40px">&nbsp;</td>
</tr>
<tr>
<td style="padding:0 35px">
    <h1>
    <p style="color:#455056;font-size:15px;line-height:24px;margin:0">
    Dear '.$user->full_name.', <br>

Your Deposit of '.$logged_user->currency." ".(float)$args['amount'].' is now available in your '.SITE_NAME.' account.

    <br>

    <a href='.SITE_URL."login.php".' style="background:black;text-decoration:none!important;font-weight:500;margin-top:35px;color:#fff;text-transform:uppercase;font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px">Login Now</a><br>
    Do not recognize this activity? Please reset your password and contact customer support immediately <br>
            This is an automated message, Please do not reply.<br>
    </p>
<strong style="background:black;text-decoration:none!important;font-weight:500;margin-top:35px;color:#fff;text-transform:uppercase;font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px">
All The best <br>
The '.SITE_NAME.' Team
</strong>
</h1></td>
</tr>
<tr>
<td style="height:40px">&nbsp;</td>
</tr>
</tbody></table>
</td>
</tr><tr>
<td style="height:20px">&nbsp;</td>
</tr>
<tr>
<td style="text-align:center">
<p style="font-size:14px;color:rgba(69,80,86,0.7411764705882353);line-height:18px;margin:0 0 0">© <strong><a href="'.SITE_URL.'" rel="noreferrer">'.SITE_URL.'</a></strong></p>
</td>
</tr>
<tr>
<td style="height:80px">&nbsp;</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table><div class="yj6qo"></div><div class="adL">
</div></div>



';

// print $body;

// die();

// 

$mail->Subject = ''.SITE_NAME.' Deposit Confirmed';
$mail->Body    = $body;
$mail->AltBody = strip_tags($body);

$mail_sent = $mail->send();

if ($mail_sent) {
$session->message("Account Topped UP with Success..");
Main::redirect_to(Main::url_for("/bankadmin/user/"));
}


} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}           

}

}


?>


<?php require_once SHARED_PATH."/admin_header.php" ?>
<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="page-header">
<h3 class="page-title">
Top UP
</h3>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Top Up</a></li>
<li class="breadcrumb-item active" aria-current="page"></li>
</ol>
</nav>
</div>
<div class="row">                    
<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Top UP</h4>

<h5>Account Number / Name: <?php print Main::h($user->full_name." / ".$user->email) ?></h5><br>

<h5>Account Balance: <?php print $user->currency. Main::h(number_format($user->account_balance,2)) ?></h5><br>

<div>

<form action="" method="post">

<div class="form-group">

<div class="form-row">
<div class="col-md-6">
                                            <label for="">Amount</label>

<input name="amount" autofocus type="text" class="form-control">
</div>

</div>

</div>

<button type="submit" class="btn btn-info">Top UP</button>

</form>

</div>

<div style="clear: both;"></div>




</div>
</div>
</div>

</div>
</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>