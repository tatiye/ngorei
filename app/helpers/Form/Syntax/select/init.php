<?php 
use app\tatiye;
if ($value[3]=='init') {
  $variabel=tatiye::indikator($storage['tabel'],$row['name']);
  $varStatus=true;
} else {
  $variabel=$value[4];
  $varStatus=false;
}
?>
<div class="<?=$row['colom'];?>">
	<small id="label<?=$row['name'];?>"class="<?=$row['label'];?>"><?=$row['title'];?></small>
            <select id="<?=$row['name'];?>" class="form-control select<?=$row['name'];?> "name="<?=$row['name'];?>" >
            <?php 
             echo $row['value'];
             foreach ($variabel as $key => $set) {
                if (!empty($varStatus)) {
                 echo '<option value="'.$set.'">'.$set.'</option>';
                } else {
                 echo '<option value="'.$val.'">'.$set.'</option>';
                }
                
              }
             ?>
            </select>
   <small id="info_<?=$row['name'];?>"></small>
</div>
<script type="module">
	 $('.select<?=$row['name'];?>').select2({
	   placeholder: 'Select <?=$row['placeholder'];?>',
     searchInputPlaceholder: 'Search options',
     allowClear: true
	 });
   import tatiyeNet,{indikator} from  "<?= tatiye::link_modules();?>"; 
     var vardata='';
      let columnOption=indikator({
      "tabel"  :'<?=$nmTabel;?>',
      "id"     :'<?=$row['name'];?>',  
     })

    $.each(columnOption,function(index,value){
       if (value.item=='<?=$row['name'];?>') {
          var desain= '<option value="'+value.data+'">'+value.data+'</option>';
          vardata+=desain;
          $("#<?=$row['name'];?>").html(vardata);
       }
     })
</script>
