<?php 
use app\tatiye;
 $db=new tatiye();
  if($value[0] == 'switch') {
       $myTabel    =$value[4]; 
       $myValue    =$value[5]; 
       $myName     =$value[6]; 
       $myCategori =$value[7]; 
         if (!empty($myCategori)) {
              $ID=explode('-',$myCategori);
          $WH="WHERE $ID[0]='".$ID[1]."'";
         } else {
          $WH="";
         }
     }

      ?>
<div class="<?=$row['colom'];?>">
  <small class="<?=$row['label'];?>"><?=$row['title'];?></small>
          <?php 
             $no=0;
             $query="SELECT $myValue,$myName FROM $myTabel $WH";
             $result=$db->query($query);
             while($rows1=$result->fetch_assoc()){ 
              $no=$no+1;                          
             // echo '<option value="'.$rows1[$myValue].'">'.$rows1[$myName].'</option>';        
              $customSwitch=$row['name'].$no;
              @$str= $str .'"'.$customSwitch.'",';
             ?>
             <div style="margin-bottom: 10px;">
<div class="custom-control custom-switch">
  <input onclick="customSwitch('<?=$rows1[$myValue];?>','<?=$customSwitch;?>');" name="<?=$row['name'];?>" type="checkbox" class="custom-control-input" value="<?=$rows1[$myValue];?>" id="<?=$customSwitch;?>">
  <label class="custom-control-label" for="<?=$customSwitch?>"><?=$rows1[$myName];?></label>
</div>
</div>
<?php }?>
   <small id="info_<?=$row['name'];?>"></small>
</div>
<?php
 if(!empty($value[8])) {?>
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