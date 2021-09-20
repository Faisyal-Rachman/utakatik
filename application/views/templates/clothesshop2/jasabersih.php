<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" id="view-product">
    <div class="body">
<tr><td width="100px"><img style='width:7%' src='<?= base_url('attachments/shop_images/kedai-online-tarakan-jasa-bersihkan-rumah-di-tarakan.png')?>'> &nbsp;
 <font style="font-size:23px"><b>Bersih Rumah (Peralatan Kedai Olala)</b></font> </td>
</tr>
 
	   <?php
  $load::getJasaBersih($jasabersih);
				 ?><br>
	
 <tr><td width="100px"><img style='width:7%' src='<?= base_url('attachments/shop_images/kedai-online-tarakan-jasa-bersihkan-rumah-di-tarakan.png')?>'> &nbsp;
 <font style="font-size:23px"><b> Bersih Rumah (Peralatan Pribadi) </b></font> 
  </td>
</tr>
	   <?php
  $load::getJasaBersihPribadi($jasabersihpribadi);
				 ?><br>
				 <br> 
  <br>       
<br><br><br>          
          </div>
		  </div>