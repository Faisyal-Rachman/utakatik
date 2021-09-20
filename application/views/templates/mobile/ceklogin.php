<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ons-card style="text-align:center">
	<ons-row>
  <ons-col>  <label> <?php /*
       
        if (isset($name)){
          echo $name;
        }elseif(isset($profileData['family_name'])){
           echo $profileData['email'];
        }else{
        	echo "NO";
        }
*/
        ?></label><br>
  	<h3><b>"</b>Selamat Datang<b>"</b><p> Login dulu Yah!</p> </h3>
<a href="<?php echo $loginURL;?>"><ons-button><i class="zmdi zmdi-email zmdi-hc-lg"></i> Pakai Gmail</ons-button>
</a>
	<a href="<?=$authUrl?>"><ons-button><i class="zmdi zmdi-facebook-box zmdi-hc-lg"></i> Pakai Facebook</ons-button></a>

</ons-row>
  </ons-col>
</ons-card>
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
    <div class="tabbar__label">Pojok Kedai</div>
   </button>
  <button class="tabbar__button" onClick="window.parent.location.href = '<?= base_url('profile') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-face" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Saya</div>
  
  </button>
      </ons-tabbar>
    </ons-bottom-toolbar>