<?php 
  class Utils
  {
    public static function routeTo($view)
    {
      echo "<script> location.href = '$view' </script>";
    }

    public static function queryToJson($query_result)
    {
      echo '{ "data": ' . json_encode($query_result) . '}';
    }

    public static function renderThis($field)
    {
      if( $field != null)
      {
        return $field;
      }
    }

    public static function decode_yaml($yaml_file)
    {
      return Spyc::YAMLLoad($yaml_file);
    }
  }
?>