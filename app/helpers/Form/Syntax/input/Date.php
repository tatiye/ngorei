<?php 
use app\tatiye;
if ($value[3]=='yy/mm/dd') {
  $place=tatiye::dt('EN');// code...
} else {
  $place=tatiye::dt('IN');// code...
}
if (!empty($row['addva2'])) {
    $addVal='value="'.$row['addva2'].'"';

} else {
    $addVal=$row['value'];
}

?>

<div class="<?=$row['colom'];?>">
<small id="label<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
<div class="input-group mg-b-1">
    <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><i class="feat feat-calendar"></i></span>
  </div>
  <input type="text" id="<?=$row['name'];?>"class="form-control" name="<?=$row['name'];?>"placeholder=" <?=$place;?>" <?= $addVal;?> autocomplete='off'>
  
</div>
<small id="info_<?=$row['name'];?>"></small>
</div>
<script type="text/javascript">
   $('#<?=$row['name'];?>').datepicker({
       dateFormat:"<?=$value[3] ? $value[3]:'';?>",
       showOtherMonths: true,
       selectOtherMonths: true,
       changeMonth: true,
       changeYear: true,
     });
</script>