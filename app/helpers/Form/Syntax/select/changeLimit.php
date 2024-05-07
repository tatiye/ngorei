<?php 
use app\tatiye;
?>
<div class="<?=$row['colom'];?>">
	<small id="<?=$row['name'];?>"class="<?=$row['label'];?>"><?=$row['title'];?></small>
            <select id="custom<?=$row['name'];?>" class="form-control select<?=$row['name'];?> "name="<?=$row['name'];?>" >
            <?php 
             echo $row['value'];
             foreach ($value[4] as $key => $set) {
              if (!empty($value[5])) {
                $val=$value[5][$key];
              } else {
                $val=$set;
              }
                 echo '<option value="'.$val.'">'.$set.'</option>';
              }
             ?>
            </select>
   <small id="info_<?=$row['name'];?>"></small>
</div>
<script type="text/javascript">
	 $('.select<?=$row['name'];?>').select2({
	   placeholder: '<?=$row['placeholder'];?>',
     searchInputPlaceholder: 'Search options',
     allowClear: true
	 });

 
</script> 