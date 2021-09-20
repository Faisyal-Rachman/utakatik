<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <br>
   <ons-row>
    <center>
        
           <div class="col-sm-8">
 	  <div id="home-slider">
                      
            
                           
                                <div class="item">
                                   
                                    <img style="border-radius: 15px 15px 15px 15px" src="<?= base_url('attachments/slider/kedai-online-di-tarakan.jpg')?>" alt="" class="img-responsive">
            
                                </div>
                              
                        </div>
                    
                    </div>
        

              
          <?php

                $load::getOlala($products);
          
            ?>
            
                   
	  <div class="col-sm-8">
                    <div id="home-slider" data-ride="carousel">
                      
                        <div class="carousel-inner" role="listbox">
                            <?php
                            $i = 0;
                            foreach ($sliderDepan as $article) {
                                ?>
                                <div class="item <?= $i == 0 ? 'active' : '' ?>">
                                   
                                    <img style="border-radius: 15px 15px 15px 15px" src="<?= base_url('attachments/slider/' . $article['flag']) ?>" alt="" class="img-responsive">
            
                                </div>
                                <?php
                                $i++;
                            }
                            ?>
                        </div>
                    
                    </div>
                   <!-- <h4 class="hidden-xs"><?= $article['name'] ?> <i class="fa fa-book" aria-hidden="true"></i></h4> -->
                </div>
          
		   </center>
     </ons-row>
<br><br><br><br>
  </ons-page>
<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
	 
      
  
      </ons-tabbar>
    </ons-bottom-toolbar<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
	 
       <button page="sfgdfsdf" class="tabbar__button" onClick="window.location.href = '<?= base_url('kedai-online-tarakan') ?>'">
    <div class="tabbar__icon" page="sfgdfsdf" >
      <ons-icon icon="md-store" size="30px" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Kedai</div>
    </button>
 
             <button class="tabbar__button" onClick="window.location.href = '<?= base_url('kedaionlinetarakan/informasiseputartarakan') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-notifications-active" style="color:#fe3824;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Pojok Kedai</div>
   </button>
  <button class="tabbar__button" onClick="window.parent.location.href = '<?= base_url('profile') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-face" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Saya</div>
  
  </button>
      </ons-tabbar>
    </ons-bottom-toolbar>