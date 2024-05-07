<?php
error_reporting(0);
use app\tatiye;
use app\models\storage;
if($_SERVER["REQUEST_METHOD"] === "POST") {
$entri=json_decode(file_get_contents("php://input"));
$var=tatiye::uidProfil($entri->uid);
http_response_code(200);
echo json_encode($var);
} else {
  return tatiye::index();
}
