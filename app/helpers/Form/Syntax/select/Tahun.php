<?php 
use app\tatiye;
$now=date('Y')+1;
?>
<div class="<?=$row['colom'];?>">
	<small class="<?=$row['label'];?>"><?=$row['title'];?></small>
            <select id="Tahun<?=$row['name'];?>" class="form-control select<?=$row['name'];?> "name="<?=$row['name'];?>" >
              <option label="Choose one"></option>
                <?php 
                  for ($a=$value[4];$a<=$now;$a++){
                       echo "<option value='$a'>$a</option>";
                  }
                 ?>
            </select>
   <small id="info_<?=$row['name'];?>"></small>
</div>
<script type="text/javascript">
	 $('.select<?=$row['name'];?>').select2({
	   placeholder: '<?=$row['title'];?>',
     searchInputPlaceholder: 'Search options',
     allowClear: true
	 });
</script>

