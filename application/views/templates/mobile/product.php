<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <br>
   
	<div class="toolbar"> 
 <div class="toolbar__center"><img style='width:7%' src='<?= base_url('attachments/shop_images/loundry24.png')?>'> &nbsp;
  Laundry Kiloan
  </div>
  </div><ons-card>
	   <?php
  $load::getProductsLoundry($productsloundry);
				 ?></ons-card><br>
				 	<div class="toolbar">
 <div class="toolbar__center">
 <img style='width:7%' src='<?= base_url('attachments/shop_images/loundrysatuan.png')?>'> &nbsp;  Laundry Satuan
  </div>
  </div><ons-card>
				 <?php
$load::getProductsLoundrySatuan($productsloundrysatuan);
  ?></ons-card><br> 
   	<div class="toolbar">
 <div class="toolbar__center">
  <img style='width:7%' src='<?= base_url('attachments/shop_images/kedai-online-tarakan-sepatudantas.png')?>'> &nbsp;  Loundry Tas & Sepatu
 </div>
  </div><ons-card>
				 <?php
$load::getProductsLoundryTas($productsloundrytas);
  ?>            
       </ons-card><br>       
<br><br><br>          
             <br><br> 
  </ons-page>
<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
      </ons-tabbar>
    </ons-bottom-toolbar<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
	 
       <button page="sfgdfsdf" class="tabbar__button" onClick="window.location.href = '<?= base_url('kedai-online-tarakan') ?>'">
    <div class="tabbar__icon" page="sfgdfsdf" >
      <ons-icon icon="md-store" size="30px" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Kedai</div>
    </button>
 
             <button class="tabbar__button" onClick="window.location.href = '<?= base_url('kedaionlinetarakan/informasiseputartarakan') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-notifications-active" style="color:#fe3824;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Info Paguntaka</div>
   </button>
  <button class="tabbar__button" onClick="window.parent.location.href = '<?= base_url('profile') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-face" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Saya</div>
  
  </button>
      </ons-tabbar>
    </ons-bottom-toolbar>