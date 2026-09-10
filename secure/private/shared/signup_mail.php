<?php

 $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$subject= "Welcome to ".SITE_NAME;

$message ='<html>';

$message .='<head>';

$message .='<meta charset="utf-8">';

$message .='<meta http-equiv="content-type" content="text/html; charset=utf-8">';

$message .='<meta name="viewport" content="width=device-width, initial-scale=1.0">';

$message .='<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';



$message .='<title>account created</title>';

$message .='<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,500,300,700" rel="stylesheet" type="text/css">';

$message .='<style type="text/css">';

$message .='@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900italic,900,700italic,700,600italic,600,400italic,300italic,300,200italic,200);</style>';



$message .='</head>';



$message .='<body style="font-size:14px; font-family:arial;">';





$message .='<div class="wrapper" style="width:85%; box-sizing:border-box; margin:auto; border:1px solid #ccc; background:#fff; padding:10px;">';

$message .='<table width="100%">';

  $message .='<tr style="line-height:30px;">';

    $message .='<td style="color:#686C70;font-size:35px; text-align:center; color:#00BEC6; font-weight:600;">'.SITE_NAME.'</td>';

  $message .='</tr>';



   $message .='<tr ><td style="border-bottom:5px solid #00BEC6;">&nbsp;</td></tr>';

  $message .='<tr><td>&nbsp;</td></tr>';

  $message .='<tr style="line-height:30px;">';

$message .='<td style="color:#686C70;font-size:16px; font-weight:600;">Dear '.$user->full_name.'</td>';

  $message .='</tr>';

  $message .='<tr style="line-height:35px;">';

    $message .='<td style="color:#686C70;font-size:16px;">Your account has been created successfully.
    <br><br>

    Your account number is : '.$user->account_number.' <br><br>
    </td>';

  $message .='</tr>';

   $message .=' <tr style="line-height:35px;">';

    $message .='<td style="color:#686C70;font-size:16px;">
    Thank you so much for allowing us to assist you with your recent account opening. We are committed to providing our customers with the highest level of service and the most innovative banking products possible. <br><br>

We are very glad you chose us as your financial institution and hope you will take advantage of our wide variety of savings, investment, and loan products, all designed to meet your specific needs.

     </td>';

  $message .='</tr>';

   $message .='<tr><td>&nbsp;</td></tr>';

  $message .='<tr style="line-height:30px;">';

    $message .='<td style="color:#686C70;font-size:16px;">'.SITE_NAME.' will never send you a link to any external website or request your personal banking details via e-mail, telephone or in person. You are advised to always keep your log-on details safe and never disclose it to anyone. </td>';

  $message .='</tr>';

  $message .='<tr><td>&nbsp;</td></tr>';

  $message .='<tr style="line-height:30px;">';

    $message .='<td style="color:#686C70;font-size:16px;">

Thank you for choosing '.SITE_NAME.'.

</td>';

  $message .='</tr>';





    $message .='<tr><td>&nbsp;</td></tr>';

     $message .='<tr ><td style="border-bottom:2px solid #ccc;">&nbsp;</td></tr>';



   $message .=' <tr><td>&nbsp;</td></tr>';













  $message .='<tr style="line-height:20px;">';

   $message .='<td style="color:#686C70;font-size:13px;">The Information contained and transmitted by this E-MAIL is proprietary to '.SITE_NAME.' and/or its Customer and is intended for use only by the individual or entity to which it is addressed, and may contain information that is privileged, confidential or exempt from a disclosure under applicable law.

If this is a forwarded message, the content of this E-MAIL may not have been sent with the authority of the Bank. '.SITE_NAME.' shall not be liable for any mails sent without due authorisation or through unauthorised access.

If you are not the intended recipient, an agent of the intended recipient or a person responsible for delivering the information to the named recipient, you are notified that any use, distribution, transmission, printing, copying or dissemination of this information in any way or in any manner is strictly prohibited.

If you have received this communication in error, please delete this mail and notify us immediately at '.SITE_EMAIL.'

</td>';

  $message .='</tr>';

   $message .='</table>';



$message .='</div>';







$message .='</body>';

$message .='</html>';

// print $message;

// die();
