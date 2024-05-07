<?php 
use app\tatiye;
?>
<div class="<?=$row['colom'];?>">
<small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
<div class="input-group mg-b-1">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><i class="feat feat-link-2"></i></span>
  </div>     
  <input type="text" class="form-control"name="<?=$row['name'];?>" placeholder="Masukan <?=$row['title'];?>" <?=$row['value'];?>aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete='off'>
</div>
<small id="info_<?=$row['name'];?>"></small>
</div>
