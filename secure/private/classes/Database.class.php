<?php



//Connecting the database
  class Database{
  public static function db_connect() {
    $connection = new mysqli(Db_Credentials::set_locahost(),
    Db_Credentials::set_username(), Db_Credentials::set_password(),
    Db_Credentials::set_Dbname());
    self::confirm_db_connect($connection);
    return $connection;
  }

  // confirm Database Connection
  public static function confirm_db_connect($connection) {
    if($connection->connect_errno) {
      $msg = "Database connection failed: ";
      $msg .= $connection->connect_error;
      $msg .= " (" . $connection->connect_errno . ")";
      exit($msg);
    }
  }

  // disconnect from database
  public static function db_disconnect($connection) {
    if(isset($connection)) {
      $connection->close();
    }
  }
}
