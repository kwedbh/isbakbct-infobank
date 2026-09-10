<?php



class Admin extends DatabaseObject
{
  static protected $db_columns = ["id",  "first_name",  "last_name", "email", "hashed_password"];
  static protected $table_name="admin";

   public   $id;
   public   $first_name;
   public   $last_name;
   public   $email;
   public   $hashed_password;
   public   $password;
   public   $confirm_password;
   protected $password_required = true;

    public function __construct($args=[]){
    $this->first_name = $args['first_name'] ?? '';
    $this->last_name = $args['last_name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
  }

  public function full_name()
  {
    return $this->first_name ." ".$this->last_name;
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

  // validate method for Admin class

  // protected function validate() {
  //   $this->errors = [];

  //   if(Main::is_blank($this->first_name)) {
  //     $this->errors[] = "First name cannot be blank.";
  //   } elseif (!Main::has_length($this->first_name, array('min' => 2, 'max' => 255))) {
  //     $this->errors[] = "First name must be between 2 and 255 characters.";
  //   }
  //   if(Main::is_blank($this->last_name)) {
  //     $this->errors[] = "Last name cannot be blank.";
  //   } elseif (!Main::has_length($this->last_name, array('min' => 2, 'max' => 255))) {
  //     $this->errors[] = "Last name must be between 2 and 255 characters.";
  //   }

  //   if(Main::is_blank($this->email)) {
  //     $this->errors[] = "Email cannot be blank.";
  //   } elseif (!Main::has_length($this->email, array('max' => 255))) {
  //     $this->errors[] = "Last name must be less than 255 characters.";
  //   } elseif (!Main::has_valid_email_format($this->email)) {
  //     $this->errors[] = "Email must be a valid format.";
  //   }
  //   if ($this->password_required) {
  //     if(Main::is_blank($this->password)) {
  //       $this->errors[] = "Password cannot be blank.";
  //     } elseif (!Main::has_length($this->password, array('min' => 8))) {
  //       $this->errors[] = "Password must contain 8 or more characters";
  //     } elseif (!preg_match('/[A-Z]/', $this->password)) {
  //       $this->errors[] = "Password must contain at least 1 uppercase letter";
  //     } elseif (!preg_match('/[a-z]/', $this->password)) {
  //       $this->errors[] = "Password must contain at least 1 lowercase letter";
  //     } elseif (!preg_match('/[0-9]/', $this->password)) {
  //       $this->errors[] = "Password must contain at least 1 number";
  //     } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
  //       // $this->errors[] = "Password must contain at least 1 symbol";
  //     }

  //     if(Main::is_blank($this->confirm_password)) {
  //       $this->errors[] = "Confirm password cannot be blank.";
  //     } elseif ($this->password !== $this->confirm_password) {
  //       $this->errors[] = "Password and confirm password must match.";
  //     }
  //   }


  //   return $this->errors;
  // }

  static public function find_by_email($email)
  {
    $visible = $option['visible'] ?? false;
    $sql ="SELECT * FROM  " .static::$table_name ." ";
    $sql .="WHERE email = '".self::$db->escape_string($email)."' ";
      $obj_array = static::find_by_sql($sql);

      if (!empty($obj_array)) {
          return array_shift($obj_array);
      }else {
        return false;
      }
  }
}
