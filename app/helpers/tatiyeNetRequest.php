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
namespace app;
use app\tatiye;
use app\tatiyeNetProtokol;

class tatiyeNetRequest  {
   /*
   |--------------------------------------------------------------------------
   | Initializes RequestException 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Rab 09 Mar 2022 04:42:10  WITA 
   */
   public static function Req(){

      if(self::expanReq() == '1') {

          return self::RequOne();

      } elseif (self::expanReq() == '2'){

         return self::RequTwo();

      } else {
        return self::RequThree();

      }

       // return self::::explode(2,1);
   }
   /* and class RequestException */
   /*
   |--------------------------------------------------------------------------
   | Initializes RequSet 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2021
   | @Date  
   */
   public static function RequSet($Exp,$dir){
       return self::srvlode(self::srv_request($Exp),$dir);
   }
   /* and class RequSet */
 /*
   |--------------------------------------------------------------------------
   | Initializes RequSet 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2021
   | @Date  
   */
   public static function Requruting($Exp,$dir){
          $zero=explode('/',self::RequAll());
       return self::srv_request(0,$dir);
   }
   /* and class RequSet */


  /*
    |--------------------------------------------------------------------------
    | Initializes explode 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 11:03:09  WITA 
    */
    public static function explode($Exp,$dir){

      if (!empty(self::RequAll())) {
           $CEK =self::stristrText(['/'],self::RequAll());
           @$ID=explode($CEK,self::RequAll());
           $srvlode= self::srvlode(self::RequAll(),$Exp);
           if (!empty($ID[$Exp])) {
              if (!empty($dir)) {
                  if (!empty($srvlode)) {
                      return $srvlode.'/'.$ID[$dir];
                  } else {
                     return $ID[$dir];
                  }
                  
                  
              } else {
                 return $srvlode;
              }
           } else {
              return '';
           }
           
      }
        
    }
    /* and class explode */

/*
|--------------------------------------------------------------------------
| Initializes stristrText 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date Kam 11 Nov 2021 11:25:01  WITA 
*/
public static function stristrText($H1,$teks,$H2=''){
    if (!empty($H1)) {
     $stristrText = $H1;
     $hasil =$H2;
     $jml_kata = count($stristrText);
     for ($i=0;$i<$jml_kata;$i++){
      if (stristr($teks,$stristrText[$i]))
        { 
          $hasil=$stristrText[$i]; 
        }
     }
    
      return $hasil;
     } else {
      return '';
     }
    }



   /*
   |--------------------------------------------------------------------------
   | Initializes RequAll 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2021
   | @Date  
   */
   public static function RequAll(){
        if (!empty($_GET['tn'])) {
          return $_GET['tn'];
       } else {
          return '';
       }
   }
   /* and class RequAll */
   
   /*
   |--------------------------------------------------------------------------
   | Initializes RequOne 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2021
   | @Date  Kam 10 Mar 2022 03:48:36  WITA
   */
   public static function RequOne(){
      if (!empty($_GET['tn'])) {
          $ID=explode('/',$_GET['tn']);
          return $ID[0];
       } else {
          return 'default';
       }
   }
   /* and class RequOne */
   /*
   |--------------------------------------------------------------------------
   | Initializes RequTwo 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2021
   | @Date  Kam 10 Mar 2022 03:48:39  WITA
   */
   public static function RequTwo(){
      if (!empty($_GET['tn'])) {
          $ID=explode('/',$_GET['tn']);
          return $ID[0].'/'.$ID[1];
       } else {
          return 'default';
       }
   }
   /* and class RequTwo */
   /*
   |--------------------------------------------------------------------------
   | Initializes RequThree 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2021
   | @Date  Kam 10 Mar 2022 03:48:39  WITA
   */
   public static function RequThree(){
      if (!empty($_GET['tn'])) {
          return $_GET['tn'];
       } else {
          return 'default';
       }
   }
   /* and class RequThree */


   /*
   |--------------------------------------------------------------------------
   | Initializes expanReq 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2021
   | @Date  
   */
   public static function expanReq(){
      if (!empty($_GET['tn'])) {
       $expanReq = explode("/", $_GET['tn']);
        return count($expanReq);
      } else {
         return 1;
      }
       // return ;
   }
   /*
   |--------------------------------------------------------------------------
   | Initializes expanReqSum 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function expanReqGet(){
      if (!empty($_GET['tn'])) {
       $expanReq = explode("/", $_GET['tn']);
        return count($expanReq)-1;
      } else {
         return 1;
      }
       
   }
   /* and class expanReqSum */

  /*
  |--------------------------------------------------------------------------
  | Initializes srv_segment 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date Rab 10 Nov 2021 07:42:46  WITA 
  */
   public static function srv_request($row){
   $Exp=explode('/',$_GET['tn']);
   $str = "";
    foreach ($Exp as $key => $value) {
        if ($key > $row) {
             $str = $str . $value."/";
        } 
    }
    $str = substr($str, 0, -1);
    return $str;
   }
  /*
  |--------------------------------------------------------------------------
  | Initializes srv_segment 
  |--------------------------------------------------------------------------
  | Develover Tatiye.Net 2021
  | @Date Rab 10 Nov 2021 07:42:46  WITA 
  */
   public static function srvlode($row,$set){
   $Exp=explode('/',$row);
   $str = "";
    foreach ($Exp as $key => $value) {
        if ($key < $set) {
             $str = $str . $value."/";
        } 
    }
    $str = substr($str, 0, -1);
    return $str;
   }





   /* and class expanReq */
}

