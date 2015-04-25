<?php
  
  require_once 'lib/ripper/functions/utils.php';
  require_once "lib/spyc.php";
  class Settings
  {

    static $data_app = null;
    static $data_env = null;
    static $data_conn = null;

    public function __construct(){
      $this->load_file();
      $this->load_settings_environment();
      $this->init_connection();
      $this->def_globals();
    }

    private function load_file(){
      self::$data_app = Utils::decode_yaml('../application.yml');
    }

    private function load_settings_environment()
    {
      switch (self::$data_app['globals']['env'])
      {
        case 'test':
          self::$data_env = Utils::decode_yaml('../environments/test.yml');break;
        case 'development':
          self::$data_env =  Utils::decode_yaml('../environments/development.yml');break;
        case 'production':
          self::$data_env = Utils::decode_yaml('../environments/production.yml');break;
      }

    }
    private function init_connection()
    {
      if (self::$data_conn == null)
      {
        self::$data_conn = new mysqli(self::$data_env['database']['host'], self::$data_env['database']['user'], self::$data_env['database']['password'], self::$data_env['database']['name']);
        if (self::$data_conn->connection_errno)
        {
          echo "fallo la conexion";
          return;
        }
        self::$data_conn->set_charset(self::$data_env['database']['charset']);
      }
    }

    private function def_globals(){
      $GLOBALS['base_url'] = self::$data_env['base_url'];
    }

  }
  new Settings();
?>