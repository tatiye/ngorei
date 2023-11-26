<?php
/**
 * TatiyeNet - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2020 wolf05 <info@tatiye.net / https://www.facebook.com/tatiyeNet/>.
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
namespace app\config;
/**
 * Generates an HTML block tag that follows the Bootstrap documentation
 * on how to display  component.
 *
 * See {@link https://tatiye.net/} for more information.
 */
class database  {
 /*
 |--------------------------------------------------------------------------
 | Initializes database 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2021
 | @Date Sen 14 Mar 2022 07:33:48  WITA 
 */
 public static function db(){
      return  array(
        'driver'   =>'mysqli',
        'port'     =>'5432',  // PostgreSQLgsd02
        'host'     =>'localhost',
        'username' =>'root',
        'password' =>'12345678',
        'database' =>'framework02',
      );
     
 }
 /* and class database */


/**
 * and class title
 */
}



