<?php



class Session{
  private $user_id;
  public $account_number;
  public $last_login;
  public $pin;
  public const MAX_AGE_LOGIN = 60*60*24;

  // public const MAX_AGE_LOGIN = 60 * 60; // 60 seconds per minute, multiplied by 15 minutes


  public function __construct()
  {
    session_start();
    $this->checked_stored_login();
  }

  public function login($user)
  {
    if ($user) {
      session_regenerate_id();
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->account_number = $_SESSION['account_number']  = $user->account_number;
      $this->last_login = $_SESSION['last_login']  = time();
    }
    return true;
  }
  public function is_logged_in()
  {
    // return isset($this->admin_id);
    return isset($this->user_id) && ($this->last_login_is_recent());
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['account_number']);
    unset($_SESSION['last_login']);
    unset($this->user_id);
    unset($this->account_number);
    unset($this->last_login);
    return true;
  }

  private function checked_stored_login()
  {
    if (isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->account_number = $_SESSION['account_number'];
      $this->last_login = $_SESSION['last_login'];
    }
  }

  private function last_login_is_recent()
  {
    if (!isset($this->last_login)) {
      return false;
    }elseif(($this->last_login + self::MAX_AGE_LOGIN) < time()){
      return false;
    }else {
      return true;
    }
  }

  public function message($msg="")
  {
    if (!empty($msg)) {
      $_SESSION['message'] = $msg;
      return true;
    }else {
      return $_SESSION['message'] ?? '';
    }
  }

  public function clear_message()
  {
    unset($_SESSION['message']);
  }
}
