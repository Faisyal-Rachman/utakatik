<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ShoppingCartPage extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Public_model');
    }

    public function index()
    {
        $data = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('shoppingcart');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);

       //   $data['getUserInfo'] = $this->googleplus->getUserInfo();
       //  $data['loginURL'] = $this->googleplus->loginURL();
       $data['profileData'] = $this->session->userdata('userProfile');
       // $profile = $this->googleplus->getUserInfo();
       //  $this->googleplus->getAuthenticate();
      // $this->session->set_userdata('login',true);
      // $this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
       $this->render('shopping_cart', $head, $data);
    }
     

}
