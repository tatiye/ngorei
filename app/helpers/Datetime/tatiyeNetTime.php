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
class tatiyeNetTime  {
    public $expn;
    public  function __construct($expn='') {
    }

    /*
    |--------------------------------------------------------------------------
    | Initializes init 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2022
    | @Date  
    */
    public static function init($key,$data=''){
          return self::$key($data);
        
    }
    /* and class init */


    /*
    |--------------------------------------------------------------------------
    | Initializes Time 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
    public static function Time(){ 
          return time();
    }
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
    | Initializes zone 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date Kam 11 Nov 2021 01:19:38  WITA 
    */
    public static function zona(){
         date_default_timezone_set(TIMEZONE);
          return date("h:i:sa");
    }
    /*
    |--------------------------------------------------------------------------
    | Initializes TimeSet 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2021
    | @Date  
    */
    public static function TimeSet($Exp){
           return date($Exp);
        // return ;
    }
    /* and class TimeSet */


}