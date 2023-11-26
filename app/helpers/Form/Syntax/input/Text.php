<?php 
use app\tatiye;
if (!empty($row['addval'])) {
	if ($row['addval']=='readonly') {
		  $addVal=$row['value'];
	} else {
		 $addVal='value="'.$row['addval'].'"';
	}
} else {
  $addVal=$row['value'];
}
?>
<div class="<?=$row['colom'];?>">
	<small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
	<input id="Input<?=$row['name'];?>"type="text" class="form-control" name="<?=$row['name'];?>" placeholder="<?=$row['placeholder'];?>"<?=$addVal;?> autocomplete='off'>
	<small id="info_<?=$row['name'];?>"></small>
</div>

