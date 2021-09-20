<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" id="view-product">
    <div class="body">
  <tr><td width="100px"> 
	<img style='width:7%' src='<?= base_url('attachments/shop_images/kedai-online-tarakan-servis-komputer-laptop.png')?>'> <font style="font-size:23px"><b>
  Services & Repair </b></font>
  </td>
</tr>
	   <?php
  $load::getServices($services);
				 ?>
	
				 <br> 
  <br>       
<br><br>
</div>
</div>