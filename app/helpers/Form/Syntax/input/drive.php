<?php 
use app\tatiye;
     if ($storage['az']=='name') {
         $azname=$key;
     } else {
         $azname='filename';
         // code...
     }
?>

<div class="<?=$row['colom_group'];?>">
	<div class="card-body pd-t-15 pb-10px mb-10px"style="border: 1px solid #c0ccda;">
	      <div class="media">
	         <label  for="importPhoto">
	        <div class="avatar">
	        	<img id="imagePreview"src="<?=$row['images'];?>" class="rounded-circle" alt="">
	        </div>
            <input style="display:none;" type="file" name="<?=$azname;?>" id="importPhoto"class="none" onchange="previewDrive(this);"/>
          </label>
	        <div class="media-body mg-l-15">
	          <h6 class="tx-13 mg-b-2"id="<?=$row['name'];?>">Informasi Ambil File </h6>
	          <p class="tx-color-03 tx-12 mg-b-1"id="uploadStatus">Klik di bagian drive samping kiri Anda</p>
	          <p class="tx-color-03 tx-11 mg-b-3"id="info_<?=$row['name'];?>"></p>
	        </div><!-- media-body -->
	      </div><!-- media -->
	    </div>
</div>
