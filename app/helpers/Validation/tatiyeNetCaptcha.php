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
namespace wolf05\helper\Validation;
use wolf05\helper\tatiyeNet;

class tatiyeNetCaptcha 
{
    protected static $instance;  
  
  private $dekode;
  private $driver;
  private $driverbody;
  private $data = array();
  
    private function __construct() { /* ... @return DB */ }
    private function __clone() { /* ... @return DB */ }
    private function __wakeup() { /* ... @return DB */ }
  
  public function __destruct(){
    
  } 
    
    
   /*
   |--------------------------------------------------------------------------
   | Initializes Db 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date Kam 24 Mar 2022 12:16:50  WITA 
   */
    public static function init($code='',$body='') {    
        if ( !isset(self::$instance) ) 
        {
            $class = __CLASS__;
            self::$instance = new $class();
        }
     // $this->driver=$code;
        self::$instance->driver =  $code;
        self::$instance->driverbody =  $body;
     return self::$instance;
  }
   /* and class Db */
   /*
   |--------------------------------------------------------------------------
   | Initializes input 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public  function input(){
    session_start();
    $num1 = rand(3,7);
    $num2 = rand(2,6);
    $num3 = rand(0,4);
    $_SESSION['code'] = ($num1 + $num2) - $num3;
    // Create image
    return '('.$num1.'+'.$num2.')-'.$num3.'=';

   }
   /* and class input */
 
  
}