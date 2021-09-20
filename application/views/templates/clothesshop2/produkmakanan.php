<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" id="view-product">
    <div class="body">
  <tr><td width="100px"><img style='width:7%' src='<?= base_url('attachments/shop_images/kedai-online-tarakan-makanan.png')?>'></td><td width="300px"> <font style="font-size:23px"><b>Food & Snack</b></font></td>
</tr>
   <div class="row products">
	   <?php
  $load::getProducts($products);
				 ?><br>
			    </div> 
<br><br> 
</div></div>
