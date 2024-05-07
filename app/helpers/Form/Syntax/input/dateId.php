<?php 
use app\tatiye;
if ($value[3]=='yy/mm/dd') {
  $place=tatiye::dt('EN');// code...
} else {
  $place=tatiye::dt('IN');// code...
}
if (!empty($row['addva2'])) {
    $addVal='value="'.$row['addva2'].'"';

} else {
    $addVal=$row['value'];
}

?>

<div class="<?=$row['colom'];?>">
<small id="label<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
<div class="input-group mg-b-1">
    <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><i class="feat feat-calendar"></i></span>
  </div>
  <input type="text" id="date<?=$value[4];?>"class="form-control" name="<?=$row['name'];?>"placeholder=" <?=$place;?>"  autocomplete='off'>
  
</div>


</div>
   <script type="module">
   $('#date<?=$value[4];?>').datepicker({
       dateFormat:"<?=$value[3] ? $value[3]:'';?>",
       showOtherMonths: true,
       selectOtherMonths: true,
       changeMonth: true,
       changeYear: true,
     });


 import tatiyeNet,{saveLiveEdit} from  "<?= tatiye::link_modules();?>";
      $(document).on('change', '#date<?=$value[4];?>', function(i){
        if (this.value) {
          saveLiveEdit({
               'id':'<?=$value[5];?>',
               'tabel':'<?=$nmTabel;?>',
               'name':'<?=$row['title'];?>',
               'value':this.value
           })
          $("#data<?=$value[4];?>").show();
          $("#<?=$value[4];?>").hide();
          $("#data<?=$value[4];?>").html(this.value);
  }

     });
</script>
