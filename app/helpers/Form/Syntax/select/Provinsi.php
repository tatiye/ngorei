<?php 
use app\tatiye;
if (!empty($value[4])) {
    $myKode=$value[4];
} else {
    $myKode='';
}
$apiUrl=URLROOT.'/api/v1/select/kode/'.$myKode;
?>
<div class="<?=$row['colom'];?>">
    <small  id="<?=$row['name'];?>"class="<?=$row['label'];?>"><?=$row['title'];?></small>
        <select  id="Provinsi<?=$row['name'];?>"class="form-control select<?=$row['name'];?> "name="<?=$row['name'];?>"onchange="selectKabupaten(this.value);"> 
         
        </select>
   <small id="info_<?=$row['name'];?>"></small>
</div>
<script type="text/javascript">
     $('.select<?=$row['name'];?>').select2({
       placeholder: '<?=$row['placeholderTabel'];?>',
       searchInputPlaceholder: 'Search options',
       allowClear: true
     });
     var settings = {
       "url": '<?=$apiUrl;?>',
       "method": "POST",
       "timeout": 0,
     };
    var provinsi='';
    var provinsi='<option value="|"><?=$row['placeholder'];?></option>';
    $.ajax(settings).done(function (response) {
         $.each(response,function(index,value){
             var desain= '<option value="'+value.kode+'|'+value.name+'">'+value.name+'</option>';
             provinsi+=desain; 
         });
          $("#Provinsi<?=$row['name'];?>").html(provinsi);
    });
    </script>

