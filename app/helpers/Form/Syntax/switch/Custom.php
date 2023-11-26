<?php 
use app\tatiye;
?>
<div class="<?=$row['colom'];?>">
  <small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>

         
            <?php 
             $str='';
             foreach ($value[4] as $key => $set) {
              if (!empty($value[5])) {
                $val=$value[5][$key];
              } else {
                $val=$set;
              }
              $customSwitch=$row['name'].$key;
              $str= $str .'"'.$customSwitch.'",';
              if ($val==$row['value']) {
                $checked='checked';
              } else {
                $checked='';
              }
              
             ?>
             <div style="margin-bottom: 10px;">
<div class="custom-control custom-switch">
  <input onclick="customSwitch('<?=$val;?>','<?=$customSwitch;?>');" name="<?=$row['name'];?>" type="checkbox" class="custom-control-input" value="<?=$val;?>" id="<?=$customSwitch;?>"<?=$checked;?>>
  <label class="custom-control-label" for="<?=$customSwitch?>"><?=$set;?></label>
</div>
</div>
<?php }?>  
   <small id="info_<?=$row['name'];?>"></small>
</div>
<?php
 if(!empty($value[6])) {?>
<script type="text/javascript">
function customSwitch(uidtoken,mYini) {
       $.each([<?=$str;?>],function(key, row){ 
            if (row==mYini) {
                $('#'+mYini).prop( "checked",true);
            } else {
                $('#'+row).prop( "checked",false);
            }
       });
  }  
</script>
<?php }?>