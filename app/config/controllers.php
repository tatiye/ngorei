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
class controllers  {
 /*
 |--------------------------------------------------------------------------
 | Initializes controllers 
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2023
 | @Date Sabtu 09 Desember 2023, 04:18:55 PM 
 */
 public static function package(){
      return  array(
        "lisnsi"    =>false
      );
 }
 /*
 |--------------------------------------------------------------------------
 | Initializes Sistem Upgrade
 |--------------------------------------------------------------------------
 | Develover Tatiye.Net 2023
 | @Date Sabtu 09 Desember 2023, 04:18:55 PM 
 */
 public static function upgrade(){
     return array(
        "status"   =>true,
        "status"   =>true,
        "server"   =>'http://localhost',
        "aplikasi" =>true,
        "package"=>[
          "demo" =>false
        ]
   );
 }
 
}
