<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" id="view-product">
    <div class="body">
  <tr><td width="100px">
<img style='width:7%' src='<?= base_url('attachments/shop_images/loundry24.png')?>'></td><td width="300px"> <font style="font-size:23px"><b>Loundry Kiloan</b></font>
</td>
</tr>
	   <?php
  $load::getProductsLoundry($productsloundry);
				 ?><br>
				 	
  <tr><td width="100px">
 <img style='width:7%' src='<?= base_url('attachments/shop_images/loundrysatuan.png')?>'> <font style="font-size:23px"><b>Loundry Satuan</b></font>
</td>
</tr>
 <?php
$load::getProductsLoundrySatuan($productsloundrysatuan);
  ?><br> 
   <tr><td width="100px">
  <img style='width:7%' src='<?= base_url('attachments/shop_images/kedai-online-tarakan-sepatudantas.png')?>'> &nbsp;  <font style="font-size:23px"><b>Loundry Tas & Sepatu</b></font>
 </td>
</tr>
				 <?php
$load::getProductsLoundryTas($productsloundrytas);
  ?>            
            
<br><br><br>          
         
 </div>
 </div>