<?php
  require_once "../../spyc.php";
  require_once "utils.php";
  
  $data = Utils::decode_yaml('../../../config/database.yml');


  class Connection
  {

    static $_db = null;
    
    public function __construct()
    {
      
    }

    private static function connect()
    {
      self::$_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      if (self::$_db->connection_errno)
      {
        echo "fallo la conexion";
        return;
      }
      self::$_db->set_charset(DB_CHARSET);
    }

    public static function getConnection()
    {
      if(self::$_db == null)
      {
        self::connect();
      }
      return self::$_db;
    }

  }
  
?>