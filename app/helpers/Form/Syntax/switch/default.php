<?php 
use app\tatiye;
use app\tatiyeNetInit;
$SyntaxType=[
   'custom'      =>'/Custom.php', //false,true
   'tabel'       =>'/Tabel.php', //false,true
   'limit'       =>'/Limit.php', //false,true
   'tahun'       =>'/Tahun.php', //false,true
   'bulan'       =>'/Bulan.php', //false,true
  ];
  // 
if (!empty($SyntaxType[$value[3]])) {  

     if (!empty($add[$key])) {
         $setAdd=$add[$key];
     } else {
         $setAdd='';
     }

     if ($stsLabel=='hidden') {
        $gr='mb-10px';
     } else {
        $gr='';
     }
     


     $row=array(
         'no'            =>$iniNo,
         'value'         =>$setAdd,
         'colom'         =>'col-md-'.$value[1].' '.$gr.' form-group',
         'colom_group'   =>'col-md-'.$value[1].'',
         'title'         =>$value[2],
         'label'         =>$stsLabel,
         'name'          =>$storage['az'].$iniNo,
         'placeholder'   =>'Bidang '.$value[2].' masukan',
   );
    require(__DIR__ .$SyntaxType[$value[3]]);
} else {
     if($value[2] == 'Provinsi') {
        require(__DIR__ .$SyntaxType[$value[2]]);
     } elseif ($value[2] == 'diteruskan'){
    
    } else {
        echo "Type From Tidak ditemukan";
    }
    
}
?>


