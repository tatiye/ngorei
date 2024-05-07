<?php
/**
 * TatiyeNet - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2020 wolf05 .
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
 * on how to display  component.
 *
 * See {@link https://tatiye.net/} for more information.
 */
class database  {
 /*
 |--------------------------------------------------------------------------
 | Initializes database 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2024
 | @Date Jumat 03 Mei 2024, 08:59:32 PM 
 */
 public static function db(){
      return  array(
        "driver"   =>"mysqli",
        "port"     =>"80",
        "host"     =>"",
        "username" =>"",
        "password" =>"",
        "database" =>"",
      );
 }
 /* and class database */
 /*
 |--------------------------------------------------------------------------
 | Akses Database firebase 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2024
 | @Date Jumat 03 Mei 2024, 08:59:32 PM 
 */
 public static function firebase(){
  return  array(
      "status"                =>true,
      "database"              =>[
          "apiKey"            =>false,
          "authDomain"        =>false,
          "databaseURL"       =>false,
          "projectId"         =>false,
          "storageBucket"     =>false,
          "messagingSenderId" =>false,
          "appId"             =>false,
      ],
    );
 }
 /*
 |--------------------------------------------------------------------------
 | Akses Tabel Api  tabelApi 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2024
 | @Date Jumat 03 Mei 2024, 08:59:32 PM 
 */
 public static function tabelApi(){
     return array(
        "demo" =>true
   );
 }
 /* and class tabelApi */
}
