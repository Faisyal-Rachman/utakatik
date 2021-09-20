<div class="h-line"></div>
<div class="body-footer">
    <div class="row">
        <?php if ($footerAboutUs != '') { ?>
            <div class="col-sm-3">
               <p>Copyright 2019 - 2020</p>
                <p><img src="<?= base_url('attachments/shop_images/KEDAI_OLALA_ICONMAP_BESAR_BWH.png')?>" width="155"></p>
            </div>
        <?php } ?>
        <div class="col-sm-3">
            <h3><b>Link Partner</b></h3>
            <ul>
               
                    <li> <a href="http://www.sookawebtarakan.com" target="_blank">SOOKAWEBTARAKAN</a></li>
               
                    <li> <a href="http://diseperindakop.kaltaraprov.go.id" target="_blank">DISPERINDAKOP PROV</i></a></li>
              
                                 
            </ul>
        </div>
        <div class="col-sm-3">
            <h3><b><?= lang('newsletter') ?></b></h3>
            <ul>
                <li>
                    <div class="input-append newsletter-box text-center">
                        <form method="POST" id="subscribeForm">
                            <input type="text" class="full text-center" name="subscribeEmail" placeholder="<?= lang('email_address') ?>">
                            <button class="btn bg-red cloth-bg-color" onclick="checkEmailField()" type="button"> <?= lang('subscribe') ?> <i class="fa fa-long-arrow-right"></i></button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-sm-3">
            <h3><b><?= lang('contacts') ?></b></h3>
            <ul class="footer-icon">
                <?php if ($footerContactAddr != '') { ?>
                    <li>
                        <span class="pull-left"><i class="fa fa-map-marker"></i></span> 
                        <span class="pull-left f-cont-info"> <?= $footerContactAddr ?></span> 
                    </li>
                <?php }if ($footerContactPhone != '') { ?>
                    <li>
                        <span class="pull-left"><i class="fa fa-phone"></i></span> 
                        <span class="pull-left f-cont-info"> <?= $footerContactPhone ?></span> 
                    </li>
                <?php } if ($footerContactEmail != '') { ?>
                    <li>
                        <span class="pull-left"><i class="fa fa-envelope"></i></span> 
                        <span class="pull-left f-cont-info"><a href="mailto:<?= $footerContactEmail ?>"><?= $footerContactEmail ?></a></span>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>