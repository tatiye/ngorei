<?php 
use app\tatiye;
$SyntaxType=[
   'text'        =>'/Text.php', //false,true
   'file'        =>'/File.php', //false,true
   'import'      =>'/Import.php', //false,true
   'date'        =>'/Date.php', //false,true
   'search'      =>'/Search.php', //false,true
   'password'    =>'/Password.php', //false,true
   'email'       =>'/Email.php', //false,true
   'Hp'          =>'/Hp.php', //false,true
   'map'         =>'/Map.php', //false,true
   'link'         =>'/Link.php', //false,true
   'images'      =>'/Images.php', //false,true
   'number'      =>'/Number.php', //false,true
   'textarea'    =>'/Textarea.php', //false,true
   'texquery'    =>'/texquery.php', //false,true
   'search2'     =>'/Search2.php', //false,true
   'hidden'      =>'/Hidden.php', //false,true

  ];
  // $ConID=cont($value[0]); 
if (!empty($SyntaxType[$value[0]])) {  
     if (!empty($add[$key])) {
         $setAdd='value="'.$add[$key].'"';
         $setAddFile=$add[$key];
         $setAddImg=$add[$key];

         if (@$value[3] =='readonly') {
             $readonly='readonly';
         } else {
             $readonly='';
         }
     } else {
         $setAdd='';
         $setAddFile='';
         $readonly='';
         $setAddImg='https://media.flaticon.com/dist/min/img/collections/collection-tour.svg';
     }
     if ($stsLabel=='hidden') {
        $gr='mb-10px';
     } else {
        $gr='';
     }

    
     
     
     $row = array(
         'no'            =>$iniNo,
         'value'         =>$setAdd.' '.$readonly,
         'images'        =>$setAddImg,
         'file'          =>$setAddFile,
         'colom'         =>'col-md-'.$value[1].' '.$gr.' form-group stec',
         'colom_group'   =>'col-md-'.$value[1].'',
         'title'         =>$value[2],
         'readonly'      =>$value[2],
         'label'         =>$stsLabel,
         'name'          =>$storage['az'].$iniNo,
         'placeholder'   =>'Bidang '.$value[2].' masukan',
   );

    require(__DIR__ .$SyntaxType[$value[0]]);
} else {
  echo "Type From Tidak ditemukan";
}
?>
