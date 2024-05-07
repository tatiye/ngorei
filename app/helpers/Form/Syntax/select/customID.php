<?php 
use app\tatiye;
?>
<div class="<?=$row['colom'];?>">
	<small id="label<?=$row['label'];?>"class="<?=$row['label'];?>"><?=$row['title'];?></small>
            <select id="<?=$value[5];?>" class="form-control select<?=$row['title'];?> "name="<?=$value[5];?>" >
            <?php 
             echo $row['value'];
             foreach ($value[4] as $key => $set) {
                 echo '<option value="'.$set.'">'.$set.'</option>';
              }
             ?>
            </select>
</div>

<script type="module">
	 $('.select<?=$row['title'];?>').select2({
	   placeholder: '<?=$row['placeholder'];?>',
     searchInputPlaceholder: 'Search options',
     allowClear: true
	 });
 import tatiyeNet,{saveLiveEdit} from  "<?= tatiye::link_modules();?>";
      $(document).on('change', '#<?=$value[5];?>', function(i){
        if (this.value) {
          saveLiveEdit({
               'id':'<?=$value[6];?>',
               'tabel':'<?=$nmTabel;?>',
               'name':'<?=$row['title'];?>',
               'value':this.value
           })
          $("#data<?=$value[5];?>").show();
          $("#<?=$value[5];?>").hide();
          $("#data<?=$value[5];?>").html(this.value);
  }

     });
</script>