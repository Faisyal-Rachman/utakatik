<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" id="view-product">
    <div class="body">
        <div class="row">
            <div class="col-sm-4">
                <div <?= $galeri['folder'] != null ? 'style="margin-bottom:20px;"' : '' ?>>
                    <img src="<?= base_url('/attachments/galeri/' . $galeri['image']) ?>" style="width:auto; height:auto;" data-num="0" class="other-img-preview img-responsive img-sl the-image" alt="Klik foto untuk detail gambar"> 
					.: Klik gambar preview :: 
                </div>
                <?php
                if ($galeri['folder'] != null) {
                    $dir = "attachments/galeri/" . $galeri['folder'] . '/';
                    ?>
                    <div class="row">
                        <?php
                        if (is_dir($dir)) {
                            if ($dh = opendir($dir)) {
                                $i = 1;
                                while (($file = readdir($dh)) !== false) {
                                    if (is_file($dir . $file)) {
                                        ?>
                                        <div class="col-xs-4 col-sm-6 col-md-4 text-center">
                                            <img src="<?= base_url($dir . $file) ?>" 
											data-num="<?= $i ?>" class="other-img-preview img-sl img-thumbnail the-image">
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                }
                                closedir($dh);
                            }
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-sm-8">
                <h1><?= $galeri['title'] ?></h1>
                          
                <?php if ($publicDateAdded == 1) { ?>
                    <div class="row row-info">
                        <div class="col-sm-6"><b><?= lang('added_on') ?>:</b></div>
                        <div class="col-sm-6"><?= date('m.d.Y', $galeri['time']) ?></div>
                        <div class="col-sm-12 border-bottom"></div>
                    </div>
                <?php } ?>
                <div class="row row-info">
                 
                    <div class="col-sm-6">
                        <a class="go-category btn-blue-round" data-categorie-id="<?= $galeri['galeri_categorie'] ?>">
                            <?= $galeri['categorie_name'] ?>
                        </a>
                    </div>
                    <div class="col-sm-12 border-bottom">

                    </div>
                </div>
     
              
                <div id="description">
                    <?= $galeri['description'] ?>
                </div>
            </div>
        </div>
        <div class="row products orders-from-category" id="products-side">
            <div class="filter-sidebar">
                <div class="title cloth-bg-color">
                    <span>Galeri kegiatan lain </span>
                </div>
            </div>
            <?php
            if (!empty($sameCagegoryProducts)) {
                $load::getsGaleri($sameCagegoryProducts, 'col-sm-4 col-md-3', false);
            } else {
                ?>
                <div class="alert alert-info"><?= lang('no_same_category_products') ?></div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<div id="modalImagePreview" class="modal">
    <div class="image-preview-container">
        <div class="modal-content">
            <div class="inner-prev-container">
                <img id="img01" alt="">
                <span class="close">&times;</span>
                <span class="img-series"></span>
            </div>
        </div>
        <a href="javascript:void(0);" class="inner-next"></a>
        <a href="javascript:void(0);" class="inner-prev"></a>
    </div>
    <div id="caption"> <?= $galeri['description'] ?></div>
</div>
<script src="<?= base_url('assets/js/image-preveiw.js') ?>"></script>