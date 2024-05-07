<?php 
use app\tatiye;
?>
<div class="<?=$row['colom'];?>">
<small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
<div class="input-group mg-b-1">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><i class="feat feat-mail"></i></span>
  </div>     
  <input type="email" class="form-control"name="<?=$row['name'];?>" placeholder="Masukan <?=$row['title'];?>"<?=$row['value'];?> autocomplete='off'>
</div>
 <small id="info_<?=$row['name'];?>"></small>
</div>
