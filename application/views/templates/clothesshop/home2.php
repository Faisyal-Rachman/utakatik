<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<ons-template id="home">
  <ons-page id="mainPage">
    <ons-toolbar class="toolbar--material">
     <div class="toolbar__left toolbar--material__left">
      
           <span class="toolbar-button toolbar-button--material">
    <i class="zmdi zmdi-favorite"></i>
    </span>
      
      </div>
      <div class="center toolbar__center toolbar--material__center" >
        Main
      </div>
	   
	<div class="toolbar__right toolbar--material__right">
     <span class="toolbar-button toolbar-button--material">
    <i class="zmdi zmdi-share"></i>
    </span>
    <span class="toolbar-button toolbar-button--material">
    <i class="zmdi zmdi-notifications"></i>
    </span>
</div>
    </ons-toolbar>
   
    <center>
	 
          <?php
            if (!empty($products)) {
                $load::getProducts($products);
            } else {
                ?>
                <script>
                    $(document).ready(function () {
                        ShowNotificator('alert-info', '<?= lang('no_results') ?>');
                    });
                </script>
                <?php
            }
            ?>
 	
		   </center>
<br><br>          
              
  </ons-page>
</ons-template >

<ons-template id="tags.html">
  <ons-toolbar>
    <div class="center">Tags</div>
  </ons-toolbar>

  <p style="padding-top: 100px; color: #999; text-align: center">Page Contents</p>
</ons-template>
