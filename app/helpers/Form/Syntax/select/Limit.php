<?php 
use app\tatiye;
?>
<div class="<?=$row['colom'];?>">
  <small class="<?=$row['label'];?>"><?=$row['title'];?></small>
            <select id="<?=$row['name'];?>" class="form-control select<?=$row['name'];?> "name="<?=$row['name'];?>" >
              <option label="Choose one"></option>
                <?php 
                    echo $row['value'];
                    $x = 1;
                    while($x <= $value[4]) {
                      echo '<option value="'.$x.'">'.$row['title'].' '.$x.'</option>';
                      $x++;
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