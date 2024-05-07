<?php
namespace app\config;
class license {
 /*
 |--------------------------------------------------------------------------
 | Initializes config 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date Selasa 07 Mei 2024, 10:13:27 AM 
 */
 public static function framework($key){
       $license=array(
          "VENDOR"      =>"",
          "APP_KEY"      =>"",
          "APP_SECRET"   =>"",
        ); 
        return $license[$key]; 
 }
 /* and class config */
 /*
 |--------------------------------------------------------------------------
 | Initializes user Package Lisensi 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2022
 | @Date Selasa 07 Mei 2024, 10:13:27 AM 
 */
 public static function package(){
       return true;
 }
 /* and class packageLisensi */
}
