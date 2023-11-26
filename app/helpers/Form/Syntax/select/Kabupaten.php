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
    <small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
        <select  id="Kabupaten<?=$row['name'];?>"class="form-control select<?=$row['name'];?>"name="<?=$row['name'];?>"onchange="selectKecamatan(this.value);"> 
        </select>
   <small id="info_<?=$row['name'];?>"></small>
</div>
<script type="text/javascript">
     $('.select<?=$row['name'];?>').select2({
       placeholder: '<?=$row['placeholderTabel'];?>',
       searchInputPlaceholder: 'Search options',
       allowClear: true,
     });

function explode(text,str,str1) {
    var tn        =text.split(str);
   return tn[str1];
}


function selectKabupaten(kode) {

     var myKode=explode(kode,'|',0);
     var kabupaten='';
     var kabupaten='<option value="|"><?=$row['placeholder'];?></option>';
     var settings = {
       "url": "<?=$apiUrl;?>"+myKode,
       "method": "POST",
       "timeout": 0,
     };
     var myfriend='';
    $.ajax(settings).done(function (response) {
         $.each(response,function(index,value){
             var desain= '<option value="'+value.kode+'|'+value.name+'">'+value.name+'</option>';
             kabupaten+=desain;
            

         });
          $("#Kabupaten<?=$row['name'];?>").html(kabupaten);
    });
   } 

<?php
 if(!empty($value[4])) {?>
     var settingsX = {
       "url": "<?=$apiUrl.$value[4];?>",
       "method": "POST",
       "timeout": 0,
     };
     var myfriend='';
    $.ajax(settingsX).done(function (response) {
         $.each(response,function(index,value){
             var desain= '<option value="'+value.kode+'">'+value.name+'</option>';
             myfriend+=desain;
             $("#Kabupaten<?=$row['name'];?>").html(myfriend);

         });
    });
<?php }?>
    </script>

