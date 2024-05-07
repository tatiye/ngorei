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
<div class="input-group mg-b-1">

  <input type="text" class="form-control"name="<?=$row['name'];?>" placeholder="Masukan <?=$row['title'];?>" <?=$addVal;?>aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete='off'>
  <div class="input-group-append">
    <span id="copy"data-clipboard-text='<?=$row['addval']?>'class="input-group-text" id="basic-addon2"><i class="feat feat-copy "></i></span>
  </div>     
</div>
<small id="info_<?=$row['name'];?>"></small>
</div>

<script type="text/javascript">
var clipboard = new Clipboard('#copy');
clipboard.on('success', function(e) {
//$("#nugi").html(e);
});
clipboard.on('error', function(e) {
//$("#nugi").html('error');
});
</script>