<?php 
use app\tatiye;
?>
<div class="<?=$row['colom'];?>">
<small id="<?=$row['name'];?>" class="<?=$row['label'];?>"><?=$row['title'];?></small>
<div class="input-group mg-b-1">

  <input type="password" id="oauth_pass<?=$row['name'];?>" class="form-control"name="<?=$row['name'];?>" placeholder="Masukan <?=$row['title'];?>" <?=$row['value'];?> aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete='off'>
    <div class="input-group-append">
    <span class="input-group-text" id="oauth_pws<?=$row['name'];?>"onclick="oauthpass<?=$row['name'];?>()"><i class="feat feat-eye"></i></span>
  </div>     
</div>
   <small id="info_<?=$row['name'];?>"></small>
</div>
   

<script type="text/javascript">
    function oauthpass<?=$row['name'];?>(){
      var x = document.getElementById('oauth_pass<?=$row['name'];?>').type;

      if (x == 'password')
      {
          document.getElementById('oauth_pass<?=$row['name'];?>').type = 'text';
          document.getElementById('oauth_pws<?=$row['name'];?>').innerHTML = '<i class="icon-feather-eye"></i>';
      }
      else
      {
          document.getElementById('oauth_pass<?=$row['name'];?>').type = 'password';
          document.getElementById('oauth_pws<?=$row['name'];?>').innerHTML = '<i class="icon-feather-eye-off"></i>';
      }
   }

</script>