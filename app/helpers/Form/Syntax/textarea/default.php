<?php 
use app\tatiyeNet;
?>
<div class="<?=$row['colom'];?>" style="margin-bottom: 80px;">
  <small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
  <input id="Input<?=$row['name'];?>"type="hidden" class="form-control" name="<?=$row['name'];?>" placeholder="<?=$row['placeholder'];?>"<?=$row['value'];?> >
   <div id="InArea<?=$row['name'];?>"><?=$row['file'];?></div>
  <small id="info_<?=$row['name'];?>"></small>
</div>


<script type="text/javascript">
/*
|--------------------------------------------------------------------------
| Initializes title 
|--------------------------------------------------------------------------
| Develover Tatiye.Net 2020
| @Date 
*/
$(document).ready(function(){
  $("#InArea<?=$row['name'];?>").keyup(function(){
     var dInput =  $("#InArea<?=$row['name'];?>").html();
     var res = dInput.replace('<div class="ql-editor" data-gramm="false" contenteditable="true" data-placeholder="Compose an epic...">', " ");  
     var res1 = res.replace('</div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>', " ");  
     $("#Input<?=$row['name'];?>").val(res1);
  
  });

  var quill2 = new Quill('#InArea<?=$row['name'];?>', {
  modules: {
    toolbar: [
      ['bold', 'italic'],
      ['link', 'blockquote', 'code-block', 'image'],
      [{ list: 'ordered' }, { list: 'bullet' }]
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow',

});
});
/*
|--------------------------------------------------------------------------
| AND title 
|--------------------------------------------------------------------------
*/
</script>