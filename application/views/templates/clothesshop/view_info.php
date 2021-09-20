<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
<meta property="og:image"              content="https://www.kedaiolala.com/attachments/galeri/<?= $info['image']; ?>" />
</head>
<div class="container">
    <div class="body">
        <div class="row bottom-30">
            <div class="col-sm-14 left-col-archive">

            <div <?= $info['folder'] != null ? '' : '' ?>>
                
               <center>  <div class="product-image"> <img style="width:50%;" src="<?= base_url('/attachments/galeri/' . $info['image']) ?>" style="width:auto; height:auto;" data-num="0" class="img-responsive img-sl the-image pic-1" alt="<?= str_replace('"', "'", $info['title']) ?>">

               </div></center>

            </div>
            <?php
            if ($info['folder'] != null) {
                $dir = "attachments/galeri/" . $info['folder'] . '/';
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
                                        <img src="<?= base_url($dir . $file) ?>" data-num="<?= $i ?>" class="other-img-preview img-sl img-thumbnail the-image" alt="<?= str_replace('"', "'", $info['title']) ?>">

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
        <br>
                   
              <div class="detailjudul"><h6 style="color:#777"><b><i class="fa fa-calendar-o" aria-hidden="true"></i> <?= date("d M Y , H:i:s", $info['time']) ?></b></h6><p> <?= $info['title'] ?></p></div>
          
               
             
            
           <div id="description"><?= $info['description'] ?> <p> @ <?= $info['categorie_name'] ?> by <i class="fa fa-user" aria-hidden="true"></i> Ujang faisal</p> 
                    
        </div>
     
       
   
        <div class="filter-sidebar">
            <div class="title">
               <div class="sharethis-inline-share-buttons"></div>
            </div>
        </div>
       
            <div class="alert alert-info"><marquee scrolldelay="220" style="color:#222;font-weight:bold;">Gaes, Goy, Bro.. Nda bisa keluar rumah. Mau delivery bisa !!</marquee></div></div>
   
</div>
<?php include 'bodyFooter.php' ?>
</div>
</div>