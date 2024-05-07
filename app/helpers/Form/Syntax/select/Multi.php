<?php 
use app\tatiye;

if (!empty($value[7])) {
  $onchange='onchange="select'.$row['name'].'({
    key:this.value,
    tabel:'.$value[7].',
  });"';
} else {
  $onchange='';
}

?>
<div class="<?=$row['colom'];?>">
	<small id="label<?=$row['name'];?>"class="<?=$row['label'];?>"><?=$row['title'];?></small>
   <select id="<?=$value[4];?>" class="form-control select<?=$value[4];?> "name="<?=$value[4];?>" select="<?=$value[7];?>"
    <?=$onchange;?>> </select>
   <small id="info_<?=$value[4];?>"></small>
</div>
<script type="text/javascript">
	 $('.select<?=$value[4];?>').select2({
	   placeholder: '<?=$row['placeholder'];?>',
     searchInputPlaceholder: 'Search options',
     allowClear: true
	 });
</script>