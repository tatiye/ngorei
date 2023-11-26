<?php
/**
 * TatiyeNet - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2018 wolf05 <info@tatiye.net / https://www.facebook.com/tatiyeNet/>.
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
namespace app\Datetime;
use app\tatiye;
/**
 * Generates an HTML block tag that follows the Bootstrap documentation
 * on how to display  component.
 *
 * See {@link https://tatiye.net/} for more information.
 */
class tatiyeNetDate  {
    public $expn;
    public  function __construct($expn='') {
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes init 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date 2023-08-25 22:18:27 
    */
    public static function init($key){
          return self::$key();
        
    }
    /* and class init */


    /*
    |--------------------------------------------------------------------------
    | Initializes c 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date  
    */
    public static function c(){
           return date("c", time());
    }
    /* and class c */
     /*
    |--------------------------------------------------------------------------
    | Initializes IN 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function IN($expn=''){
           return date("d/m/Y");
     }
    /*
    |--------------------------------------------------------------------------
    | Initializes EN 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function EN($expn=''){
       return date("Y/m/d");
       
     }
    /*
    |--------------------------------------------------------------------------
    | Initializes starENend_ 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function D(){
            return date("d");
     }
    /*
    |--------------------------------------------------------------------------
    | Initializes M 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function M(){
          return date("m");
     }
    /*
    |--------------------------------------------------------------------------
    | Initializes M 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function Y(){
          return date("Y");
     }
    /*
    |--------------------------------------------------------------------------
    | Initializes IN_hari 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function INDay(){
          $INhari=date('w');
          switch ($INhari) { 
            case '0':{$INhari='Minggu';}break;
            case '1':{$INhari='Senin'; }break;
            case '2':{$INhari='Selasa';}break;
            case '3':{$INhari='Rabu';  }break;
            case '4':{$INhari='Kamis'; }break;
            case '5':{$INhari='Jumat'; }break;
            case '6':{$INhari='Sabtu'; }break;
          }
          return $INhari;
     }
    /*
    |--------------------------------------------------------------------------
    | Initializes EN_hari 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function ENDay(){
         $EN=date('w');
          switch ($EN) { 
            case '0':{$EN='Sun';}break;
            case '1':{$EN='Mon';}break;
            case '2':{$EN='Tue';}break;
            case '3':{$EN='Wed';}break;
            case '4':{$EN='Thu';}break;
            case '5':{$EN='Fri';}break;
            case '6':{$EN='Sat';}break;
          }
          return $EN;
     }
      /*
    |--------------------------------------------------------------------------
    | Initializes IN_bulan 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function INMonth(){
           $BlnIN=date("m");
           switch ($BlnIN) { 
            case '01':{$BlnIN='Januari'; }break;
            case '02':{$BlnIN='Februari';}break;
            case '03':{$BlnIN='Maret';  }break;
            case '04':{$BlnIN='April'; }break;
            case '05':{$BlnIN='Mei'; }break;
            case '06':{$BlnIN='Juni'; }break;
            case '07':{$BlnIN='Juli'; }break;
            case '08':{$BlnIN='Agustus'; }break;
            case '09':{$BlnIN='September'; }break;
            case '10':{$BlnIN='Oktober'; }break;
            case '11':{$BlnIN='November'; }break;
            case '12':{$BlnIN='Desember'; }break;
          }
          return $BlnIN;
     }    
      /*
    |--------------------------------------------------------------------------
    | Initializes EN_bulan 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function ENMonth(){
           $BlnEN=date("m");
           switch ($BlnEN) { 
                case '01':{$BlnEN='January'; }break;
                case '02':{$BlnEN='February';}break;
                case '03':{$BlnEN='March'; }break;
                case '04':{$BlnEN='April'; }break;
                case '05':{$BlnEN='May'; }break;
                case '06':{$BlnEN='June'; }break;
                case '07':{$BlnEN='July'; }break;
                case '08':{$BlnEN='August'; }break;
                case '09':{$BlnEN='September'; }break;
                case '10':{$BlnEN='October'; }break;
                case '11':{$BlnEN='November'; }break;
                case '12':{$BlnEN='Desember'; }break;
          }
          return $BlnEN;
     }  
    /*
    |--------------------------------------------------------------------------
    | Initializes Date_IN 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
     public static function DIN(){
          return date('d').' '.self::INMonth().' '.date('Y');
     }
    /*
    |--------------------------------------------------------------------------
    | Initializes Date_EN
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function DEN(){
         return date('d').' '.self::ENMonth().' '.date('Y');
     }


    /*
    |--------------------------------------------------------------------------
    | Initializes Date_day_IN 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function DDIN(){
         return self::INDay().', '.date('d').' '.self::INMonth().' '.date('Y');
     }
    
    /*
    |--------------------------------------------------------------------------
    | Initializes Date_day_EN 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function DDEN(){
          date_default_timezone_set(TIMEZONE);
       return self::ENDay().', '. date('d').' '.self::ENMonth().' '.date('Y').', '.date('H:i:a');
     }

    /*
    |--------------------------------------------------------------------------
    | Initializes Date_time_IN 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function DTIN(){
          date_default_timezone_set(TIMEZONE);
       return date('d').' '.self::INMonth().' '.date('Y').', '.date('H:i:a');
     }
    
    /*
    |--------------------------------------------------------------------------
    | Initializes Date_time_IN 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function DTEN(){
          date_default_timezone_set(TIMEZONE);
       return date('d').' '.self::ENMonth().' '.date('Y').', '.date('H:i:a');
     }

    /*
    |--------------------------------------------------------------------------
    | Initializes Date_time_IN 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function DTIE(){
          date_default_timezone_set(TIMEZONE);
        return self::INDay().' '.date('d').' '.self::INMonth().' '.date('Y').', '.date('h:i:s A');
     }
    
    /*
    |--------------------------------------------------------------------------
    | Initializes Date_time_IN 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function TEN(){
        return date("d-M-y");
     }
    
    /*
    |--------------------------------------------------------------------------
    | Initializes Date_time_IN 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
       public static function DINX(){
          date_default_timezone_set(TIMEZONE);
         return self::INMonth().', '.date('d');
     }

}