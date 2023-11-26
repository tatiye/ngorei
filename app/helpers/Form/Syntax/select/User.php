<?php 
use app\tatiyeNet;
$red=tatiyeNet::Qb('query')->pqdb_id(10)->fetch_array("a.name='".$row[$key]."'"); 
?>
          <strong id="<?='a'.$no;?>"><small class="text-capitalize bold <?=$stsLabel;?>"><?=$Text->strreplace([$value[2],'_',' ']);?></small></strong>
 	   	   <?=$setICON;?>
 	   	   <select name="<?=$key;?>" id="<?=$key;?>" class="form-control with-border">  
           <?php 
           
             if(!empty($red['nama'])) {
               echo '<option value="'.$red['user'].'">'.$red['nama'].'</option>';  
    
             } else {
               echo '<option value="">P I L I H A N</option>';
             }
             

           $package=tatiyeNet::Qb('query')->pqdb_id(10)->SQLI(); 
           while($value=$package->fetch_assoc()){
             echo '<option value="'.$value['user'].'">'.$value['nama'].'</option>';  
           }

            ?>
 	   	  </select>