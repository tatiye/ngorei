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
/**
 * LinkTo: Generates a link tag.
 */
class tatiyeAssets {

  public $uid;
    /**
     * Initializes the object and returns an instance holding the HTML code for
     * a link tag.
     *
     * @param mixed $name link target.
     * @param array $options link options.
     * @param callable $block closure that generates the content to be surrounding to.
     */
    public function __construct(){
      // $this->options=$options;
    }

/*
|--------------------------------------------------------------------------
| Initializes title 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2022
| @Date  3/18/2022 6:08:19 PM 
*/
   public static function init($type='',$link='') {
    $modules=explode('/',$link);
    $external=explode('://',$link);
    if ($external[0]=='https') {
        $baseLink=$link;
    } else {
        $baseLink=tatiye::LINK($link);
    }
   if ($type=='css') {
     return '<link rel="stylesheet" href="'.$baseLink.'">';    
   } else {
    if ($modules[0]=='node_modules') {
        $myType='defer type="module"';
     return '<script src="'.$baseLink.'" '.$myType.'"></script>';    
    } elseif ($modules[0]=='modules') {
        $myType='defer type="module"';
     return '<script src="'.$baseLink.'" '.$myType.'"></script>';    
    } else {
        $myType='';
        return '<script src="'.$baseLink.'"></script>';    
    }
     // code...
   }

  }
   /* and class Db */
   /*
   |--------------------------------------------------------------------------
   | Initializes js 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function base($key){
         return $key;
       
   }
   /* and class js */
   /*
   |--------------------------------------------------------------------------
   | Initializes css 
   |--------------------------------------------------------------------------
   | Develover Tatiye.Net 2022
   | @Date  
   */
   public static function css($key){
         return $key;
       
   }
   /* and class css */

}