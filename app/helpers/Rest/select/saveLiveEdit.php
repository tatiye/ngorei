<?php 
use app\tatiye;
use app\tatiyeNetAuthorization AS Authorization;
$db=new tatiye();
$Text=tatiye::Text();
$connect =$db->mysqli();
if(isset($_POST["name"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE demo SET ".$_POST["name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query)){

 }
}