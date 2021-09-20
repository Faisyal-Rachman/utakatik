<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$arrCategories = array();
foreach ($all_categories as $categorie) {
    if (isset($_GET['category']) && is_numeric($_GET['category']) && $_GET['category'] == $categorie['sub_for']) {
        $arrCategories[] = $categorie;
    }
    if (!isset($_GET['category']) || $_GET['category'] == '') {
        if ($categorie['sub_for'] == 0) {
            $arrCategories[] = $categorie;
        }
    }
}
?>
<div class="container">
    <div class="body">
        <?php if (count($sliderDepan) > 0) { ?>
            <div class="row row-of-slider">
                <div class="col-sm-8">
                    <div id="home-slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php
                            $i = 0;
                            while ($i < count($sliderDepan)) {
                                ?>
                                <li data-target="#home-slider" data-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></li>
                                <?php
                                $i++;
                            }
                            ?>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <?php
                            $i = 0;
                            foreach ($sliderDepan as $article) {
                                ?>
                                <div class="item <?= $i == 0 ? 'active' : '' ?>">
                                   
                                    <img src="<?= base_url('attachments/slider/' . $article['flag']) ?>" alt="" class="img-responsive">
									 <div class="absolute-texts">
                                        <span class="slidetext" color="white">
                                            
                                               .: <?= character_limiter($article['abbr'], 100) ?>
                                           
                                       </span> 
                                        <div class="description">
                                            <span class="slidetextsub" color="white"> <?= character_limiter(strip_tags($article['name']), 250) ?> </span> 
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $i++;
                            }
                            ?>
                        </div>
                        <div class="controls">
                            <a class="left carousel-control" href="#home-slider" role="button" data-slide="prev">
                                <i class="fa fa-2x fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a class="right carousel-control" href="#home-slider" role="button" data-slide="next">
                                <i class="fa fa-2x fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                   <!-- <h4 class="hidden-xs"><?= $article['name'] ?> <i class="fa fa-book" aria-hidden="true"></i></h4> -->
                </div>
				<div class="col-sm-4" align="center"><h3><font color="#152385">Kado <i class="fa fa-gift" aria-hidden="true"></i> dari Kawan.</font> </h3> 
			<div class="carousel slide" id="small_carousel" data-ride="carousel" data-interval="3800">
                       
                       <div class="carousel-inner" role="listbox">
                            <?php
                            $i = 0;
                            foreach ($al as $siswa) {
                                ?>
                                <div class="item <?= $i == 0 ? 'active' : '' ?>">
								
								<?php if(!$siswa->foto){
									$ft = 'no-image.png';
									
								}else {
									$ft = 'es_cendol_ori.jpg';
								}
								?>
								<img src="<?= base_url('attachments/userimage/' . $ft) ?>" alt="" class="img-responsive" width="100px">
                              
	
                                        <h5><font color="red">
                                            
                                            <i class="fa fa-birthday-cake" aria-hidden="true"></i>  <?= character_limiter($siswa->nama, 100) ?>
                                           
                                        </font></h5>
                                        <div class="description">
                                             (<?= $i+1 ?>.) <?= character_limiter(strip_tags($siswa->tgl_lahir), 150) ?>
                                        </div>
                                 
									
                             
                                     </div>
									<?php
                                $i++;
                            
							}
						echo 	"<h5>Hingga bulan depan, ada " . $i . " kawan Ultah. </h5>";
                            ?>
                        </div>
                        <div class="controls">
                             <a class="left carousel-control" href="#small_carousel" role="button" data-slide="prev">
                    <i class="fa fa-5x fa-angle-left" aria-hidden="true"></i>
                </a>
                <a class="right carousel-control" href="#small_carousel" role="button" data-slide="next">
                    <i class="fa fa-5x fa-angle-right" aria-hidden="true"></i>
                </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="h-line"></div>
      <!-- <h3 class="part-label"><?= lang('categories') ?></h3>-->
        <?php if (isset($_GET['category']) && $_GET['category'] != '') { ?>
            <a href="javascript:void(0);" class="clear-filter" data-type-clear="category" data-toggle="tooltip" data-placement="top" title="<?= lang('clear_the_filter') ?>">
                <span class="hidden-xs">
                    <?= lang('clear_the_filter') ?>
                </span>
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        <?php } ?>
        <a href="javascript:void(0)" id="show-xs-nav" class="visible-xs">
            <span class="show-sp"><?= lang('showXsNav') ?><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i></span>
            <span class="hidde-sp"><?= lang('hideXsNav') ?><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></span>
        </a>
        <div class="categories">
            <?php if (!empty($arrCategories)) { ?>
                <ul class="list">
                    <?php
                    foreach ($arrCategories as $categorie) {
                        ?>
                        <li>
                            <a href="javascript:void(0);" data-categorie-id="<?= $categorie['id'] ?>" class="go-category left-side <?= isset($_GET['category']) && $_GET['category'] == $categorie['id'] ? 'selected' : '' ?>">
                                <span><?= $categorie['name'] ?></span>
                                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            <?php } else { ?>
                <div class="alert alert-info">Belum ada subkategori</div>
            <?php } ?>
        </div>
        <div class="h-line"></div>
        <?php if ($showBrands == 1) { ?>
            <h3 class="part-label"><?= lang('brands') ?></h3>
            <?php if (isset($_GET['brand_id']) && $_GET['brand_id'] != '') { ?>
                <a href="javascript:void(0);" class="clear-filter" data-type-clear="brand_id" data-toggle="tooltip" data-placement="right" title="<?= lang('clear_the_filter') ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
            <?php } ?>
            <div class="brands">
                <ul class="list">
                    <?php foreach ($brands as $brand) { ?>
                        <li>
                            <a href="javascript:void(0);" data-brand-id="<?= $brand['id'] ?>" class="brand <?= isset($_GET['brand_id']) && $_GET['brand_id'] == $brand['id'] ? 'selected' : '' ?>">
                                <span><?= $brand['name'] ?></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="h-line"></div>
        <?php } ?>
        <div class="h-line"></div>
        <?php if ($showBrands == 1) { ?>
            <h3 class="part-label"><?= lang('brands') ?></h3>
            <?php if (isset($_GET['brand_id']) && $_GET['brand_id'] != '') { ?>
                <a href="javascript:void(0);" class="clear-filter" data-type-clear="brand_id" data-toggle="tooltip" data-placement="right" title="<?= lang('clear_the_filter') ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
            <?php } ?>
            <div class="brands">
                <ul class="list">
                    <?php foreach ($brands as $brand) { ?>
                        <li>
                            <a href="javascript:void(0);" data-brand-id="<?= $brand['id'] ?>" class="brand <?= isset($_GET['brand_id']) && $_GET['brand_id'] == $brand['id'] ? 'selected' : '' ?>">
                                <span><?= $brand['name'] ?></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="h-line"></div>
        <?php } ?>
        <h3 class="part-label">Produk kami</h3>
        <div class="row products">
            <?php
            if (!empty($products)) {
                $load::getProducts($products, 'col-sm-4 col-md-3', false);
				
            } else {
                ?>
                <div class="col-xs-12">
                    <div class="alert alert-danger">Belum ada produk</div>
                </div>
            <?php } ?>
        </div>
        <?= $links_pagination ?>
        <?php include 'bodyFooter.php' ?>
    </div>