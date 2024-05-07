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
	<small id="label<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
	<input id="<?=$value[3];?>"type="text" class="form-control" name="<?=$row['name'];?>" value="<?=$value[5];?>" autocomplete='off'>
	<small id="info_<?=$row['name'];?>"></small>
</div>
<script type="module">
 import tatiyeNet,{saveLiveEdit} from  "<?= tatiye::link_modules();?>";
      $(document).on('change', '#<?=$value[3];?>', function(i){
        if (this.value) {
          saveLiveEdit({
               'id':'<?=$value[4];?>',
               'tabel':'<?=$nmTabel;?>',
               'name':'<?=$row['title'];?>',
               'value':this.value
           })
          $("#data<?=$value[3];?>").show();
          $("#<?=$value[3];?>").hide();
          $("#data<?=$value[3];?>").html(this.value);
  }

     });
</script>