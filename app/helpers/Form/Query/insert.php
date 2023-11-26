<?php 
use app\tatiye;
 if($Type == 'application/json') {
    require_once __DIR__."/Insert/application.php";
 } else {
   require_once __DIR__."/Insert/multipart.php";
 }

         