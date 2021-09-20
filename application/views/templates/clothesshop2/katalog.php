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
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
<div class="container" id="contacts">
    <div class="body">
        <div class="jumbotron jumbotron-sm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <h1 class="h1">
                            Katalog<small>Hasil produksi </small></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
      
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
                <div class="alert alert-info"><?= lang('no_sub_categories') ?></div>
            <?php } ?>
			  <div class="h-line"></div>
       <!-- <?php if ($showBrands == 1) { ?>
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
        <?php } ?>-->
        </div>
            </div>
            <div class="col-md-4">
                <form>
                    <legend><i class="fa fa-info" aria-hidden="true"></i> <?= lang('our_office') ?></legend>
                    <address>
                        <?= $contactsPage ?>
                    </address>
                </form>
            </div>
        </div>
        <?php if (trim($googleApi) != null && trim($googleMaps) != null) { ?>
            <div id="map"></div>
            <?php $coordinates = explode(',', $googleMaps); ?>
            <script src="https://maps.googleapis.com/maps/api/js?key=<?= $googleApi ?>"></script>
            <script>
                function initialize() {
                    var myLatlng = new google.maps.LatLng(<?= $coordinates[0] ?>, <?= $coordinates[1] ?>);
                    var mapOptions = {
                        zoom: 10,
                        center: myLatlng
                    }
                    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        title: "Here we are!"
                    });
                    marker.setMap(map);
                }
                google.maps.event.addDomListener(window, 'load', initialize);
            </script>
        <?php } ?>
        <div class="bottom-30"></div>
        <?php include 'bodyFooter.php' ?>
    </div>
</div>