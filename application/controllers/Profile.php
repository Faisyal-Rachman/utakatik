<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('facebook');
		$this->load->Model('Public_model');
    }
	
	public function index()
	{
      $data = array();
        $slideD = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
         $head['profileData'] = $this->session->userdata('userProfile');
        $head['title'] = @$arrSeo['title'];
         $head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
                $data['profileData'] = $this->session->userdata('userProfile');
        $data['uinfo']  = $this->Public_model->getUserProfileInfo($data['profileData']['email']);
      //  $data['orders'] = $this->Public_model->orders($this->num_rows, $page, $order_by);
if($this->session->userdata('login') == true)
    {
    //  $data['orders'] = $this->Public_model->orders($this->num_rows, $page, $order_by);
      $data['profileData'] = $this->session->userdata('userProfile');
       $data['uinfo']  = $this->Public_model->getUserProfileInfo($data['profileData']['email']);
      $this->render('profile',$head,$data);
    }elseif($this->facebook->is_authenticated()){
$userProfile = $this->facebook->request('get', '/me?fields=id,name,first_name,last_name,email,gender,locale,picture');
      $data = array('name'=>$userProfile['name'],
                'email'=>$userProfile['email'],
                'gambar'=>$userProfile['picture']['data']['url']);
       $data['uinfo']  = $this->Public_model->getUserProfileInfo($userProfile['email']);
  $this->render('profile',$head,$data);
    }else   {
      redirect('login/index');
    }
 }
}