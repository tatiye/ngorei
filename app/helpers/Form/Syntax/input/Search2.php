<?php 
use app\tatiye;
?>
      <div   class="filemgr-content-header pl-20px">
           <span class="pl-20px"><i class="feat feat-search mr-10px"></i></span>
          <div class="search-form pl-10px" style="width:70%">
            <input  id="input<?=$row['name'];?>" type="text"  class="form-control" placeholder="Cari file dan folder">
          </div>
           <nav class="nav d-none d-sm-flex mg-l-auto mr-10px">
            <a href="javascript:void(0);" class="nav-link"><i class ="feat feat-list"></i></a>
            <a href="javascript:void(0);" class="nav-link"><i class ="feat feat-alert-circle"></i></a>
            <a href="javascript:void(0);" class="nav-link"><i class ="feat feat-settings"></i></a>
          </nav>
        </div><!-- filemgr-content-header -->

 <script type="module">
       const keywords = document.getElementById('input<?=$row['name'];?>');
       keywords.addEventListener('keyup', () => {
         useKeywords(keywords.value);
    });
</script>