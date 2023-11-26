<?php 
use app\tatiye;

$storage=json_decode($_POST['storage'], true);
$gird=count($storage);
 if($gird == 1) {
   $md='col-md-12';
 } elseif ($gird == 2){
   $md='col-md-6';
 } else {
   $md='col-md-4';
 }
?>
<div class="container-fluid">
  <div class="row">
<?php
$x = 1;
while($x <= $gird) {
  if ($x!==1) {
  $label='A'.$x;
  $value=$x-1;
 if ($label==$storage[$value]) {
   $name='';
 } else {
   $name=$storage[$value];
 }
?>
<div class="<?=$md;?>">
  <small id="<?=$label;?>" class="<?=$label;?>"><?=$label;?></small>
  <input id="Input<?=$label;?>"type="text" class="form-control" name="<?=$label;?>" placeholder="<?=$label;?>" value="<?=$name;?>" autocomplete='off'>
  <small id="info_<?=$label;?>"></small>
</div>
<?php  }
  $x++;
}?>
  </div>
</div>