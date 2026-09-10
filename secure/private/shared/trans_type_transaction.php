<?php

$trans_msg = '

    <table border="1" style="width:100%; border-collapse: collapse; border: 1px solid black;">';

// Add row for the site name
$trans_msg .= '<tr>';
$trans_msg .= '<td colspan="2" style="text-align: center; font-size: 30px; font-weight: bolder;">'.SITE_NAME.'</td>';
$trans_msg .= '</tr>';

$originalNumber = $transfer->reciever_account_number; // Replace this with your actual number
$maskedNumber = substr($originalNumber, 0, 4) . '****' . substr($originalNumber, -4);

$details = array(
    array('Transaction Type', $transfer->transaction_type),
    array('Transaction Status', $transfer->transfer_status),
    array('From Account', $logged_name . " - " . $maskedNumber),
    array('Reference Number', $transfer->ref_numb),
    array('Beneficiary Name', $transfer->reciever_name),
    array('Beneficiary Bank Name', $transfer->reciever_bank_name),
    array('Beneficiary Bank Address', $transfer->rec_bank_address),
    array('Beneficiary Bank State', $transfer->rec_bank_state),
    array('Beneficiary Bank Country', $transfer->rec_bank_country),
    array('Beneficiary IBAN / Routing Number', $transfer->routing_number),
    // array('Beneficiary Swift Code', $transfer->swift_code),
    array('Amount', $logged_user->currency . ' ' . number_format($transfer->amount, 2)),
    // array('Beneficiary email', $transfer->reciver_email),
    array('Reason For Payment', $transfer->Transfer_description),
);

foreach ($details as $detail) {
    $trans_msg .= '<tr>';
    $trans_msg .= '<td style="padding: 10px;">' . $detail[0] . '</td>';
    $trans_msg .= '<td style="padding: 10px;">' . $detail[1] . '</td>';
    $trans_msg .= '</tr>';
}

$trans_msg .= '</table>';

print $trans_msg;