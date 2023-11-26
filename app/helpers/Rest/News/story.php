<?php 
use app\tatiye;
use app\Rest\News\storage;
$db=new tatiye();
$Text=tatiye::Text();
$Exp=array();
$data = json_decode(file_get_contents("php://input"));
$query='SELECT * FROM app_news GROUP BY segment,id  ORDER BY id,segment DESC LIMIT 7';
$result=$db->query($query);
while($row=$result->fetch_assoc()){
     $Exp[]=$row;
}
 http_response_code(200);
 echo json_encode($Exp);

