<?php 
use app\tatiye;
?>
<div class="<?=$row['colom'];?>">
<small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
<div class="input-group mg-b-1">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><i class="feat feat-map-pin"></i></span>
  </div>     
  <input type="text" class="form-control"name="<?=$row['name'];?>" placeholder="Masukan <?=$row['title'];?>" <?=$row['value'];?> readonly>
  <div class="input-group-append">
    <a onclick="getLocationSet();" class="input-group-text fs-11px" id="basic-addon2">Get Kode</a>
  </div>  
</div>
<small id="info_<?=$row['name'];?>">Klik bagian <b>Get Kode</b> untuk mengambil titik Koordinat</small>
</div>
<script type="text/javascript">
function getLocationSet() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    $("#info_<?=$row['name'];?>").html('Geolokasi tidak didukung oleh perangkat ini.');
    x.innerHTML = "Geolokasi tidak didukung oleh perangkat ini.";
  }
}
function showPosition(position) {
  $('input[name="<?=$row['name'];?>"]').val(position.coords.latitude + "," + position.coords.longitude);
}
</script>