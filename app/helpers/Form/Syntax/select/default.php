<?php 
use app\tatiye;
$SyntaxType=[
   'custom'            =>'/Custom.php', //false,true
   'tabel'             =>'/Tabel.php', //false,true
   'Tabel_Standar'     =>'/Tabel_Standar.php', //false,true
   'limit'             =>'/Limit.php', //false,true
   'Provinsi'          =>'/Provinsi.php', //false,true
   'Kabupaten'         =>'/Kabupaten.php', //false,true
   'Kecamatan'         =>'/Kecamatan.php', //false,true
   'Desa'              =>'/Desa.php', //false,true
   'tahun'             =>'/Tahun.php', //false,true
   'bulan'             =>'/Bulan.php', //false,true
   'package'           =>'/Package.php', //false,true 
   'changeLimit'        =>'/changeLimit.php', //false,true 


  ];
  // 
if (!empty($SyntaxType[$value[3]])) {  
     if (!empty($add[$key])) {
         $setAdd='<option value="'.$add[$key].'">'.$add[$key].'</option>';
         $setAddTabel=$add[$key];
     } else {
         $setAdd='<option value="">'.$value[2].'</option>';
         $setAddTabel=$value[2];
     }
     if ($stsLabel=='hidden') {
        $gr='mb-10px';
     } else {
        $gr='';
     }
     
     $row=array(
         'no'            =>$iniNo,
         'value'         =>$setAdd,
         'region'        =>$setAdd,
         'colom'         =>'col-md-'.$value[1].' '.$gr.' form-group',
         'colom_group'   =>'col-md-'.$value[1].'',
         'title'         =>$value[2],
         'label'         =>$stsLabel,
         'name'          =>$storage['az'].$iniNo,
         'az'            =>$storage['az'],
         'placeholder'   =>$value[2].' ',
         'placeholderTabel'   =>$setAddTabel,
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
