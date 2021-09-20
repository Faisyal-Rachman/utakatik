<?php 
if (isset($profileData['family_name'])){
  $n = $profileData['name'];
  $ln = $profileData['picture'];
  $e = $profileData['email'];
} else{
   $n = $name;
  $ln = $gambar;
  $e = $email;
}
?>

<ons-card>
  <center>
   
  <h2>" Profile <?php echo $n; ?> "</h2>
   <ons-list-item>
      <div class="left">
       <img src="<?php echo $ln; ?>" style="border-radius: 7%;width:85px; hight:85px;" />
      </div>
      <div class="center">
        <span class="list-item__title"><?php echo $e; ?></span><span class="list-item__subtitle">Point<font style="color:#21d684;font-weight: bold;"> <i class="zmdi zmdi-label"></i> </font> <br><br><p>
  <ons-button onClick="window.location.href = 'login/logout'">
       LOGOUT
       </ons-button> 
  </p></span>

      </div>
    </ons-list-item>
  
</center>
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