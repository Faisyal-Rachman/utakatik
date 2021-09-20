<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="body">
<!-- <h3 class="part-label"><?= lang('Galeri') ?></h3> --> 
        <div class="row products">
            <?php
            if (!empty($galeri)) {
                $load::getsGaleri($galeri, 'col-sm-4 col-md-3', false);
				
            } else {
                ?>
                <div class="col-xs-12">
                    <div class="alert alert-danger"><?= lang('no_products') ?></div>
                </div>
            <?php } ?>
        </div>
    
        <?= $links_pagination ?>
        <?php include 'bodyFooter.php' ?>
    </div></div>