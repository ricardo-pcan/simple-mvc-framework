<?php
  
  require_once "utils.php";
  session_start();
  $_SESSION = array();
  session_destroy();
  Utils::routeTo("../index.php");
?>