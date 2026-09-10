<?php



class Transfer extends DatabaseObject {
  static protected $db_columns = ["id","reciever_bank_name",  "reciever_name",   "reciever_account_number",   "routing_number",  "sender_account_number",   "amount",  "Transfer_description", "otp_code",'otp_2',  "transfer_date",   "transfer_status","ref_numb","credit",  "debit",   "otp_confirmed","account_balance","reciver_email","transfer_type","alert_sent","active","recip_name","recip_nick","recip_add","recip_city","recip_state","recip_zip","recip_country",'cot_code','tax_code','cot_confirmed','tax_confirmed','transaction_type', 'rec_bank_address', 'rec_bank_state', 'rec_bank_country', 'swift_code','currency',"bvt_confirmed", "bvt" ];
  static protected $table_name="transfers";

  public const TRANSFER_STATUS = ['Success','Pending', 'Failed'];
  public const TRANSFER_TYPE = ['Credit','Debit'];

  public const BankTransferTypes = array(
    "Overseas fund transfer",

    "Interbank fund transfer",

    "Intrabank fund transfer"
    // Add more types as needed
);

public const CoinTransferTypes = array(
  "Bitcoin",

  "USDT",

  "ETH",

  "BNB",

  "TRON",
  // Add more types as needed
);
    public $id;
    public $reciever_bank_name;
    public $reciever_name;
    public $reciever_account_number;
    public $routing_number;
    public $sender_account_number;
    public $amount;
    public $Transfer_description;
    public $otp_code;
    public $otp_2;
    public $transfer_date;
    public $transfer_status;
    public $ref_numb;
    public $credit;
    public $debit;
    public $otp_confirmed;
    public $account_balance;
    public $reciver_email;
    public $transfer_type;
    public $alert_sent;
    public $active;
    public $recip_name;
    public $recip_nick;
    public $recip_add;
    public $recip_city;
    public $recip_state;
    public $recip_zip;
    public $recip_country;
    public $cot_code;
    public $tax_code;
    public $cot_confirmed;
    public $tax_confirmed;
    public $transaction_type;
    public $rec_bank_address;
    public $rec_bank_state;
    public $rec_bank_country;
    public $swift_code;
    public $currency;
    public $bvt;
    public $bvt_confirmed;

    public function __construct($args=[]){

      global $logged_user;
      
    $this->reciever_bank_name = $args['reciever_bank_name'] ?? '';
    $this->reciever_name = $args['reciever_name'] ?? '';
    $this->reciever_account_number = $args['reciever_account_number'] ?? "";
    $this->routing_number = $args['routing_number'] ?? '';
    $this->sender_account_number = $args['sender_account_number'] ?? '';
    $this->amount = $args['amount'] ?? '0.00';
    $this->Transfer_description = $args['Transfer_description'] ?? '';
    $this->otp_code = $args['otp_code'] ?? Main::otp_code();
    $this->transfer_date = $args['transfer_date'] ?? date("F j, Y, g:i a") ;
    $this->transfer_status = $args['transfer_status'] ?? "Failed";
    $this->ref_numb = $args['ref_numb'] ?? Main::ref_number();
    $this->credit = $args['credit'] ?? '0.00';
    $this->debit = $args['debit'] ?? '0.00';
    $this->otp_confirmed =  '0';
    $this->cot_confirmed =  '0';
    $this->tax_confirmed =  '0';
    $this->reciver_email = $args['reciver_email'] ?? '';
    $this->transfer_type = $args['transfer_type'] ?? 'Debit';
    $this->alert_sent = $args['alert_sent'] ?? '1';
    $this->active = $args['active'] ?? '1';
    $this->account_balance = $args['account_balance'] ?? '0';
    $this->otp_2  = $args['otp_2'] ?? Main::otp_code();
    $this->cot_code  =  $logged_user->cot;
    $this->tax_code  =  $logged_user->tax_id;    
    $this->recip_name = $args['recip_name'] ?? '';
    $this->recip_nick = $args['recip_nick'] ?? '';
    $this->recip_add = $args['recip_add'] ?? '';
    $this->recip_city = $args['recip_city'] ?? '';
    $this->recip_state = $args['recip_state'] ?? '';
    $this->recip_zip = $args['recip_zip'] ?? '';
    $this->recip_country = $args['recip_country'] ?? '';
    $this->transaction_type = $args['transaction_type'] ?? '';
    $this->rec_bank_address = $args['rec_bank_address'] ?? '';
    $this->rec_bank_state = $args['rec_bank_state'] ?? '';
    $this->rec_bank_country = $args['rec_bank_country'] ?? '';
    $this->swift_code = $args['swift_code'] ?? '';
    $this->currency = $logged_user->currency;
    $this->bvt_confirmed  = $args['bvt_confirmed'] ?? 0;
    $this->bvt  =  $logged_user->bvt;
  }


  static function find_all($option=[]){
    $sql ="SELECT * FROM ".static::$table_name ." ";
    $sql .=" ORDER BY id DESC ";
    return static::find_by_sql($sql) ;
  }

        static public function find_by_account_number_id($ref_numb,$option=[])
  {
    $otp_confirmed = $option['otp_confirmed'] ?? false;
    $sql ="SELECT * FROM  " .static::$table_name ." ";
    $sql .="WHERE ref_numb = '".self::$db->escape_string($ref_numb)."' ";

    // print $sql;
if ($otp_confirmed) {
      $sql .="AND otp_confirmed = 1 ";
  }
      $obj_array = static::find_by_sql($sql);

      if (!empty($obj_array)) {
          return array_shift($obj_array);
      }else {
        return false;
      }
  }

  static function find_by_account_number($account_number,$option=[]){
    global $logged_user;
    $reciever_account_number = $option['reciever_account_number'] ?? $logged_user->full_name;
    $transfer_status = $option['transfer_status'] ?? "Failed";

    $sql ="SELECT * FROM ".static::$table_name ." ";
    // $sql .=" WHERE otp_confirmed = '1' ";

    $sql .=" WHERE (sender_account_number = '".self::$db->escape_string($account_number)."'";

    $sql .=" OR reciever_account_number = '".self::$db->escape_string($account_number)."') ";

    $sql .=" ORDER BY id DESC ";
    // print $sql;
    return static::find_by_sql($sql) ;
  }

    // protected function validate()
    // {
    //   $this->errors = [];
    //   if(Main::is_blank( $this->reciever_bank_name)) {
    //     $this->errors[] = "Reciever's bank Name cannot be blank.";
    //   }elseif(!Main::has_length( $this->reciever_bank_name, ['min' => 1, 'max' => 305])) {
    //     $this->errors[] = "Reciever's bank Name must be between 10 and 300 characters.";
    //   }
    //   if(Main::is_blank( $this->reciever_name)) {
    //     $this->errors[] = "Reciever's Name cannot be blank.";
    //   }elseif(!Main::has_length( $this->reciever_name, ['min' => 1, 'max' => 305])) {
    //     $this->errors[] = "Reciever's Name must be between 10 and 300 characters.";
    //   }

    //   if(Main::is_blank( $this->reciever_account_number)) {
    //     $this->errors[] = "Reciever's Account Number cannot be blank";
    //   }elseif(!Main::has_length( $this->reciever_account_number, ['min' => 9, 'max' => 12])) {
    //     $errors[] = "Reciever's Account Number must be between 10  and 12 Digits.";
    //   }elseif(!is_numeric(($this->reciever_account_number))) {
    //     $errors[] = "Please enter a valid reciever account number.";
    //   }

    //   if(Main::is_blank( $this->sender_account_number)) {
    //     $this->errors[] = "Sender Account Number cannot be blank";
    //   }elseif(!Main::has_length( $this->sender_account_number, ['min' => 9, 'max' => 12])) {
    //     $errors[] = "Sender Account Number must be between 10  and 12 Digits.";
    //   }elseif(!is_numeric(($this->sender_account_number))) {
    //     $errors[] = "Please enter a valid sender account number.";
    //   }
    //   if(Main::is_blank( $this->amount)) {
    //     $this->errors[] = "Amount cannot be blank";
    //   }elseif(!is_numeric(($this->amount))) {
    //     $errors[] = "Please enter a valid amount.";
    //   }
    //   return $this->errors;
    // }
}
