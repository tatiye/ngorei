<?php 
use app\tatiye;
 $db=new tatiye();
  if($value[0] == 'select') {
           $myTabel    =$value[4]; 
           $myValue    =$value[5]; 
           $myName     =$value[6]; 
           $myCategori =$value[7]; 
             if (!empty($myCategori)) {
                $ID=explode('-',$myCategori);
                $WH="$ID[0]='".$ID[1]."'";
             } else {
                $WH="";
             }
         }

        ?>
<div class="<?=$row['colom'];?>">
    <small class="<?=$row['label'];?>"><?=$row['title'];?></small>
            <select  id="Tabel<?=$row['name'];?>" class="form-control select<?=$row['name'];?> "name="<?=$row['name'];?>" onchange="selectSSH(this.value);"> >
              <?php 
              echo $row['value'];
               
               ?>
            </select>
   <small id="info_<?=$row['name'];?>"></small>
</div>
<script type="module">
  import tatiyeNet,{useHandelOption} from  "<?= tatiye::link_modules();?>";
     $('#Tabel<?=$row['name'];?>').select2({
       placeholder: '<?=$row['placeholder'];?>',
     searchInputPlaceholder: 'Search options',
     allowClear: true
     });
     var mySeekId=useHandelOption({
        "tabel":'<?=$myTabel;?>',
        "where":"<?=$WH;?>",
     });

    if (mySeekId) {
      var myfriend='';
      var myfriend='<option value=""><?=$row['placeholder'];?></option>';
      $.each(mySeekId,function(index,value){
             var desain= '<option value="'+value.id+'">'+value.title+'</option>';
             myfriend+=desain;
             $("#Tabel<?=$row['name'];?>").html(myfriend);
         });

  } else {
      var myfriend='<option value=""><?=$row['placeholder'];?></option>';
      $("#Tabel<?=$row['name'];?>").html(myfriend);
  }
</script>