<!DOCTYPE html>
<html lang="<?= MY_LANGUAGE_ABBR ?>">
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="<?= $description ?>" />
        <meta name="keywords" content="<?= $keywords ?>" />
        
        <title><?= $title ?></title>
        <meta property="og:url"                content="https://uta-atik.tech/baca/<?=isset($url) ?  

$url :  'array is not set.'; ?>" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="<?= $title ?>" />
<meta property="og:description"        content="<?= $description ?>" />
<meta property="og:image"              content="https://uta-atik.tech/attachments/galeri/<?=isset($image) ? $image :  'array is not set.';?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>" />
        <link href="<?= base_url('templatecss/bootstrap.min.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('templatecss/custom.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('cssloader/theme.css') ?>" rel="stylesheet" />
        <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?= base_url('loadlanguage/all.js') ?>"></script>
		   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.2/leaflet.css" />
        <?php if ($cookieLaw != false) { ?>
            <script type="text/javascript">
                window.cookieconsent_options = {"message": "<?= $cookieLaw['message'] ?>", "dismiss": "<?= $cookieLaw['button_text'] ?>", "learnMore": "<?= $cookieLaw['learn_more'] ?>", "link": "<?= $cookieLaw['link'] ?>", "theme": "<?= $cookieLaw['theme'] ?>"};
            </script>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
        <?php } ?>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		 <link href='<?php echo base_url () ?>manifest.json' rel='manifest'>
     <link href='<?php echo base_url () ?>manifest.webmanifest' rel='manifest'>
     <script src="<?php echo base_url () ?>pwabuilder-sw-register.js"></script>
     <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5eaa7befb704b50012abfb8a&product=inline-share-buttons' async='async'></script>
      <link href="<?php echo base_url () ?>assets/onsenui/css/ionicons/css/ionicons.min.css" type="text/css" rel="stylesheet" media="all">
  <link href="<?php echo base_url () ?>assets/onsenui/css/ionicons/css/ionicons.css" type="text/css" rel="stylesheet" media="all">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php
       if(isset($profileData['email'])){
          $cvote = $profileData['email'];
        } elseif(isset($fb['email'])){
           $cvote = $fb['email'];
        } else {
          $cvote = "Not";
        }
        ?>
    <style>
#map {
          
         height:35%;
         width:100%;
         padding:0px;
         margin:0px;
         z-index:1;              
      }  
        #distance {
             top: 8px;      
            z-index:2;   
            border-radius:20px;
            font-family: verdana;
            text-decoration: none;
            width:50%;
            height: 100%;
            resize:both;
            overflow: auto;            
          font-weight: bold;
            padding-left: 6px;
            color:#2979FF;
            text-shadow: 1px 2px 3px #fff;
          
            font-size: 13px;
            
        }   
</style>
 <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
  function highlightStar(obj,id) {
    removeHighlight(id);    
    $('#rate-'+id+' li').each(function(index) {
      $(this).addClass('highlight');
      if(index == $('#rate-'+id+' li').index(obj)) {
        return false; 
      }
    });
  }

  // event yang terjadi pada saat kita mengarahkan kursor kita ke sebuah object
  function removeHighlight(id) {
    $('#rate-'+id+' li').removeClass('selected');
    $('#rate-'+id+' li').removeClass('highlight');
  }

  function addRating(obj,id) {
    $('#rate-'+id+' li').each(function(index) {
      $(this).addClass('selected');
      $('#rate-'+id+' #rating').val((index+1));
      if(index == $('#rate-'+id+' li').index(obj)) {
        return false; 
      }
    });
    $.ajax({
    url: "<?php echo base_url('berita/tambah_rating'); ?>",
   data:'id='+id+'&rating='+$('#rate-'+id+' #rating').val()+'&user=<?php echo $cvote; ?>',
    type: "POST"
    });
  }

  function resetRating(id) {
    if($('#rate-'+id+' #rating').val() != 0) {
      $('#rate-'+id+' li').each(function(index) {
        $(this).addClass('selected');
        if((index+1) == $('#rate-'+id+' #rating').val()) {
          return false; 
        }
      });
    }
  } 
</script>    
  <script>
// This is the "Offline page" service worker

// Add this below content to your HTML page, or add the js file to your page at the very top to register service worker

// Check compatibility for the browser we're running this in
if ("serviceWorker" in navigator) {
  if (navigator.serviceWorker.controller) {
    console.log("[PWA Builder] active service worker found, no need to register");
  } else {
    // Register the service worker
    navigator.serviceWorker
      .register("pwabuilder-sw.js", {
        scope: "./"
      })
      .then(function (reg) {
        console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
      });
  }
}
      </script>
      <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "ab5428db-ba2b-4abe-9422-18e03a6ebc69",
    });
  });
</script>

<?php

$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

header('Location: https://tarakan.kedaiolala.com/');

?>
<script data-ad-client="ca-pub-5659516550997503" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          </head>
    <body>
        
   <header>
                    <?php if ($multiVendor == 1) { ?>
                        <div id="top-user-panel">
                            <div class="container">
                                <a href="<?= LANG_URL . '/vendor/register' ?>" class="btn btn-default"><?= lang('register_me') ?></a>
                                <form class="form-inline" method="POST" action="<?= LANG_URL . '/vendor/login' ?>">
                                    <div class="form-group">
                                        <input type="email" name="u_email" class="form-control" placeholder="<?= lang('email') ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="u_password" class="form-control" placeholder="<?= lang('password') ?>">
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember_me"><?= lang('remember_me') ?></label>
                                    </div>
                                    <button type="submit" name="login" class="btn btn-default"><?= lang('u_login') ?></button>
                                </form> 
                            </div>
                        </div>
                    <?php } ?>
                   
                    <div class="container">
                        <div class="row logo-and-search">
                            <div class="col-sm-5 logo-col">
                                <a href="<?= base_url() ?>">
                                    <img src="<?= base_url('attachments/site_logo/' . $sitelogo) ?>" class="site-logo" alt="<?= $_SERVER['HTTP_HOST'] ?>">
                                </a>
                            </div>
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="bag-info">
                                            <img src="<?= base_url('template/imgs/white-bag.png') ?>" alt="Search" style="margin-left:50px;">
                                            <a class="my-basket dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                <?= lang('your_basket') ?>
                                                <span class="sum-scope">
                                                    (<span class="sumOfItems tabbar__badge notification"><?= $cartItems['array'] == 0 ? 0 : $sumOfItems ?></span>)
                                                </span>
                                                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right dropdown-cart" role="menu">
                                                <?= $load::getCartItems($cartItems) ?>
                                            </ul>
                                        </div>
                                    </div>
									
                                   <div class="col-sm-7">
                                        <form method="GET" id="bigger-search" class="search" action="<?= LANG_URL ?>">
                                            <div class="input-group">
                                                <input type="text" id="search_in_title" value="<?= isset($_GET['search_in_title']) ? $_GET['search_in_title'] : '' ?>" class="form-control" placeholder="<?= lang('search_for') ?>...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-red cloth-bg-color" onclick="submitForm()" type="button">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </button>
                                                </span>
                                                <div class="dropdown">
                                                    <a class="advanced-search-btn dropdown-toggle" href="javascript:void(0);" id="dropdownsearch" data-toggle="dropdown">
                                                        <i class="fa fa-2x fa-caret-down cloth-color" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right advanced-search-menu" role="menu" aria-labelledby="dropdownsearch">
                                                        <input type="hidden" name="category" value="<?= isset($_GET['category']) ? $_GET['category'] : '' ?>">
                                                        <input type="hidden" name="in_stock" value="<?= isset($_GET['in_stock']) ? $_GET['in_stock'] : '' ?>">
                                                        <input type="hidden" name="search_in_title" value="<?= isset($_GET['search_in_title']) ? $_GET['search_in_title'] : '' ?>">
                                                        <input type="hidden" name="order_new" value="<?= isset($_GET['order_new']) ? $_GET['order_new'] : '' ?>">
                                                        <input type="hidden" name="order_price" value="<?= isset($_GET['order_price']) ? $_GET['order_price'] : '' ?>">
                                                        <input type="hidden" name="order_procurement" value="<?= isset($_GET['order_procurement']) ? $_GET['order_procurement'] : '' ?>">
                                                        <input type="hidden" name="brand_id" value="<?= isset($_GET['brand_id']) ? $_GET['brand_id'] : '' ?>">
                                                      
                                                        <div class="row">
                                                                                                         
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="search_in_body"><?= lang('search_by_keyword_body') ?></label>
                                                            <input class="form-control" value="<?= isset($_GET['search_in_body']) ? $_GET['search_in_body'] : '' ?>" name="search_in_body" id="search_in_body" type="text" />
                                                        </div>
                                                       
                                                        <button type="submit" class="btn btn-inner-search cloth-bg-color">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                        <a class="btn btn-default" id="clear-form" href="javascript:void(0);"><?= lang('clear_form') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar cloth">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <?php if ($naviText != null) { ?>
                                    <a class="navbar-brand visible-xs" href="<?= base_url() ?>"><?= $naviText ?></a>
                                <?php } ?>
                            </div>
			
 <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li<?= uri_string() == '' || uri_string() == MY_LANGUAGE_ABBR ? ' class="active"' : '' ?>><a href="<?= LANG_URL ?>"><i class="fa fa-desktop fa-lg" aria-hidden="true"></i> <?= lang('home') ?></a></li>
                                     <li<?= uri_string() == 'kedaionlinetarakan/informasiseputartarakan' || uri_string() == MY_LANGUAGE_ABBR . 'kedaionlinetarakan/informasiseputartarakan' ? ' class="active"' : '' ?>><a href="<?= LANG_URL . '/kedaionlinetarakan/informasiseputartarakan' ?>"><i class="fa fa-microchip fa-lg" aria-hidden="true"></i> POJOK TECHNO</a></li>  
									  <li<?= uri_string() == 'contacts' || uri_string() == MY_LANGUAGE_ABBR . '/contacts' ? ' class="active"' : '' ?>><a href="<?= LANG_URL . '/contacts' ?>"><i class="fa fa-home" aria-hidden="true"></i> BANTUAN IT SUPPORT TARAKAN </a></li>
                       <?php 
                     //  var_dump($_SESSION);
                       if(isset($_SESSION['fb_access_token'])){
                           $session = $_SESSION['fb_access_token'];
                       }elseif($session = $this->session->userdata('userProfile')){
                           $session = $this->session->userdata('userProfile');
                        }else{
                       $session = NULL;
                       } ?>
                      
					   <?php
					   if(isset($session)){?>
					   <li<?= uri_string() == 'contacts' || uri_string() == MY_LANGUAGE_ABBR . '/profile' ? ' class="active"' : '' ?>><a href="<?= LANG_URL . '/profile' ?>">Point <i class="fa fa-id-card" aria-hidden="true"></i></a></li>
					   
					   <?php }?>
 
                                </ul > 
							
									
								<ul style="list-style:none"; class="social">
                <?php if ($footerSocialFacebook != '') { ?>
                    <li> <a href="<?= $footerSocialFacebook ?>"><i class="fa fa-facebook"></i></a></li>
                <?php } if ($footerSocialTwitter != '') { ?>
                    <li> <a href="<?= $footerSocialTwitter ?>"><i class="fa fa-twitter"></i></a></li>
                <?php } if ($footerSocialInstagram != '') { ?>
                    <li> <a href="<?= $footerSocialInstagram ?>"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
            </ul>
                            </div>
                        </div>
                    </nav>
                </header>