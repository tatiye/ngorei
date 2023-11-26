<?php
/**
 * TatiyeNet - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2018-2021 wolf05 <info@tatiye.net / https://www.facebook.com/tatiyeNet/>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace wolf05\system;
use wolf05\helper\tatiyeNet;
use wolf05\system\tatiyeNetRequest;
use wolf05\template\theme\models\Controller;
use wolf05\system\tatiyeNetInit  as Key;


class tatiyeNetCore  {
    /*
    |--------------------------------------------------------------------------
    | Initializes php_vesion 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date  
    */
    public static function php_vesion(){
        if (substr(PHP_VERSION,0,3) > Controller::config('php_vesion')) {
            header('Location:'.tatiyeNet::URL('config'));
        } else {
            return '';
        }

    }

/*
|--------------------------------------------------------------------------
| Initializes tatiyeNetCore 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date Sab 12 Mar 2022 11:29:54  WITA
*/
 /*
 |--------------------------------------------------------------------------
 | Initializes path 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2021
 | @Date Sab 12 Mar 2022 11:32:05  WITA 
 */
 public static function path($Exp,$dir){
     return Key::Indestruct($Exp,$dir);
 }
 /* and class path */ 
 /*
 |--------------------------------------------------------------------------
 | Initializes opendir 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2021
 | @Date  
 */
public static function opendir($dir){
   $arryID = array();
    if(is_dir($dir))
    {
        if($handle = opendir($dir)){
            while(($file = readdir($handle)) != false){
            if($file!='.' && $file!='..')   {  
              $arryID[]=$file; 
            } 

            }
            closedir($handle);
        }
    }

    $value = isset($arryID) ? $arryID : '';
    array_push($red1,$value);
    return $red1;
}
 /* and class opendir */
 /*
 |--------------------------------------------------------------------------
 | Initializes file 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2021
 | @Date  
 */
 public static function folder($Exp,$dir){
      $ID=explode('/',$Exp);
      $str='';
      foreach ($ID as $key => $value) {
           if ($key==0){} else {
              $str = $str .$value . '/'; 
           }
      }
       $str = substr($str, 0, -1);
 

       if($dir == 'URL') {

            return self::path($ID[0],$dir).$str;

       } elseif ($dir == 'etc'){

           return self::path($ID[0],'dir').$str;

       }
    
     // return ;
 }
 /* and class file */

public static function opendirFolder($dir){
   $red1 = array();
    if(is_dir($dir))
    {
        if($handle = opendir($dir)){
            while(($file = readdir($handle)) != false){
            if($file!='.' 
                && $file!='..'
                && $file!='tatiyeNet_.php'
                && $file!='tatiyeNet.php'
                && $file!='index.php')   {  
              $arryID[]=$file; 
            } 

            }
            closedir($handle);
        }
    }

    $value = isset($arryID) ? $arryID : '';
    array_push($red1,$value);
    return $red1;
}
 /* and class opendir */



 /*
 |--------------------------------------------------------------------------
 | Initializes file 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2021
 | @Date  
 */
 public static function file($Exp,$dir){
      $ID=explode('/',$Exp);
      $str='';
      foreach ($ID as $key => $value) {
           if ($key==0){} else {
             $str = $str .$value . '/'; 
           }
      }
       $str = substr($str, 0, -1);
      if (!empty(tatiyeNet::eksfile($str))) {
           $eksfile=$str;
      } else {
           $eksfile=$str.'.php';
      }

       if($dir == 'URL') {

            return self::path($ID[0],$dir).$eksfile;

       } elseif ($dir == 'etc'){

           return self::path($ID[0],'dir').$eksfile;

       } else {

          if (file_exists(self::path($ID[0],$dir).$eksfile)) {

             require_once(self::path($ID[0],$dir).$eksfile);

          } else {

             return 'Directory access is forbidden.';
          }
          
       }
    
     // return ;
 }
 /* and class file */

   
/*
|--------------------------------------------------------------------------
| AND tatiyeNetCore 
|--------------------------------------------------------------------------
*/

}