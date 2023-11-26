<?php 
use app\tatiye;
if (!empty($value[4])) {
    $myKode=$value[4];
} else {
    $myKode='';
}
$apiUrl=URLROOT.'/api/v1/select/kode/';
?>
<div class="<?=$row['colom'];?>">
    <small id="<?=$row['name'];?>"class="<?=$row['label'];?>"><?=$row['title'];?></small>
        <select  id="Desa<?=$row['name'];?>"class="form-control select<?=$row['name'];?> "name="<?=$row['name'];?>"> 
        </select>
   <small id="info_<?=$row['name'];?>"></small>
</div>
<script type="text/javascript">
     $('.select<?=$row['name'];?>').select2({
       placeholder: '<?=$row['placeholderTabel'];?>',
       searchInputPlaceholder: 'Search options',
       allowClear: true
     });

function explode(text,str,str1) {
    var tn        =text.split(str);
    return tn[str1];
}

function selectDesa(kode) {
    var myKode=explode(kode,'|',0);
     var settings = {
       "url": "<?=$apiUrl;?>"+myKode,
       "method": "POST",
       "timeout": 0,
     };
     var desa='';
     var desa='<option value="|"><?=$row['placeholder'];?></option>';
    $.ajax(settings).done(function (response) {
         $.each(response,function(index,value){
             var desain= '<option value="'+value.kode+'|'+value.name+'">'+value.name+'</option>';
             desa+=desain;
             $("#Desa<?=$row['name'];?>").html(desa);

         });
    });


   } 
    </script>

