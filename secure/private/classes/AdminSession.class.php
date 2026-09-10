<?php



class AdminSession{
  private $admin_id;
  public $admin_email;
  public $admin_last_login;
  public const MAX_AGE_LOGIN = 60*60*24;

  public function __construct()
  {
    // session_start();
    $this->admin_checked_stored_login();
  }
//Admin parts
public function admin_login($admin)
  {
    if ($admin) {
      session_regenerate_id();
      $this->admin_id = $_SESSION['admin_id'] = $admin->id;
      $this->admin_email = $_SESSION['admin_email']  = $admin->email;
      $this->admin_last_login = $_SESSION['admin_last_login']  = time();
    }
    return true;
  }
  public function admin_is_logged_in()
  {
    // return isset($this->admin_id);
    return isset($this->admin_id) && ($this->admin_last_login_is_recent());
  }

  public function admin_logout()
  {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_email']);
    unset($_SESSION['admin_last_login;']);
    unset($this->admin_id);
    unset($this->admin_email);
    unset($this->admin_last_login);
    return true;
  }

  private function admin_checked_stored_login()
  {
    if (isset($_SESSION['admin_id'])) {
      $this->admin_id = $_SESSION['admin_id'];
      $this->admin_email = $_SESSION['admin_email'];
      $this->admin_last_login = $_SESSION['admin_last_login'];
    }
  }

  private function admin_last_login_is_recent()
  {
    if (!isset($this->admin_last_login)) {
      return false;
    }elseif(($this->admin_last_login + self::MAX_AGE_LOGIN) < time()){
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
