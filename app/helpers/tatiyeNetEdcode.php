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
use wolf05\helper\tatiyeNetBase;
/**
 * LinkTo: Generates a link tag.
 */
class tatiyeNetEdcode {

	public $uid;
    /**
     * Initializes the object and returns an instance holding the HTML code for
     * a link tag.
     *
     * @param mixed $name link target.
     * @param array $options link options.
     * @param callable $block closure that generates the content to be surrounding to.
     */
    public function __construct($options){

        if (is_numeric($options)) {
       
             return tatiyeNet::paramEncrypt($options);
         } else {
         	$this->paramDecrypt($options);
         }
     }
   /*
   |--------------------------------------------------------------------------
   | Initializes base64url_encode 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2020
   | @Date  
   */
   public static function base64url_encode($code){
         return rtrim(strtr(base64_encode($code), '+/', '-_'), '=');
   }
   /* and class base64url_encode */

  

    public static function Encode($string, $passkey = null) {
        if (!isset($passkey) or empty($passkey)):
            $key = (isset($_SERVER['SERVER_NAME']) and !empty($_SERVER['SERVER_NAME'])) ? md5($_SERVER['SERVER_NAME']) : md5(pathinfo(__FILE__, PATHINFO_FILENAME));
        else:
            $key = $passkey;
        endif;
        $result = '';
        for ($i = 0; $i < strlen($string); $i++):
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result.= $char;
        endfor;
        return base64_encode($result);
    }
    
    /**
     * Simple Decode string
     * @param  string $string  String encoded via Recipe::simpleEncode()
     * @param  string $passkey salt for encoding
     * @return string
     */
    public static function Decode($string, $passkey = null) {
        if (!isset($passkey) or empty($passkey)):
            $key = (isset($_SERVER['SERVER_NAME']) and !empty($_SERVER['SERVER_NAME'])) ? md5($_SERVER['SERVER_NAME']) : md5(pathinfo(__FILE__, PATHINFO_FILENAME));
        else:
            $key = $passkey;
        endif;
        $result = '';
        $string = base64_decode($string);
        for ($i = 0; $i < strlen($string); $i++):
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result.= $char;
        endfor;
        return $result;
    }








 
    /*
    |--------------------------------------------------------------------------
    | Initializes paramEncrypt 
    |--------------------------------------------------------------------------
    | Develover Tatiye.Net 2018
    | @Date Min 12 Agu 2018 05:54:05  WITA
    */
    /**
     * @param array  options the display options .
     * @param mixed  Block to generate a customized inside  content.
     */
      public static function paramEncrypt($code) {
         $payload=tatiyeNet::Encode($code);
         $payload=  self::base64url_encode($payload);
          return $payload;
      }


     /* and class paramEncrypt  */
     /*
     |--------------------------------------------------------------------------
     | Initializes paramDecrypt
     |--------------------------------------------------------------------------
     | Develover Tatiye.Net 2018
     | @Date Min 12 Agu 2018 05:55:02  WITA
     */
     /**
      * @param array  options the display options .
      * @param mixed  Block to generate a customized inside  content.
      */
      public static function paramDecrypt($code) {

               $base=base64_decode(str_pad(strtr($code, '-_', '+/'), strlen($code) % 24, '=', STR_PAD_RIGHT));

               return tatiyeNet::Decode($base);
      }
      /* and class paramDecrypt  */





      public static function Encrypt($string) {

             return rtrim(strtr(base64_encode($string), '+/', '-_'), '=');

      }
      public static function Decrypt($code) {
        
          return base64_decode(str_pad(strtr($code, '-_', '+/'), strlen($code) % 24, '=', STR_PAD_RIGHT));


      }
      /* and class paramDecrypt  */




}
