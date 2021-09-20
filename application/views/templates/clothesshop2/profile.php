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
<div class="container blog-inner">
    <div class="body">
  <center>
   
  <h2>" Profile <?php echo $n; ?> "</h2>
   <ons-list-item>
      <div class="left">
       <img src="<?php echo $ln; ?>" style="border-radius: 7%;width:85px; hight:85px;" />
      </div>
      <div class="center">
        <span class="list-item__title"><?php echo $e; ?></span><span class="list-item__subtitle">Point<font style="color:#21d684;font-weight: bold;"> <i class="zmdi zmdi-label"></i>  <?php echo $uinfo['point']; ?> </font> <br><br><p>
  <ons-button onClick="window.location.href = 'login/logout'">
       LOGOUT
       </ons-button> 
  </p></span>

      </div>
    </ons-list-item>
  
</center>
</div>
</div>