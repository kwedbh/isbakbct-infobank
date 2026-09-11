<?php



  class Main{

    static public function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
    // return WWW_ROOT ."/secure". $script_path;

  return WWW_ROOT ."/isbakbct-infobank". $script_path;
  }

  static public function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

  static public function is_get_request()
{
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

  static public function redirect_to($location)
    {
    header("Location: " . $location);
    exit;
    }

  static public function h($string){
  return htmlspecialchars($string);
  }
  static public function u($string)
  {
    return urlencode($string);
  }
  static public function r($string)
  {
    return rawurlencode($string);
  }

  static public function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class='alert alert-danger'>";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . Main::h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

static public function display_session_message()
{
  global $session;
  $msg = $session->message();
  if (isset($msg) && !empty($msg)) {
    $session->clear_message();
    return '<div class="alert alert-warning" role="alert">'
    .Main::h($msg). '</div>';
  }
}

  // Call require_login() at the top of any page which needs to
  // require a valid login before granting acccess to the page.
  static public function require_login() {
    global $session;
    if(!$session->is_logged_in()) {
      Main::redirect_to(Main::url_for('/'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }

    // Call require_login() at the top of any page which needs to
  // require a valid login before granting acccess to the page.
  static public function require_login_admin() {
    global $admin_session;
    if(!$admin_session->admin_is_logged_in()) {
      Main::redirect_to(Main::url_for('/bankadmin/login.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }

    static public function require_pin() {
    global $logged_user;
    if(!isset($_SESSION['account_pin'])) {
      Main::redirect_to(Main::url_for("/banking/auth/signin/pin"));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }

  // is_blank('abcd')
  // * validate data presence
  // * uses trim() so empty spaces don't count
  // * uses === to avoid false positives
  // * better than empty() which considers "0" to be empty
  static public function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }

  // has_presence('abcd')
  // * validate data presence
  // * reverse of is_blank()
  // * I prefer validation names with "has_"
  static public function has_presence($value) {
    return !is_blank($value);
  }

  // has_length_greater_than('abcd', 3)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  static public function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }

  // has_length_less_than('abcd', 5)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  static public function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }

  // has_length_exactly('abcd', 4)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  static public function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  // * validate string length
  // * combines functions_greater_than, _less_than, _exactly
  // * spaces count towards length
  // * use trim() if spaces should not count
  static public function has_length($value, $options) {
    if(isset($options['min']) && !Main::has_length_greater_than($value, $options['min'])) {
      return false;
    } elseif(isset($options['max']) && !Main::has_length_less_than($value, $options['max'])) {
      return false;
    } elseif(isset($options['exact']) && !Main::has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_inclusion_of( 5, [1,3,5,7,9] )
  // * validate inclusion in a set
  static public function has_inclusion_of($value, $set) {
  	return in_array($value, $set);
  }

  // has_exclusion_of( 5, [1,3,5,7,9] )
  // * validate exclusion from a set
  static public function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
  }

  // has_string('nobody@nowhere.com', '.com')
  // * validate inclusion of character(s)
  // * strpos returns string start position or false
  // * uses !== to prevent position 0 from being considered false
  // * strpos is faster than preg_match()
  static public function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

  // has_valid_email_format('nobody@nowhere.com')
  // * validate correct format for email addresses
  // * format: [chars]@[chars].[2+ letters]
  // * preg_match is helpful, uses a regular expression
  //    returns 1 for a match, 0 for no match
  //    http://php.net/manual/en/function.preg-match.php
  static public function has_valid_email_format($value) {
    // $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    $email_regex = '/^[\w.%+\-]+@[\w.\-]+\.([A-Za-z]{2}|aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|xxx)$/';

    return preg_match($email_regex, $value) === 1;
  }
  static public function has_valid_username($value) {
    // $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    $username_regex = '/^[a-z\d_]{5,20}$/i';

    return preg_match($username_regex, $value) === 1;
  }

  // has_unique_page_menu_name('History')
  // * Validates uniqueness of pages.menu_name
  // * For new records, provide only the menu_name.
  // * For existing records, provide current ID as second arugment
  //   has_unique_page_menu_name('History', 4)
  static public function has_unique_topic_name($name, $current_id="0") {
    global $db;

    $sql = "SELECT * FROM news ";
    $sql .= "WHERE name='" . $db->escape_string($name) . "' ";
    $sql .= "AND id != '" . $db->escape_string($current_id) . "'";
    // echo $sql;

    $category_set = Main::mq($db, $sql);
    $category_count = mysqli_num_rows($category_set);
    mysqli_free_result($category_set);

    return $category_count === 0;
  }

  static public function has_unique_admin_username($username, $current_admin_id="0") {
    $admin = Admin::find_by_username($username);
    if ($admin === false || $admin->id == $current_admin_id) {
      return true;
    }else {
      return false;
    }
  }
    static public function account_number() {
    # prevent the first number from being 0
    $output = rand(1,9);

    for($i=0; $i<9; $i++) {
      $output .= rand(0,9);
    }

    return $output;
  }
    static public function otp_code() {
    # prevent the first number from being 0
    $output = rand(1,9);

    for($i=0; $i<3; $i++) {
      $output .= rand(0,9);
    }

    return $output;
  }
      static public function ref_number() {
    # prevent the first number from being 0
    $output = rand(1,9);

    for($i=0; $i<10; $i++) {
      $output .= rand(0,9);
    }

    return $output;
  }
        static public function route_number() {
    # prevent the first number from being 0
    $output = rand(1,9);

    for($i=0; $i<10; $i++) {
      $output .= rand(0,9);
    }

    return $output;
  }


  static public function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  static public function bigNumber() {
    # prevent the first number from being 0
    $output = rand(1,9);

    for($i=0; $i<60; $i++) {
      $output .= rand(0,9);
    }

    return $output;
  }

  public static function random_number($length = 4) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return strtolower($randomString);
}

}
