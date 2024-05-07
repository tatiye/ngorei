<?php
use app\tatiye;
echo''.PHP_EOL;
echo'//APP'.PHP_EOL;
echo'require_once "config/config.php";'.PHP_EOL;
echo'require_once "helpers/session_helper.php";'.PHP_EOL;
echo'require_once "helpers/url_helper.php";'.PHP_EOL;
echo'require_once "../vendor/autoload.php";'.PHP_EOL;
echo'// use app\tatiye;'.PHP_EOL;
echo'// define("URLROOT", tatiye::urlroot());'.PHP_EOL;
echo'spl_autoload_register(function ($className) {'.PHP_EOL;
echo'    require_once "libraries/". $className . ".php";'.PHP_EOL;
echo'});'.PHP_EOL;
