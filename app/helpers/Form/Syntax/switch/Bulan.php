<?php 
use app\tatiye;
$Text=tatiye::Text();
?>
<div class="<?=$row['colom'];?>">
	<small class="<?=$row['label'];?>"><?=$row['title'];?></small>
  <?php
  $no=0;
  $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
  $jlh_bln=count($bulan);
  for($c=0; $c<$jlh_bln; $c+=1){
   $no=$no+1;
   $customSwitch=$row['name'].$Text->sprintf($no,"%02s");
   $str= $str .'"'.$customSwitch.'",';
   ?>
        <div style="margin-bottom: 10px;">
              <div class="custom-control custom-switch">
                <input onclick="customSwitch('<?=$Text->sprintf($no,"%02s");?>','<?=$customSwitch;?>');" name="<?=$row['name'];?>" type="checkbox" class="custom-control-input" value="<?=$Text->sprintf($no,"%02s");?>" id="<?=$customSwitch;?>">
                <label class="custom-control-label" for="<?=$customSwitch?>"><?=$bulan[$c];?></label>
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