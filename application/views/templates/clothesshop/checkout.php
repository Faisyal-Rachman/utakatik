<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.2/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://www.mapwizard.eu/articles/js/turf_min.js"></script>
<script src="https://www.mapwizard.eu/articles/js/turf_dist.min.js"></script>
<span class="content" id="checkout-page">    

           <?php
		  // var_dump($profileData);
    if ($cartItems['array'] != null) {
        ?>
                        <form method="POST" id="goOrder">
                
                    <?php
                    if ($this->session->flashdata('submit_error')) {
                        ?>
             
                            <?php 
                                foreach ($this->session->flashdata('submit_error') as $error) {
                                echo "<script>alert ('$error'); window.location.href = 'checkout';</script>";
                            }
                             ?>
                       
                        <?php
                    }
                    ?>
                   
                  <hr>
                        <select class="payment-type" name="payment_type">
                            <?php 
                           
                             $awal = $datauser['point']; 
                            $totalharga = $cartItems['finalSum'];
                            $point = 180 * $awal;
                            $totalPoint = $cartItems['finalPoint'] + $awal;
                            $pakaiPoint = $awal - $cartItems['finalPoint'];

                            if ($cashondelivery_visibility == 1 && $point >= $totalharga) { ?>
                     <option value="cashOnDelivery"><?= lang('cash_on_delivery') ?> </option>
<option value="pointOnDelivery">Use Point</option>
                            <?php }elseif($cashondelivery_visibility == 1){?>
  <option value="cashOnDelivery"><?= lang('cash_on_delivery') ?> </option>
 <input id="pointInput" class="form-control" name="pointakhir" value="<?= $totalPoint; ?>" type="hidden">
                    
                           <?php }else{
                             echo '<option value="cashOnDelivery">NO </option>';
                           } ?>
                        </select>
      
<?php 
if (isset($profileData['family_name'])){
  $n = $profileData['name'];
  $ln = $profileData['name'];
  $e = $profileData['email'];
} else{
   $n = $name;
  $ln = $gambar;
  $e = $email;
}
// echo $n;
?>


                      <input id="pointInput" class="form-control" name="pointakhir" value="<?= $totalPoint; ?>" type="hidden">
                       <input id="pointInput" class="form-control" name="pakaiPoint" value="<?= $pakaiPoint; ?>" type="hidden">
                           <input id="firstNameInput" class="form-control" name="first_name" value="<?php echo $n; ?>" type="hidden" placeholder="<?php echo $n; ?>">
                     
                            <input id="lastNameInput" class="form-control" name="last_name" value="<?php echo $ln; ?>" type="hidden" placeholder="<?php echo $ln; ?>">
                     
                           
                            <input id="emailAddressInput" class="form-control" name="email" value="<?php echo $e; ?>" type="hidden" placeholder="<?php echo $e; ?>">
                      
                       <input id="phoneInput" placeholder="Nomor Handphone *" class="form-control" name="phone" type="hidden">

                            <input id="cityInput" class="form-control" name="city" value="<?= @$_POST['city'] ?>" type="hidden" placeholder="<?= lang('city') ?>">
                      
                                               
                            <input id="postInput" class="form-control" name="post_code" type="hidden">
                       
                        <input id="notesInput" class="form-control" name="notes" rows="3" type="hidden">
                   
                    <?php if ($codeDiscounts == 1) { ?>
                        <div class="discount">
                            <label><?= lang('discount_code') ?></label>
                            <input class="form-control" name="discountCode" value="<?= @$_POST['discountCode'] ?>" placeholder="<?= lang('enter_discount_code') ?>" type="text">
                            <a href="javascript:void(0);" class="btn btn-default" onclick="checkDiscountCode()"><?= lang('check_code') ?></a>
                        </div>
                    <?php } ?>
          
       
                                <?php foreach ($cartItems['array'] as $item) { ?>
								<center>
                                   <div class="rcol-sm-16">
                                        <div class="col-sm-8">
                                            <input type="hidden" name="id[]" value="<?= $item['id'] ?>">
                                            <input type="hidden" name="quantity[]" value="<?= $item['num_added'] ?>">
                                            <img style="width:90px; padding:10px;" src="<?= base_url('/attachments/shop_images/' . $item['image']) ?>" alt="">
                                       </div>

                                        <div class="col-sm-8"><a href="<?= LANG_URL . '/' . $item['url'] ?>"><?= $item['title'] ?></a><font style="color:#007bff;font-weight: bold;"> &nbsp;<i class="zmdi zmdi-label"></i> <?= $item['sum_point'] ?></font><p>
                                          <a class="btn btn-xs" onclick="removeProduct(<?= $item['id'] ?>, true)" href="javascript:void(0);">
                                            <font style="font-size:20px;color:#007bFF;">     <span class="glyphicon glyphicon-minus"></span> </font>
                                            </a>
                                           <span class="quantity-num">
                                               <?= $item['num_added'] ?>
                                            </span>&nbsp;
                                           <a class="btn btn-xs refresh-me add-to-cart <?= $item['quantity'] <= $item['num_added'] ? 'disabled' : '' ?>" data-id="<?= $item['id'] ?>" href="javascript:void(0);">
                                              
                                                <font style="font-size:20px;color:#000;"> <span class="glyphicon glyphicon-plus"></span></font>
                                            </a><a href="<?= base_url('home/removeFromCart?delete-product=' . $item['id'] . '&back-to=checkout') ?>" class="btn btn-xs btn-danger">
                                                x 
                                            </a>
                                            <p>
                                             </div>
                                     
                                   </div></center>
                                <?= $item['title'] ?>
                                   
                                <?php } 
                            
                              ?>
                                <tr>
                                    <td colspan="4" class="text-right"><h4><b>Total Pesanan : <?= CURRENCY ?> <?= number_format($cartItems['finalSum'],0,',','.') ?></b>
                                      </h4></td>
                                    <td>
                                                                    <input type="hidden" class="final-amount" name="final_amount" value="<?= $cartItems['finalSum'] ?>">
                                        <input type="hidden" name="amount_currency" value="<?= CURRENCY ?>">
                                        <input type="hidden" name="discountAmount" value="">
                                    </td>
                                </tr>
                       
              
     
          
             <p style="text-align:right">
   <?php $tt = $cartItems['finalSum'];?>
      </p>
      
<center>
<div id='distance'><h4 style="text-shadow:0px 1px 4px #cccccc;"><center>TAP LOKASI TUJUAN.<br><br><img class="img-responsive" style="width:20%" src="<?= base_url('assets/imgs/dboy2.png') ?>"></center></h4></div>  </form>
</center><div id="map"></div>
<script>
  var map = L.map('map', {zoomControl: true}).fitWorld();  
 var osm = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
           maxZoom:20, attribution: 'Map by <a href="http://bit.ly/2bD2rGh", title="e-mail: corina@mapwizard.eu">mapWizard</a> | © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> and contributors'}).addTo(map);
var customOptions = {
  'className': 'custom',
}

var popup2 = L.popup({
  closeOnClick: false,
  autoClose: false
}).setContent("KEDAI OLALA");

map.locate({setView: true, maxZoom: 20});

 // map.locate({setView: true, maxZoom: 16});
// map.locate({setView: true, maxZoom: 19});
 //pagina oficiala turf.js http://turfjs.org/
 // Haversine formula to account for global curvature https://en.wikipedia.org/wiki/Haversine_formula    
 var LeafIcon = L.Icon.extend({
    options: {
            iconUrl: 'leaf-green.png',
            iconSize:     [25, 41], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [12, 41],  // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [2, -33] // point from which the popup should open relative to the iconAnchor
    }
});
var red_icon =new LeafIcon ({iconUrl: '<?= base_url('assets/imgs/KEDAI_OLALA_ICONMAP_KECIL.png')?>'});

//GeoJSON structure     
var redIcon = {
    "type": "FeatureCollection",
      "features": [
        {
        "type": "Feature",
         "properties": { 
          "name": "Kedai Olala",
           "label": "Kedai Olala",   
           "popupContent": "This is where the Rockies play!"     
                        },
        "geometry": {
         "type": "Point",
          "coordinates": [
            117.58577,//position of the Red Icon
            3.30195
            ]
          }
        }
      ]
    }; 
    

 var units = "meters"; 
 var unitswaktu = "kilometers"; 
 var dist = [];    
  
//calculate the distance between the Red Icon and each Blue Marker added on the map   
function onEachFeatureCoord (feature, layer) {
// function to add markers on the map when clicking on it   
  map.on('click', function(e){   
   var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    var marker = new L.marker(e.latlng, { draggable:'true'}).addTo(map);
    // make the Blue Markers dragable,   
    marker.on('drag', function(e){
          marker.options.draggable = true;
          marker.bindPopup("<b>Delivery ke alamat ini</b>");  
             //get the updated coordinates of each marker (blue icon) when the markers are draged/moved on the map      
             var coords = e.target.getLatLng();
             var lat = coords.lat;
             var lng = coords.lng;  
             map.off('click');
         // function getNewDistance calculates the distance between the Red Marker (pointStart) and each draged/moved Blue Marker. 
            function getNewDistance () { 
            for(var i=0;(i<[lat, lng].length) && (i<redIcon.features.length);i++) 
                         {          
                         var distanceLayer = turf.distance(redIcon.features[i].geometry.coordinates, [lng,lat], units).toFixed(2); 
 var distanceLayer2 = turf.distance(redIcon.features[i].geometry.coordinates, [lng,lat], unitswaktu).toFixed(2); 
 var total = Number(distanceLayer2) / 20 * 60;
    
            var tarif = Math.round(total);
            var waktu =' ' + Math.round(total) +  ' Menit ,';
 var greeting;
   var gret;
  if (tarif < 5) {
    greeting = " Ongkir Rp 1.000 ";
    gret = 1000;
  } else if(tarif >= 5 && tarif <= 10){
    greeting = " Ongkir Rp 7.000 ";
    gret = 7000;
  }else{
greeting = " Ongkir Rp 13.000 ";
gret = 13000;
  }
     var bayar = Math.round(<?php echo $tt ?>) + gret;
      var  reverse = bayar.toString().split('').reverse().join(''),
  ribuan  = reverse.match(/\d{1,3}/g);
  ribuan  = ribuan.join('.').split('').reverse().join('');
                   var tes = ' <ons-icon icon=md-pin style=color:#2979ff;text-shadow: 1px 1px 1px #cccccc;></ons-icon> ' + Math.round(distanceLayer)+' Meter,'+ (waktu) + (greeting) + ' <font style=color:brown><b>Semuanya Rp '+ (ribuan)+'</b></font> ';
              $("#postInput").val(bayar); 
$("#addressInput").val(greeting); 
$("#cityInput").val(waktu); 
                                    dist.push(tes+'<input id="phoneInput" placeholder="Nomor Handphone *" class="form-control" name="phone" type="tel"><p></p><input type="text" id="addressInput" placeholder="Detail alamat, jika perlu" name="address" class="form-control" rows="3"><input id="cityInput" type="hidden" class="form-control" name="city" class="form-control" rows="3" value="'+lat+','+lng+'">');
                                  
                                          //  dist.push(waktu);  

               for (var i = 0; i < dist.length; i++)  
                      {           
                      document.getElementById('distance').innerHTML = dist.join('\n');  
                      document.getElementById('distance').innerHTML = dist[i];
                      };  

               };                       
            };
            getNewDistance();     
    });             
    map.off('click');              
    marker.bindPopup("<b>Delivery ke alamat ini</b>").openPopup();
    //convert the data inside the variable named "marker" in GeoJSON format
    //the conversion is done to make it easier to select the coordinates of each mker added to the map  
    var markersJson =  marker.toGeoJSON();
   //function getDistance calculates the distance between the Red Icon and the Blue Markers when this are added to the map (the initial position)  
    function getDistance () { 
            for(var i=0;(i<markersJson.length) && (i<redIcon.features.length);i++) 
            console.log('test');
            {          
            var distanceLayer = turf.distance( redIcon.features[i].geometry.coordinates, markersJson.geometry.coordinates, units).toFixed(2);
            var jarak = ' <ons-icon icon=md-pin style=color:#2979ff;text-shadow: 1px 1px 1px #cccccc;></ons-icon> ' + Math.round(distanceLayer) + ' Meter,';
            var distanceLayer2 = turf.distance( redIcon.features[i].geometry.coordinates, markersJson.geometry.coordinates, unitswaktu).toFixed(2); 
          
            var total = Number(distanceLayer2) / 20 * 60;
            var tarif = Math.round(total);
            var waktu =' ' + Math.round(total) +  ' Menit,';
   var greeting;
   var gret;
  if (tarif < 5) {
    greeting = " Ongkir Rp 1.000 ";
    gret = 1000;
  } else if(tarif >= 5 && tarif <= 10){
    greeting = " Ongkir Rp 7.000 ";
    gret = 7000;
  }else{
greeting = " Ongkir Rp 13.000 ";
gret = 13000;
  }
  var bayar = Math.round(<?php echo $tt ?>) + gret;
 var  reverse = bayar.toString().split('').reverse().join(''),
  ribuan  = reverse.match(/\d{1,3}/g);
  ribuan  = ribuan.join('.').split('').reverse().join('');

$("#postInput").val(bayar); 
$("#addressInput").val(greeting); 
$("#cityInput").val(jarak); 

                       dist.push(jarak);
                        dist.push(waktu);    
                        dist.push(greeting);
                        dist.push(' <font style=color:#DC3545><b>Semuanya Rp '+(ribuan)+'</b></font> <br>');
    dist.push('<br><input id="phoneInput" placeholder="Nomor Handphone *" class="form-control" name="phone" type="tel"><p></p><input type="text" id="addressInput" placeholder="Detail alamat, jika perlu" name="address" class="form-control" rows="3"><input id="cityInput" type="hidden" class="form-control" name="city" class="form-control" rows="3" value="'+lat+','+lng+'">');                          
            }
         document.getElementById('distance').innerHTML = dist.join('\n'); 
         };
         getDistance(); 
      }); 
   }; 
    var startPoint=L.geoJson(redIcon, {    
               // startPoint.bindPopup("<b>Pesanan diantar ke alamat ini</b>");  
      pointToLayer:function(feature, layer) {

        return L.marker(layer, {

            icon: red_icon, title: feature.properties.name, label : feature.properties.label
            //  layer.options.draggable = true;
        })

    }, 
      //call the onEachFeatureCoord function to calculate distance from the Red Icon to each Blue Marker that is added and moved on the map   
      onEachFeature: onEachFeatureCoord

    }).addTo(map).bindPopup(popup2, customOptions).openPopup();  
    </script>  
      </div> <br><br><br> <div align="center"><button class="navbar" style="color:#ffffff; background: #2979FF;" onclick="document.getElementById('goOrder').submit();">OKE PESAN 
      </button></div></span> 
    <br><br><br>
     
<?php } else { ?>
  <br><br><br>
   <ons-card> <h4>" Ayoo..! menunya dipilih dulu, gan - sist "</h4></ons-card>
   
    <?php
}
if ($this->session->flashdata('deleted')) {
    ?>
    <script>
        $(document).ready(function () {
            ShowNotificator('alert-info', '<?= $this->session->flashdata('deleted') ?>');
        });
    </script>
<?php } if ($codeDiscounts == 1 && isset($_POST['discountCode'])) { ?>
    <script>
        $(document).ready(function () {
            checkDiscountCode();
        });
    </script>
<?php } ?>

