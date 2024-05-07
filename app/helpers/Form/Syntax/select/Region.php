<?php 
use app\tatiyeNet;
use app\tatiyeNetInit;
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
  ];
  // 
if (!empty($SyntaxType[$value[3]])) {  
     if (!empty($add[$key])) {

         if (!empty($dirregion)) {
             if ($dirregion=='kode') {
                 $nMdirregion='nama';
             } else {
                 $nMdirregion='kode';
             }
             
             $kode= tatiyeNet::MyTabelFetch('wilayah','*',"$nMdirregion='".$add[$key]."'");
             if (!empty($kode["$nMdirregion"])) {
                $region='<option value="'.$kode["$nMdirregion"].'">'.$kode["$nMdirregion"].'</option>';
             } else {
                 $region='<option label="Choose one"></option>';
             }
         } else {
             $region='<option label="Choose one"></option>';
         }
         

          $setAdd='<option value="'.$add[$key].'">'.$add[$key].'</option>';
         
     } else {
         $setAdd='<option label="Choose one"></option>';
     }

     $row=array(
         'no'            =>$iniNo,
         'value'         =>$setAdd,
         'region'        =>@$region,
         'colom'         =>'col-md-'.$value[1].' form-group',
         'colom_group'   =>'col-md-'.$value[1].'',
         'title'         =>$value[2],
         'label'         =>$stsLabel,
         'name'          =>$storage['az'].$iniNo,
         'az'            =>$storage['az'],
         'placeholder'   =>'Pilih '.$value[2],
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
