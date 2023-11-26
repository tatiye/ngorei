<?php 
use app\tatiye;
$Text=tatiye::Text();
?>
<div class="<?=$row['colom'];?>">
	<small class="<?=$row['label'];?>"><?=$row['title'];?></small>
    <select id="Bulan<?=$row['name'];?>" class="form-control select<?=$row['name'];?> "name="<?=$row['name'];?>" >
      <?php
        echo $row['value'];
        $no=0;
        $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        $jlh_bln=count($bulan);
        for($c=0; $c<$jlh_bln; $c+=1){
           $no=$no+1;
            echo '<option value="'.$Text->sprintf($no,"%02s").'">'.$bulan[$c].'</option>';
        };
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