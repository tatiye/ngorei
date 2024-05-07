<?php
  // Load Config
  // Load Helpers
  require_once 'config/config.php';
  
  require_once 'helpers/session_helper.php';
  require_once 'helpers/url_helper.php';
  require_once '../vendor/autoload.php';
  // Autoload Core Classes
  use app\tatiye;
  define('URLROOT', tatiye::urlroot());
  spl_autoload_register(function ($className) {
      require_once 'libraries/'. $className . '.php';
  });
