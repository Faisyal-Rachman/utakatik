<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                            Visi : <small>Membantu memberikan kemudahan bagi masyarakat Kota Tarakan dalam pekerjaan sehari hari.
							Seperti belanja makanan dengan kurir, service pembersihan rumah, perbaikan komputer langsung di tempat.
Serta turut mensejahterakan kehidupan penduduk di sekitar Kedai Olala kedepannya.							</small></h1>
                    </div>
                </div>
				 <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <h1 class="h1">
                            Misi : <small><ul><li>Meningkatkan kepedulian dan tanggung jawab terhadap lingkungan dan sosial.</li></ul> <br>
							<ul><li>Menjadikan layanan Kedai Olala sebagai layanan yang termudah dan nyaman.</li></ul> <br>
							<ul><li>Menjadikan layanan Kedai Olala sebagai layanan yang prima yang bernilai tambah kepada pelanggan</li></ul></small></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
               
                <div class="well well-sm">
                    Kedai Olala hanya sebuah media yang diperuntukan melayani beberapa keperluan masyarakat Kota Tarakan.
				 Usaha kecil ini menyediakan beberapa jasa delivery services, pengantaran makanan atau pemesanan jasa lainnya yang bisa
dipesan lewat website ini.  
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
        
        <div class="bottom-30"></div>
        <?php include 'bodyFooter.php' ?>
    </div>
</div>