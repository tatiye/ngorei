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
		     	$WH="WHERE $ID[0]='".$ID[1]."'";
		     } else {
		     	$WH="";
		     }
		 }

 	   	?>
<div class="<?=$row['colom'];?>">
	<small class="<?=$row['label'];?>"><?=$row['title'];?></small>
            <select  id="Tabel<?=$row['name'];?>" class="form-control select<?=$row['name'];?> "name="<?=$row['name'];?>" >
              <?php 
              echo $row['value'];
	              $query="SELECT $myValue,$myName FROM $myTabel $WH";
	 	   	        $result=$db->query($query);
	 	   	        while($rows1=$result->fetch_assoc()){                           
	 	   	       	echo '<option value="'.$rows1[$myValue].'">'.$rows1[$myName].'</option>';        
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