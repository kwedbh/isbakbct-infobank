<?php require_once "../private/initialize.php";

Main::require_login();

$id = $_GET['id'];

$transfer = Transfer::find_by_id($id);

if (!$transfer) {    
    
    print "<script>alert('There was problem.')</script>";

    print "<script>window.location.replace('index.php');</script>";

    die();
}

// if ($transfer->sender_account_number != $logged_acct) {    
    
//     print "<script>alert('There was problem.')</script>";

//     print "<script>window.location.replace('index.php');</script>";

//     die();
// }

if ($transfer->otp_confirmed == 0) {

    print "<script>alert('Please complete your transaction.')</script>";

    print "<script>window.location.replace('index.php');</script>";

    die();
}

require '../vendor/autoload.php'; // Adjust the path based on your project structure

use Dompdf\Dompdf;
use Dompdf\Options;

// Create a PDF document
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$pdf = new Dompdf($options);

require_once SHARED_PATH . "/trans_type_transaction.php";


// die();

// Load HTML content
$htmlContent = $trans_msg;

// Load HTML to Dompdf
$pdf->loadHtml($htmlContent);

// Set paper size (optional)
$pdf->setPaper('A4', 'portrait');

// Render PDF (first rendering pass to get total pages)
$pdf->render();

// Specify content type as 'inline' to display in the browser
$trans_name = str_replace(' ', '', SITE_NAME . '-' . $logged_name . '-' . rand());


die();
$pdf->stream($trans_name, ['Attachment' => 0]);

