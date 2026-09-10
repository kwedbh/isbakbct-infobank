<?php



// Database Settings
  class Db_Credentials{
    protected const DB_SERVER = ('localhost');
    //  protected const DB_USER = ('root');
    //  protected const DB_PASS = ('');
    //  protected const DB_NAME = ('fargo_bk');

    protected const DB_USER = ('infoakbonl_akb');
    protected const DB_PASS = ('Fakepassword123');
    protected const DB_NAME = ('infoakbonl_akb');

    static public function set_locahost()
    {
      return self::DB_SERVER;
    }

    static public function set_username()
    {
      return self::DB_USER;
    }

    static public function set_password()
    {
      return self::DB_PASS;
    }

    static public function set_Dbname()
    {
      return self::DB_NAME;
    }

  }
