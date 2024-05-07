<?php 
  use app\tatiye;
  use app\Graph\Response;
  $data = json_decode(file_get_contents("php://input"));
  $db   =new tatiye();
  http_response_code(200);
  $var=tatiye::apiexternalAI($data->url,$data->method,$data);
  echo json_encode($var);