<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container blog-inner">
    <div class="body">
	 <div class="row bottom-30">
          <div class="text-content">
			<label> <?php /*
       
        if (isset($name)){
          echo $name;
        }elseif(isset($profileData['family_name'])){
           echo $profileData['email'];
        }else{
        	echo "NO";
        }
*/
        ?></label><center>
  	<h3><b>"</b>Selamat Datang<b>"</b><p> Login dulu Yah!</p> </h3>
<a href="<?php echo $loginURL;?>"><button class="btn bg-red"><i class="fa fa-google"></i> Pakai Gmail</button>
</a>
	<a href="<?=$authUrl?>"><button class="btn bg-red"><i class="fa fa-facebook"></i> Pakai Facebook</button></a>
</center>
</div>
</div>
<?php include 'bodyFooter.php' ?>
</div>
</div>
