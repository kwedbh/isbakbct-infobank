<?php

function update_otp($debit,$id,$ref_numb)
{

  global $db;

  $sql = "UPDATE transfers SET ";
  $sql .= "otp_confirmed = '".mysqli_real_escape_string($db, "1")."', ";
  $sql .= "transfer_status = '".mysqli_real_escape_string($db, "Failed")."', ";
  $sql .= "debit = '".mysqli_real_escape_string($db, $debit)."' ";
  $sql .= "WHERE sender_account_number = '".mysqli_real_escape_string($db, $id)."' ";
  $sql .= "AND ref_numb = '".mysqli_real_escape_string($db, $ref_numb)."' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  // print $sql;
  // confirm_query($result);

  if ($result) {
    return true;
  }
  else {
    echo mysqli_error($db);
    Database::db_disconnect($db);
    exit();
  }
}


function update_otp2($debit,$id,$ref_numb)
{

  global $db;

  $sql = "UPDATE transfers SET ";
  $sql .= "otp_confirmed = '".mysqli_real_escape_string($db, "1")."', ";
  $sql .= "transfer_status = '".mysqli_real_escape_string($db, "Success")."', ";
  $sql .= "debit = '".mysqli_real_escape_string($db, $debit)."' ";
  $sql .= "WHERE sender_account_number = '".mysqli_real_escape_string($db, $id)."' ";
  $sql .= "AND ref_numb = '".mysqli_real_escape_string($db, $ref_numb)."' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  // print $sql;
  // confirm_query($result);

  if ($result) {
    return true;
  }
  else {
    echo mysqli_error($db);
    Database::db_disconnect($db);
    exit();
  }
}

function update_cot($id,$ref_numb)
{

  global $db;

  $sql = "UPDATE transfers SET ";
  $sql .= "cot_confirmed = '".mysqli_real_escape_string($db, "1")."' ";
  $sql .= "WHERE sender_account_number = '".mysqli_real_escape_string($db, $id)."' ";
  $sql .= "AND ref_numb = '".mysqli_real_escape_string($db, $ref_numb)."' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  // print $sql;
  // confirm_query($result);

  if ($result) {
    return true;
  }
  else {
    echo mysqli_error($db);
    Database::db_disconnect($db);
    exit();
  }
}

function update_tax($id,$ref_numb)
{

  global $db;

  $sql = "UPDATE transfers SET ";
  $sql .= "tax_confirmed = '".mysqli_real_escape_string($db, "1")."' ";
  $sql .= "WHERE sender_account_number = '".mysqli_real_escape_string($db, $id)."' ";
  $sql .= "AND ref_numb = '".mysqli_real_escape_string($db, $ref_numb)."' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  // print $sql;
  // confirm_query($result);

  if ($result) {
    return true;
  }
  else {
    echo mysqli_error($db);
    Database::db_disconnect($db);
    exit();
  }
}


function update_account_balance($amount,$account_number)
  {
    global $db;

$sql = "UPDATE users SET ";
// $sql .="account_balance='".$db->escape_string($account_balance)."' ";
$sql .="account_balance = account_balance + '".$db->escape_string($amount)."' ";
$sql .="WHERE account_number ='".$db->escape_string($account_number)."' ";
$sql .="LIMIT 1 ";
$result = $db->query($sql);
// print $sql;
// self::confirm_query($result);
if ($result) {
  return true;
}else {
  print "There was a problem Updating this account ";
  print mysqli_error($db);
  Database::db_disconnect($db);
  exit();
}
  }

function deduct_account_balance($amount,$account_number)
  {
    global $db;

$sql = "UPDATE users SET ";
// $sql .="account_balance='".$db->escape_string($account_balance)."' ";
$sql .="account_balance = account_balance - '".$db->escape_string($amount)."' ";
$sql .="WHERE account_number ='".$db->escape_string($account_number)."' ";
$sql .="LIMIT 1 ";
$result = $db->query($sql);
// print $sql;
// self::confirm_query($result);
if ($result) {
  return true;
}else {
  print "There was a problem Updating this account ";
  print mysqli_error($db);
  Database::db_disconnect($db);
  exit();
}
  }
