<?php
$protocol = isset($_SERVER["HTTPS"]) ? "https" : "http";
$HTTP_HOST = $protocol."://". $_SERVER["HTTP_HOST"].str_replace("index.php", "", $_SERVER["PHP_SELF"]);
$HOST=substr($HTTP_HOST, 0, -8);
