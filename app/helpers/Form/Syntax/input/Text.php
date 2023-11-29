<?php 
use app\tatiye;
?>
<div class="<?=$row['colom'];?>">
	<small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
	<input id="Input<?=$row['name'];?>"type="text" class="form-control" name="<?=$row['name'];?>" placeholder="<?=$row['placeholder'];?>"<?=$row['value'];?> autocomplete='off'>
	<small id="info_<?=$row['name'];?>"></small>
</div>

