<?php 
use app\tatiye;
echo''.PHP_EOL;
echo'namespace app\config;'.PHP_EOL;
echo'class license {'.PHP_EOL;
echo' /*'.PHP_EOL;
echo' |--------------------------------------------------------------------------'.PHP_EOL;
echo' | Initializes config '.PHP_EOL;
echo' |--------------------------------------------------------------------------'.PHP_EOL;
echo' | Develover Tatiye.Net 2022'.PHP_EOL;
echo' | @Date '.tatiye::dt('DTIE').' '.PHP_EOL;
echo' */'.PHP_EOL;
echo' public static function framework($key){'.PHP_EOL;
echo'       $license=array('.PHP_EOL;
echo'          "VENDOR"      =>"'.$_POST["vendor"].'",'.PHP_EOL;
echo'          "APP_KEY"      =>"'.$_POST["key"].'",'.PHP_EOL;
echo'          "APP_SECRET"   =>"'.$_POST["secret"].'",'.PHP_EOL;
echo'          "ACCESS_TOKEN" =>"'.$_POST["token"].'",'.PHP_EOL;
echo'        ); '.PHP_EOL;
echo'        return $license[$key]; '.PHP_EOL;
echo' }'.PHP_EOL;
echo' /* and class config */'.PHP_EOL;
echo' /*'.PHP_EOL;
echo' |--------------------------------------------------------------------------'.PHP_EOL;
echo' | Initializes user Package Lisensi '.PHP_EOL;
echo' |--------------------------------------------------------------------------'.PHP_EOL;
echo' | Develover Tatiye.Net 2022'.PHP_EOL;
echo' | @Date '.tatiye::dt('DTIE').' '.PHP_EOL;
echo' */'.PHP_EOL;
echo' public static function package(){'.PHP_EOL;
echo'       return true;'.PHP_EOL;     
echo' }'.PHP_EOL;
echo' /* and class packageLisensi */'.PHP_EOL;
echo'}'.PHP_EOL;
