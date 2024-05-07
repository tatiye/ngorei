<?php 
use app\tatiye;
?>
<div class="<?=$row['colom'];?>">
	<small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
	<button onclick="useClick(['<?=$row['addval'];?>','add','id']);" type="button" class="btn btn-primary btn-block bold"><b><?=$row['title'];?></b></button>
</div>

