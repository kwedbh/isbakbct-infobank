<?php  

$subject= "Transaction Alert";

$message='<html>';

$message.='<head>';

$message.='<meta charset="utf-8">';

$message.='<meta http-equiv="content-type" content="text/html; charset=utf-8">';

$message.='<meta name="viewport" content="width=device-width, initial-scale=1.0">';

$message.='<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';



$message.='<title>Transaction Mail</title>';

$message.='<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,500,300,700" rel="stylesheet" type="text/css">';

$message.='<style type="text/css">';

$message.='@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900italic,900,700italic,700,600italic,600,400italic,300italic,300,200italic,200);</style>';



$message.='</head>';



$message.='<body style="font-size:14px; font-family:arial;">';





$message.='<div class="wrapper" style="width:85%; box-sizing:border-box; margin:auto; border:1px solid #ccc; background:#fff; padding:10px;">';

$message.='<table width="100%">';

  $message.='<tr style="line-height:30px;">';

    $message.='<td style="color:#686C70;font-size:35px; text-align:center; color:#00BEC6; font-weight:600;">'.SITE_NAME.'</td>';

  $message.='</tr>';

  

   $message.='<tr ><td style="border-bottom:5px solid #00BEC6;">&nbsp;</td></tr>';
  $message.='<tr><td>&nbsp;</td></tr>';
  $message.='<tr style="line-height:30px;">';
    $message.='<td style="color:#686C70;font-size:16px; font-weight:600;">Dear '.$transfer->reciever_name.'</td>';

  $message.='</tr>';
  $message.='<tr style="line-height:35px;">';
    $message.='<td style="color:#686C70;font-size:16px;">'.SITE_NAME.' Transaction Alert Service</td>';

  $message.='</tr>';

  $message.='<tr style="line-height:30px;">';

    $message.='<td style="color:#686C70;font-size:16px;">Please be informed that a '.$transfer->transfer_type.' transaction occurred on your bank account.</td>';

  $message.='</tr>';

  $message.='<tr style="line-height:30px;">';

     $message.='<td style="color:#686C70;font-size:16px;">Kindly find details of the transaction below:</td>';

  $message.='</tr>';

  

  $message.='</table>';
  $message.='<table width="100%" >';
  $message.='<tr>';
   $message.=' <td colspan="2" style="background:#00BBC3; padding:5px;">Transaction details</td>';

  $message.='</tr>';
  $message.='<tr style="background:#D9D9D9;">';
   $message.=' <td style="padding:5px;">Account Number</td>';
   $message.=' <td style="padding:5px;">'.$transfer->reciever_account_number.'</td>';
  $message.='</tr>';
  $message.='<tr style="background:#f6f6f6">';
    $message.='<td style="padding:5px;">Account Name</td>';
    $message.='<td style="padding:5px;">'.$transfer->reciever_name.'</td>';
  $message.='</tr>';
 $message.='<tr style="background:#D9D9D9;">';
    $message.='<td style="padding:5px;">Description</td>';
    $message.='<td style="padding:5px;">'.$transfer->Transfer_description.'</td>';
  $message.='</tr>';
  // $message.='<tr style="background:#f6f6f6">';
  //   $message.='<td style="padding:5px;">Refrence No</td>';
  //   <td style="padding:5px;">'.$ref_num.'</td>';

  // $message.='</tr>';

  //  $message.='<tr style="background:#D9D9D9;">';

  //   $message.='<td style="padding:5px;">Transaction  Branch</td>';

  //   $message.='<td style="padding:5px;">'.$branch_bank.'</td>';

  // $message.='</tr>';

  $message.='<tr style="background:#f6f6f6">';

    $message.='<td style="padding:5px;">Transaction Amount</td>';

   $message.=' <td style="padding:5px;">'.$logged_user->currency  . " ".' '.$transfer->amount.'.00</td>';

  $message.='</tr>';

 $message.=' <tr style="background:#D9D9D9;">';

       $message.='<td style="padding:5px;">Transaction Time</td> ';

    $message.='<td style="padding:5px;">'.date("H:i").'</td>';

  $message.='</tr>';

  $message.='<tr style="background:#f6f6f6">';

$message.='<td style="padding:5px;">Transaction Date</td>';

    $message.='<td style="padding:5px;">'.date("d F Y").'</td>';

  $message.='</tr>';

$message.='</table>';







  $message.='<table width="100%">';

   $message.='<tr><td>&nbsp;</td></tr>';

  $message.='<tr style="line-height:30px;">';

    $message.='<td style="color:#686C70;font-size:16px;">As a result of this transaction , the balances on this account are:</td>';

  $message.='</tr>';

  $message.='<tr><td>&nbsp;</td></tr>';

  $message.='<tr style="line-height:30px;">';

  $logged_user = User::find_by_account_number($_SESSION['account_number'] ?? '');

  $message.='<td style="color:#686C70;font-size:16px;">Available Balance : '.$logged_user->currency  . " ".' '.number_format($logged_user->account_balance,2).'</td>';
  $message.='</tr>';

  

  

    $message.='<tr><td>&nbsp;</td></tr>';

    $message.=' <tr ><td style="font-weight:600; color:#565454; font-size:18px;">Thank you  for banking  with '.SITE_NAME.'</td></tr>';

      $message.='<tr><td>&nbsp;</td></tr>';

  $message.='<tr ><td style="border-bottom:2px solid #ccc;"></td></tr>';

  

  

    $message.='<tr><td>&nbsp;</td></tr>';

  

  

  

  $message.='<tr style="line-height:20px;">';

    $message.='<td style="color:#686C70;font-size:13px;">The Information contained and transmitted by this E-MAIL is proprietary to '.SITE_NAME.' and/or its Customer and is intended for use only by the individual or entity to which it is addressed, and may contain information that is privileged, confidential or exempt from a disclosure under applicable law.

If this is a forwarded message, the content of this E-MAIL may not have been sent with the authority of the Bank. '.SITE_NAME.' shall not be liable for any mails sent without due authorisation or through unauthorised access.

If you are not the intended recipient, an agent of the intended recipient or a person responsible for delivering the information to the named recipient, you are notified that any use, distribution, transmission, printing, copying or dissemination of this information in any way or in any manner is strictly prohibited.

If you have received this communication in error, please delete this mail and notify us immediately at '.SITE_EMAIL.'

</td>';

  $message.='</tr>';

   $message.='</table>';



$message.='</div>';



$message.='</body>';

$message.='</html>';