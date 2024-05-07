<?php
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
use app\Graph\Response;
use app\models\Package;
if($_SERVER["REQUEST_METHOD"] === "POST") {
$val = json_decode(file_get_contents("php://input"));
// Authorization::init(1);
      $_SESSION['user_id']      = $val->user_id;
      $_SESSION['base_ulr']      = URLROOT;
      $_SESSION['status']       = $val->status;
      $_SESSION['kode']         = $val->kode;
      $_SESSION['user_email']   = $val->email;
      $_SESSION['user_name']    = $val->fullname;
      $_SESSION['avatar']       = $val->avatar;
      $_SESSION['access_token'] = $val->uthorization;
      $_SESSION['sub_domain']   = $val->sub_domain;
      tatiye::setserialKey($val->uthorization);
      tatiye::cookieRead('sso',tatiye::appSSO("Qrcode"));


http_response_code(200);
echo json_encode($val);
} else {
  return tatiye::index();
}
