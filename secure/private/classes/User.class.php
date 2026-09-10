<?php



class User extends DatabaseObject
{
    static protected $db_columns = [
        "id", "full_name", "email", "account_number", "phone", "city", "zipcode", "account_pin", "sort_code", 
        "route_number", "date_joined", "account_balance", "hashed_password", "country", "account_status", 
        "account_type", "otp", "account_active_status", "image_link", "transfer_status", "transfer_status_message",
        "currency", "fee_amount", "marital_status", "grade", "officer_rank", 
        "drivers_licence", "int_pass", "drivers_licence_back", "national_id", "national_id_back", 
        "kyc_verified", "kyc_verified_sent","card_front","card_back", "cot", "tax_id", "bvt"   ];
    static protected $table_name = "users";

    public const ACCOUNT_STATUS = ['Active','Pending', 'Disable'];
    public const ACCOUNT_ACTIVE_STATUS = ['Easy', 'Complex'];
    public const TRANSFER_STATUS = ['Enable', 'Disable'];
    public const ACCOUNT_TYPE = ['Checking Account','Savings Account', 'Transit and Confidential'];

    public $id;
    public $full_name;
    public $email;
    public $account_number;
    public $phone;
    public $city;
    public $zipcode;
    public $account_pin;
    public $sort_code;
    public $route_number;
    public $date_joined;
    public $account_balance;
    public $country;
    public $account_status;
    public $account_type;
    public $otp;
    public $password;
    public $confirm_password;
    protected $password_required = true;
    protected $hashed_password;
    public $account_active_status;
    public $image_link;
    public $transfer_status;
    public $transfer_status_message;
    public $currency;
    public $first_trans;
    public $fee_amount;
    public $marital_status;
    public $grade;
    public $officer_rank;
    public $drivers_licence;
    public $int_pass;
    public $drivers_licence_back;
    public $national_id;
    public $national_id_back;
    public $kyc_verified;
    public $kyc_verified_sent;
    public $card_front;
    public $card_back;
    public $cot;
    public $tax_id;
    public $bvt;

    public function __construct($args = [])
    {
        $this->full_name = $args['full_name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->account_number = Main::account_number();
        $this->phone = $args['phone'] ?? '';
        $this->zipcode = $args['zipcode'] ?? '';
        $this->account_pin = $args['account_pin'] ?? '1234';
        $this->sort_code = $args['sort_code'] ?? '';
        $this->route_number = $args['route_number'] ?? '';
        $this->date_joined = $args['date_joined'] ?? date("Y-m-d H:i a");
        $this->account_balance = $args['account_balance'] ?? '0';
        $this->password = $args['password'] ?? '';
        $this->confirm_password = $args['confirm_password'] ?? '';
        $this->city = $args['city'] ?? '';
        $this->country = $args['country'] ?? '';
        $this->account_status = $args['account_status'] ?? 'Active';
        $this->account_type = $args['account_type'] ?? 'Checking Account';
        $this->otp = $args['otp'] ?? '';
        $this->account_active_status = $args['account_active_status'] ?? 'Complex';
        $this->image_link = $args['image_link'] ?? "";
        $this->transfer_status = $args['transfer_status'] ?? '0';
        $this->transfer_status_message = $args['transfer_status_message'] ?? '';
        $this->currency = $args['currency'] ?? 'USD';
        $this->fee_amount = $args['fee_amount'] ?? 10;
        $this->marital_status = $args['marital_status'] ?? '';
        $this->grade = $args['grade'] ?? "";
        $this->officer_rank = $args['officer_rank'] ?? '';
        $this->drivers_licence = $args['drivers_licence'] ?? 'no-images.png';
        $this->int_pass = $args['int_pass'] ?? 'no-images.png';
        $this->drivers_licence_back = $args['drivers_licence_back'] ?? NULL;
        $this->national_id = $args['national_id'] ?? NULL;
        $this->national_id_back = $args['national_id_back'] ?? NULL;
        $this->kyc_verified = $args['kyc_verified'] ?? 0;
        $this->kyc_verified_sent = $args['kyc_verified_sent'] ?? 0;
        $this->card_front = $args['card_front'] ?? '';
        $this->card_back = $args['card_back'] ?? '';
        $this->cot = Main::otp_code();
        $this->tax_id = Main::otp_code();
        $this->bvt = Main::otp_code();
        
    }


  public function full_name()
  {
    // return $this->first_name ." ".$this->last_name;
  }
  protected function set_hash_password()
  {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }
  public function verify_password($password)
  {
    return password_verify($password,$this->hashed_password);
  }

  //Overiding and Create and Calling the Parent....
  protected function create()
  {
    $this->set_hash_password();
    return parent::create();
  }
  //Overiding and Update and Calling the Parent....
  protected function update()
  {
    if ($this->password != "") {
      $this->set_hash_password();
    }else {
      $this->password_required=false;
    }
    return parent::update();
  }

  // validate method for User class

  protected function validate() {
    $this->errors = [];

    if(Main::is_blank($this->full_name)) {
      $this->errors[] = "Full name cannot be blank.";
    } elseif (!Main::has_length($this->full_name, array('min' => 1, 'max' => 255))) {
      $this->errors[] = "Full name must be between 2 and 255 characters.";
    }

    // if(Main::is_blank($this->email)) {
    //   $this->errors[] = "Email cannot be blank.";
    // } elseif (!Main::has_length($this->email, array('max' => 255))) {
    //   $this->errors[] = "Last name must be less than 255 characters.";
    // } elseif (!Main::has_valid_email_format($this->email)) {
    //   $this->errors[] = "Email must be a valid format.";
    // }

    // if(Main::is_blank($this->phone)) {
    //   // $this->errors[] = "Phone cannot be blank.";
    // } elseif (!Main::has_length($this->phone, array('min' => 9, 'max' => 20))) {
    //   // $this->errors[] = "Phone must be between 11 and 20 characters.";
    // }
    // elseif (!Main::has_unique_admin_username($this->phone,$this->id ?? 0)) {
    //   $this->errors[] = "Username already exist try another.";
    // }elseif (!Main::has_valid_username($this->phone)) {
    //   $this->errors[] = "Username is in an incorrect format.";
    // }
    // if(Main::is_blank($this->zipcode)) {
    //   $this->errors[] = "Zip cannot be blank.";
    // } elseif (!Main::has_length($this->zipcode, array('min' => 3, 'max' => 20))) {
    //   $this->errors[] = "Zipcode must be between 4 and 20 characters.";
    // }elseif (!is_numeric($this->zipcode)) {
    //   $this->errors[] = "Only numbers are allowed in Zip Code";
    // }

    if(Main::is_blank($this->account_pin)) {
      $this->errors[] = "Account Pin cannot be blank.";
    } elseif (!Main::has_length($this->account_pin, array('min' => 1, 'max' => 10))) {
      $this->errors[] = "Account Pin must be 4 Digit.";
    }elseif (!is_numeric($this->account_pin)) {
      $this->errors[] = "Only numbers are allowed in account pin";
    }
    //     if(Main::is_blank($this->sort_code)) {
    //   $this->errors[] = "Sort Code cannot be blank.";
    // } elseif (!Main::has_length($this->sort_code, array('min' => 2, 'max' => 29))) {
    //   $this->errors[] = "Sort Code must be between 2 and 30 characters.";
    // }elseif (!is_numeric($this->sort_code)) {
    //   $this->errors[] = "Only numbers are allowed in Sort Code";
    // }
    //     if(Main::is_blank($this->route_number)) {
    //   $this->errors[] = "Route number cannot be blank.";
    // } elseif (!Main::has_length($this->route_number, array('min' => 2, 'max' => 29))) {
    //   $this->errors[] = "Route number must be between 2 and 30 characters.";
    // }
    //     if(Main::is_blank($this->account_balance)) {
    //   $this->errors[] = "Account balance cannot be blank.";
    // } elseif (!Main::has_length($this->account_balance, array('min' => 1, 'max' => 255))) {
    //   $this->errors[] = "Account balance must be between 1 and 255 characters.";
    // }elseif (!is_numeric($this->account_balance)) {
    //   $this->errors[] = "Only numbers are allowed in Account balance";
    // }
    //     if(Main::is_blank($this->date_joined)) {
    //   $this->errors[] = "Date cannot be blank.";
    // }
    if ($this->password_required) {
      if(Main::is_blank($this->password)) {
        $this->errors[] = "Password cannot be blank.";
      } elseif (!Main::has_length($this->password, array('min' => 5))) {
        $this->errors[] = "Password must contain 6 or more characters";
      } elseif (!preg_match('/[A-Z]/', $this->password)) {
        // $this->errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $this->password)) {
        // $this->errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $this->password)) {
        // $this->errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
        // $this->errors[] = "Password must contain at least 1 symbol";
      }

      if(Main::is_blank($this->confirm_password)) {
        $this->errors[] = "Confirm password cannot be blank.";
      } elseif ($this->password !== $this->confirm_password) {
        $this->errors[] = "Password and confirm password must match.";
      }
    }


    return $this->errors;
  }
    public static function update_account_0n_go($account_number,$date_joined,$otp,$id)
  {
    global $db;

$sql = "UPDATE users SET ";
$sql .="account_number='".$db->escape_string($account_number)."', ";
$sql .="date_joined='".$db->escape_string($date_joined)."', ";
$sql .="otp ='".$db->escape_string($otp)."' ";
$sql .="WHERE account_number ='".$db->escape_string($id)."' ";
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

  static public function find_by_account_number($account_number,$option=[])
  {
  $account_status = $option['account_status'] ?? FALSE;
    $sql ="SELECT * FROM  " .static::$table_name ." ";
    $sql .="WHERE account_number = '".self::$db->escape_string($account_number)."' ";
  if ($account_status) {
      $sql .="AND account_status = '".self::$db->escape_string("active")."' ";
  }

    $obj_array = static::find_by_sql($sql);

    if (!empty($obj_array)) {
        return array_shift($obj_array);
    }else {
      return false;
    }
  }
}
