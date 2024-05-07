<?php
use app\tatiye;
echo''.PHP_EOL;
echo'require_once __DIR__."/protocol.php";'.PHP_EOL;
echo'define("TIMEZONE","Asia/Makassar");'.PHP_EOL;
echo'define("APPROOT"    ,dirname(dirname(__FILE__))); '.PHP_EOL; 
echo'define("URLROOT"    ,$HOST);'.PHP_EOL;
echo'define("HOST"       ,"'.$_POST['urlroot'].'");'.PHP_EOL;
echo'define("ROUTE"      ,"/");'.PHP_EOL;
