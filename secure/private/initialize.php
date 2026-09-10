<?php

// die("Uploading");

   error_reporting(0);
  ini_set('display_errors', 0);

//   ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

  ob_start(); // output buffering is turned on

  // Assign file paths to PHP constants
  // __FILE__ returns the current path to this file
  // dirname() returns the path to the parent directory
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');
  define('CURRENCY', '$');
  define("MASTER_EMAIL",'support@infoakb.online');


  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/') + 0;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  // Load class definitions manually

// -> Individually
// require_once('classes/admin.class.php');

// -> All classes in directory
foreach(glob('classes/*.class.php') as $file) {
  require_once($file);
}

require_once 'query.php';

// Autoload class definitions
  function my_autoload($class) {
    if(preg_match('/\A\w+\Z/', $class)) {
      include('classes/' . $class . '.class.php');
    }
  }
  spl_autoload_register('my_autoload');

  $db = Database::db_connect();

  databaseObject::set_database($db);
  $errors = [];

  $session = new Session;
  $admin_session = new AdminSession;
  $account_pin = $_SESSION['account_pin'] ?? "";

  define('ENC_PAGE', 'encrypted');
  

  $siteinfo = Site::find_by_id(1);

if ($session->is_logged_in()) {
  $logged_user = User::find_by_account_number($_SESSION['account_number'] ?? '');

  $logged_name = Main::h($logged_user->full_name);

  $logged_acct = Main::h($logged_user->account_number);

  $logged_email = Main::h($logged_user->email);

  $logged_img = Main::h($logged_user->image_link);

  $user_image = Main::url_for("/images/".Main::h($logged_img));
}

  define('SITE_NAME', 'Akb');
  
  define('SITE_EMAIL', 'support@infoakb.online');

  define('MAIL_SERVER','d4.my-control-panel.com');

  define('SITE_ADDRESS', '
  
  1465 Villa Drive, Plymouth
  
  ');

  define("REG_RECEIVER","support@infoakb.online");

  define("MAIL_PASSWORD",'Fakepassword123');

  $currencies = array(
    'USD' => 'United States Dollar (USD)',
    'EUR' => 'Euro (EUR)',
    'GBP' => 'British Pound Sterling (GBP)',
    'JPY' => 'Japanese Yen (JPY)',
    'CHF' => 'Swiss Franc (CHF)',
    'CAD' => 'Canadian Dollar (CAD)',
    'AUD' => 'Australian Dollar (AUD)',
    'NZD' => 'New Zealand Dollar (NZD)',
    'CNY' => 'Chinese Yuan (CNY)',
    'INR' => 'Indian Rupee (INR)',
    'BRL' => 'Brazilian Real (BRL)',
    'ZAR' => 'South African Rand (ZAR)',
    'RUB' => 'Russian Ruble (RUB)',
    'SGD' => 'Singapore Dollar (SGD)',
    'HKD' => 'Hong Kong Dollar (HKD)'
  );

  $network_type = [

    'Bitcoin',
  
    'Tron',
  
    'Ethereum ERC20',
  
    'BNB Smart Chain BEF20'
  
  
  
  ];


