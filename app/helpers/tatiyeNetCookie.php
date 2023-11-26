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
namespace app;
use app\tatiye;
use app\tatiyeNetRequest;
/**
 * Generates an HTML block tag that follows the Bootstrap documentation
 * on how to display  component.
 *
 * See {@link https://tatiye.net/} for more information.
 */

  class tatiyeNetCookie {

  	/*
  	|--------------------------------------------------------------------------
  	| Initializes Cookie 
  	|--------------------------------------------------------------------------
  	| Develover Tatiye.Net 2022
  	| @Date Min 20 Mar 2022 08:07:35  WITA 
  	*/
  	public static function Cookie($key=''){
  		if (!empty($_COOKIE[$key])) {
  			return $_COOKIE[$key];
  		} else {
  			return '';
  		}
  		
  	      
  	    
  	}
  	/* and class Cookie */

  	/*
  	|--------------------------------------------------------------------------
  	| Initializes Cookie 
  	|--------------------------------------------------------------------------
  	| Develover Tatiye.Net 2022
  	| @Date Min 20 Mar 2022 07:25:36  WITA 
  	*/
  	public static function Read($name, $value = '', $expire = '+7 day'){
  	    setcookie($name,$value,strtotime($expire), '/');
  	    
  	}
  	/* and class Cookie */
  	/*
  	|--------------------------------------------------------------------------
  	| Initializes selcet 
  	|--------------------------------------------------------------------------
  	| Develover Tatiye.Net 2022
  	| @Date Min 20 Mar 2022 07:55:07  WITA 
  	*/
  	public static function Select(){
       $arryID = array();
        foreach ($_COOKIE as $key => $value) {
        	 if($key!='ciNav' && $key!='_ga'&& $key!='_gid')   {  
                $arryID[$key]=$value; 
             } 
        }
  	    return $arryID; 
  	}
  	/* and class selcet */
  	/*
  	|--------------------------------------------------------------------------
  	| Initializes Unset 
  	|--------------------------------------------------------------------------
  	| Develover Tatiye.Net 2022
  	| @Date Min 20 Mar 2022 07:58:39  WITA 
  	*/
  	public static function Unset($key){
 
          unset($_COOKIE[$key]);
          setcookie($key, "", time() - 3600, "/");
           
  	    
  	}
  	/* and class Unset */




  }
       