<?php 
use app\tatiye;
?>
<div class="hidden">
	<small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
	<input id="Input<?=$row['name'];?>"type="hidden" class="form-control" name="<?=$row['name'];?>" value="<?=$row['title'];?>">
	<small id="info_<?=$row['name'];?>"></small>
</div>

