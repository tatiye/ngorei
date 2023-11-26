<?php 
use app\tatiye;
?>
<div class="<?=$row['colom'];?>">
  <small class="<?=$row['label'];?>"><?=$row['title'];?></small>
        
                <?php 
                    $x = 1;
                    while($x <= $value[4]) {
                      $customSwitch=$row['name'].$x;
                      @$str= $str .'"'.$customSwitch.'",';
                 ?>
                  <div style="margin-bottom: 10px;">
                        <div class="custom-control custom-switch">
                          <input onclick="customSwitch('<?=$x;?>','<?=$customSwitch;?>');" name="<?=$row['name'];?>" type="checkbox" class="custom-control-input" value="<?=$x;?>" id="<?=$customSwitch;?>">
                          <label class="custom-control-label" for="<?=$customSwitch?>"><?=$row['title'].' '.$x;?></label>
                        </div>
                  </div>
         <?php   $x++; }?>
         
   <small id="info_<?=$row['name'];?>"></small>
</div>
<?php
 if(!empty($value[5])) {?>
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