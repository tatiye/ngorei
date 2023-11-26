<?php 
use app\tatiye;
?>

<div class="<?=$row['colom_group'];?>">
	<div class="card-body pd-t-15 pb-10px mb-10px"style="border: 1px solid #c0ccda;">
	      <div class="media">
	         <label  for="importPhoto">
	        <div class="avatar">
	        	<img id="imagePreview"src="<?=$row['images'];?>" class="rounded-circle" alt="">
	        </div>
            <input style="display:none;" type="file" name="filename" id="importPhoto"class="none" onchange="myImagesPreview(this);"/>
          </label>
	        <div class="media-body mg-l-15">
	          <h6 class="tx-13 mg-b-2"id="<?=$row['name'];?>">Informasi Ambil foto </h6>
	          <p class="tx-color-03 tx-12 mg-b-1"id="uploadStatus">Klik di bagian foto samping kiri Anda</p>
	          <p class="tx-color-03 tx-11 mg-b-3"id="info_<?=$row['name'];?>"></p>
	        </div><!-- media-body -->
	      </div><!-- media -->
	    </div>
</div>
<script type="text/javascript">
	  function myImagesPreview(input){
        var file = $("input[type=file]").get(0).files[0];
          var fileName =file.name;
          var fileType = file.type;
              var allowedTypes = [
              'image/jpeg', 
              'image/png', 
              'image/jpg'
              ];
              if(!allowedTypes.includes(fileType)){
                  var informasi=`
                       Ekstensi :JPEG/JPG/PNG
                `;
                 $("#uploadStatus").html(informasi);
                 $("#imagePreview").attr("src", '<?=$row['images'];?>');
                 $("#buttonPreview").hide();
              } else {
                var reader = new FileReader();
                reader.onload = function(){
                    $("#imagePreview").attr("src", reader.result);
                    $("#uploadStatus").html('Unggahan file  sesuai ekstensi silahkan klik simpan file');
                    $("#buttonPreview").show();
                  
                }
                reader.readAsDataURL(file);
              }
    }
</script>