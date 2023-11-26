<?php 
use app\tatiye;
$variable=json_decode($_POST['action'], true);
$AZ=$storage['az']; 
$Exvariable=explode(',',$storage['syntax']);
$Exp1[]=array('no' =>'');
$Exp1[]=array('no' =>'use app\tatiye;');
$Exp1[]=array('no' =>'use PhpOffice\PhpSpreadsheet\Reader\Xlsx;');
$Exp1[]=array('no' =>'$Text=tatiye::Text();');
$Exp1[]=array('no' =>'$db=new tatiye();');
$Exp1[]=array('no' =>'$setUId=$_SESSION["user_id"];');
$Exp1[]=array('no' =>'$excelMimes = array(');
$Exp1[]=array('no' =>'  "text/xls", ');
$Exp1[]=array('no' =>'  "text/xlsx", ');
$Exp1[]=array('no' =>'  "application/excel",');
$Exp1[]=array('no' =>'  "application/vnd.msexcel",');
$Exp1[]=array('no' =>'  "application/vnd.ms-excel",');
$Exp1[]=array('no' =>'  "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"');
$Exp1[]=array('no' =>');');
$Exp1[]=array('no' =>'if(!empty($_FILES["filename"]["name"]) && in_array($_FILES["filename"]["type"], $excelMimes)){ ');
$Exp1[]=array('no' =>'  if(is_uploaded_file($_FILES["filename"]["tmp_name"])){ ');
$Exp1[]=array('no' =>'    $reader = new Xlsx(); ');
$Exp1[]=array('no' =>'    $spreadsheet = $reader->load($_FILES["filename"]["tmp_name"]);');
$Exp1[]=array('no' =>'    $worksheet = $spreadsheet->getActiveSheet(); ');
$Exp1[]=array('no' =>'    $worksheet_arr = $worksheet->toArray();');
$Exp1[]=array('no' =>'    unset($worksheet_arr[0]);');
$Exp1[]=array('no' =>'    foreach($worksheet_arr as $row){');
$Exp1[]=array('no' =>'    $data = array(');
  foreach ($Exvariable as $key => $value) {
     $myNo1=$myNo1+1;
     $Exp1[]=array('no'=>'     "'.$value.'"    =>$row['.$key.'],');
  }
  $Exp1[]=array('no'=>'     "time"   =>tatiye::tm(),');
  $Exp1[]=array('no'=>'     "date"   =>tatiye::dt("EN"),');
  $Exp1[]=array('no'=>'     "bulan"  =>tatiye::dt("M"),');
  $Exp1[]=array('no'=>'     "tahun"  =>tatiye::dt("Y"),');
  $Exp1[]=array('no'=>'     "userid" =>$setUId,');

$Exp1[]=array('no' =>'    );');
$Exp1[]=array('no' =>'    $result=$db->que($data)->insert("demo");');
$Exp1[]=array('no' =>'  }');
$Exp1[]=array('no' =>'     $val["hasil"]    ="sukses"; ');
$Exp1[]=array('no' =>'  }else{');
$Exp1[]=array('no' =>'     $val["hasil"]    ="error";');
$Exp1[]=array('no' =>'  }    ');
$Exp1[]=array('no' =>'}    ');
$Exp1[]=array('no' =>'echo json_encode($val);');
$Exp1[]=array('no' =>'    ');
echo "<pre style='display:none1'><code>". tatiye::AsciiTable()->crud($Exp1)."</code></pre>";
