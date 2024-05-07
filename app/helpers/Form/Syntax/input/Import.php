<?php 
use app\tatiye;
?>
<div class="<?=$row['colom_group'];?>">
  <div class="card-body pd-t-15 pb-10px mb-10px"style="border: 1px solid #c0ccda;">
        <div class="media">
           <label  for="importPhoto">
          <div class="avatar">
            <img id="imagePreview"src="https://upload.wikimedia.org/wikipedia/commons/0/0c/Microsoft_Office_logo_%282013%E2%80%932019%29.svg" class="rounded-circle1" alt="">
          </div>
            <input style="display:none;" type="file" name="filename" id="importPhoto"class="none" onchange="imgPreviewDoc(this);"/>
          </label>
          <div class="media-body mg-l-15">
            <h6 class="tx-13 mg-b-2"id="<?=$row['name'];?>">Informasi Ambil file </h6>
            <p class="tx-color-03 tx-12 mg-b-1"id="uploadStatus">Klik di bagian file samping kiri Anda</p>
            <p class="tx-color-03 tx-11 mg-b-3"id="info_<?=$row['name'];?>"></p>
          </div><!-- media-body -->
        </div><!-- media -->
      </div>
</div>
<script type="text/javascript">
  function imgPreviewDoc(input){

        var file = $("input[type=file]").get(0).files[0];
          var fileName =file.name;
          var fileType = file.type;
              var allowedTypes = [
              'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 
              'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
              'application/vnd.openxmlformats-officedocument.presentationml.presentation',
              'application/pdf',
              'text/csv',
              'vnd.ms-excel',
              ];
              // $("#nugi").html(fileType);
              if(!allowedTypes.includes(fileType)){
                  var informasi=`
                       Ekstensi :DOCX/PDF/EXCEL/CSV/PPTX
                `;
                 $("#uploadStatus").html(informasi);
                 $("#imagePreview").attr("src", 'https://upload.wikimedia.org/wikipedia/commons/0/0c/Microsoft_Office_logo_%282013%E2%80%932019%29.svg');
                 $("#buttonPreview").hide();
              } else {
                    var mytype=fileType.split('/');
                       if (mytype[1]=='vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                           var myIcon='https://img.freepik.com/free-icon/excel_318-566085.jpg?t=st=1684554657~exp=1684555257~hmac=35f1474c1fc634a03cf94f9f5b593952cc9bf389800a3dd2ee12f124572bd0d7';
                       
                       } else if (mytype[1]=='vnd.openxmlformats-officedocument.wordprocessingml.document') {
                           var myIcon='https://img.freepik.com/free-icon/word_318-674258.jpg?t=st=1684554753~exp=1684555353~hmac=f31980d142794e5755c2fda872ad02e9e8fa3ebbfb2d5146c047df6bf693d2b1';
                       
                       } else if (mytype[1]=='pdf') {
                           var myIcon='https://cdn-icons-png.flaticon.com/512/179/179483.png?w=826&t=st=1684554095~exp=1684554695~hmac=bd538cc51db3e5ccee1a82e7502db67b19ef5cacda0f02b57ca852e463c3233a';
                       
                       } else if (mytype[1]=='vnd.openxmlformats-officedocument.presentationml.presentation') {
                           var myIcon='https://img.freepik.com/free-icon/powerpoint_318-674249.jpg?t=st=1684554865~exp=1684555465~hmac=42d9fca49781f8b42b85c08585ed0bd3ae8822eaa5250518c9ced60e0ea5e7d2';
                       
                       } else if (mytype[1]=='csv') {
                            var myIcon='https://img.freepik.com/free-icon/excel_318-566085.jpg?t=st=1684554657~exp=1684555257~hmac=35f1474c1fc634a03cf94f9f5b593952cc9bf389800a3dd2ee12f124572bd0d7';
                       
                       } else if (mytype[1]=='vnd.oasis.opendocument.spreadsheet') {
                            var myIcon='https://img.freepik.com/free-icon/excel_318-566085.jpg?t=st=1684554657~exp=1684555257~hmac=35f1474c1fc634a03cf94f9f5b593952cc9bf389800a3dd2ee12f124572bd0d7';
                       

                       } else {
                           var myIcon='https://upload.wikimedia.org/wikipedia/commons/0/0c/Microsoft_Office_logo_%282013%E2%80%932019%29.svg';
                       }
                    $("#imagePreview").attr("src", myIcon);
                    $("#uploadStatus").html('Unggahan file  sesuai ekstensi silahkan klik simpan file');
                    $("#buttonPreview").show();
              
              }

    }
</script>