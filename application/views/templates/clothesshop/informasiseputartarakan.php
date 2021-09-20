<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container blog-inner">
    <div class="body">
	    <?php if (count($sliderDepan) > 0) { ?>
            <div class="row row-of-slider">
                <div class="col-sm-8"><h4><i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i> &nbsp;
  <b>Informasi Tarakan</b>
  </h4>
                    <div id="home-slider">
<div class="row">
                    <?php
                    if (!empty($posts)) {
                        foreach ($posts as $post) {
                            ?>
                            <div class="col-md-6 blog-col">
                                <div class="thumbnail blog-list">
                                    <a href="<?= LANG_URL . '/baca/' . $post['url'] ?>" class="img-container">
                                        <img src="https://www.kedaiolala.com/attachments/galeri/<?= $post['image'] ?>" alt="<?= $post['title'] ?>">
                                    </a>
                                    <div class="caption">
                                        <h5>
                                            <?= character_limiter($post['title'], 50) ?>
                                        </h5>
                                        <small>
                                            <span>
                                                <i class="fa fa-clock-o"></i>
                                                <?= date('M d, y', $post['time']) ?>
                                            </span>
                                        </small>
                                        <p class="description"><?= character_limiter(strip_tags($post['description']), 100) ?></p>
                                        <a class="btn btn-blog cloth-bg-color pull-right" href="<?= LANG_URL . '/baca/' . $post['url'] ?>">
                                            <i class="fa fa-long-arrow-right"></i>
                                            <?= lang('read_mode') ?>
                                        </a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-info"><?= lang('no_posts') ?></div>
                    <?php } ?>
                </div>
                      
                    </div>
                   <!-- <h4 class="hidden-xs"><?= $article['name'] ?> <i class="fa fa-book" aria-hidden="true"></i></h4> -->
                </div>
				<div class="col-sm-4" align="center"><h4><font color="#152385">Mereka sudah <i class="fa fa-group" aria-hidden="true"></i> di kedai olala</font> </h4> 
			<div class="carousel slide" id="small_carousel" data-ride="carousel" data-interval="3800">
                       
                       <div class="carousel-inner" role="listbox">
                            <?php
                            $i = 0;
                            foreach ($al as $siswa) {
                                ?>
                                <div class="item <?= $i == 0 ? 'active' : '' ?>">
								
								<?php if(!$siswa->id_social){
									$ft = 'no-image.png';
									
								}else {
									$ft = 'es_cendol_ori.jpg';
								}
								?>
								
								<img src="<?= $siswa->id_social ?>" alt="" class="img-responsive" width="100px">
                              
	
                                        <h5><font color="red">
                                            
                                            <i class="fa fa-user" aria-hidden="true"></i>  <?= character_limiter($siswa->name, 100) ?>
                                           
                                        </h5>
                                        <div class="description">
                                             <b>Point : <?= $siswa->point ?></b></font>
                                        </div>
                                 
									
                             
                                     </div>
									<?php
                                $i++;
                            
							}
						echo 	"<h5>Selamat Menikmati</h5>";
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
 <?= $links_pagination ?>	      
		  </div>
		  </div>
             