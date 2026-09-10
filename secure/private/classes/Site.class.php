<?php



class Site extends DatabaseObject {
  static protected $db_columns = ["id",  "site_name", "phone", "email_address", "bank_address","site_currecncy"];

  static protected $table_name="site_settings";

public $id;
public $site_name;
public $phone;
public $email_address;
public $bank_address;
public $site_currecncy;


    public function __construct($args=[]){
      $this->site_name = $args['site_name'] ?? '';
      $this->bank_address = $args['bank_address'] ?? '';
      $this->phone = $args['phone'] ?? '';
      $this->email_address = $args['email_address'] ?? '';
      $this->site_currecncy = $args['site_currecncy'] ?? '';
    }

    protected function validate()
    {
      $this->errors = [];
      if(Main::is_blank( $this->site_name)) {
        $this->errors[] = "Site Name cannot be blank.";
      }elseif(!Main::has_length( $this->site_name, ['min' => 1, 'max' => 305])) {
        $this->errors[] = "Site Name must be between 2 and 300 characters.";
      }
      // if(Main::is_blank( $this->bank_address)) {
      //   $this->errors[] = "Bank Address cannot be blank.";
      // }elseif(!Main::has_length( $this->bank_address, ['min' => 1, 'max' => 305])) {
      //   $this->errors[] = "Bank Address must be between 10 and 300 characters.";
      // }
      // if(Main::is_blank( $this->phone)) {
      //   $this->errors[] = "Bank phone cannot be blank.";
      // }elseif(!Main::has_length( $this->phone, ['min' => 1, 'max' => 305])) {
      //   $this->errors[] = "Bank phone must be between 10 and 300 characters.";
      // }
      // if(Main::is_blank( $this->email_address)) {
      //   $this->errors[] = "Email cannot be blank.";
      // }elseif(!Main::has_length( $this->email_address, ['min' => 1, 'max' => 305])) {
      //   $this->errors[] = "Email must be between 10 and 300 characters.";
      // }
      // if(Main::is_blank( $this->site_currecncy)) {
      //   $this->errors[] = "Site Currency cannot be blank.";
      // }
      return $this->errors;
    }
}
