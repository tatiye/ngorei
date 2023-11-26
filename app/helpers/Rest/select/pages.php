<?php
error_reporting(0);
use app\tatiye;
use app\models\storage;
$NEWTOKEN="eyJkaXIiOiJkZW1vXC9BcGlcLzAuMVwvc2VsZWN0LnBocCIsInVpZCI6MX0";
if($_SERVER["REQUEST_METHOD"] === "POST") {
$val=json_decode(file_get_contents("php://input"));
$db=new tatiye();
$tabel=$val->tabel;
$keywords="nama,title,id";
$COUNT=tatiye::fetch("demo"," COUNT(*) as count");
$total_paging=storage::init($tabel)->total_paging($COUNT["count"],$val->limit);
$products_arr["limit"]  =$val->limit;
$products_arr["page"]   =$val->page;
$products_arr["data"]   =$COUNT["count"];
$products_arr["peging"] =$total_paging;
http_response_code(200);
echo json_encode(array_merge($products_arr));
} else {
  return tatiye::index();
}
