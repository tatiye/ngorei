<?php 
use app\tatiye;
?>



<div class="<?=$row['colom'];?>">
<small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
<div class="search-form  d-none d-sm-flex">
  <input id="input<?=$row['name'];?>" type="text" class="form-control " name="<?=$row['name'];?>"placeholder="<?=$row['placeholder'];?>"<?=$row['value'];?> autocomplete='off'>
  <button class="btn" type="button"><i class="feat feat-search"></i></button>
</div>
 <small id="info_<?=$row['name'];?>"></small>
</div>

<script type="module">
       const keywords = document.getElementById('input<?=$row['name'];?>');
       keywords.addEventListener('keyup', () => {
         useKeywordsStorage(keywords.value);
    });
</script>
