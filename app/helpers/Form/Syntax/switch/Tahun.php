<?php 
use app\tatiye;
$now=date('Y');
?>
<div class="<?=$row['colom'];?>">
	<small class="<?=$row['label'];?>"><?=$row['title'];?></small>
                <?php 
                  for ($a=$value[4];$a<=$now;$a++){
                      $customSwitch=$row['name'].$a;
                      $str= $str .'"'.$customSwitch.'",';
                 ?>
                  <div style="margin-bottom: 10px;">
                        <div class="custom-control custom-switch">
                          <input onclick="customSwitch('<?=$a;?>','<?=$customSwitch;?>');" name="<?=$row['name'];?>" type="checkbox" class="custom-control-input" value="<?=$a;?>" id="<?=$customSwitch;?>">
                          <label class="custom-control-label" for="<?=$customSwitch?>"><?=$a;?></label>
                        </div>
                  </div>
               <?php }?>
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