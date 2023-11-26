<?php 
use app\tatiye;
use app\Graph\kodewilayah;
$stmt = kodewilayah::init()->wilayah();
$Text=tatiye::Text();
	 $products_arr=array();
	 while ($row = $stmt->fetch()) { 
	 	extract($row);
	 	$product_item=array(
	 		"kode" => $kode,
	 		"name" => $Text->strtoupper($nama),
	 	);
	 	array_push($products_arr, $product_item);
	 }
	 echo json_encode(array_merge($products_arr));
?>


