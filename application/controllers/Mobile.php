<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//require_once APPPATH."third_party/Mobile_Detect.php";

class Mobile extends MY_Controller {
  public function __construct() {
    parent::__construct();
  }

 public function index()
    {
		$this->load->library('user_agent');
//$this->load->library('MobileDetect');
$mobile=$this->agent->is_mobile();
if($mobile){
echo "mobile";
  //your code
}
else{
	echo "nt mobile";
}
//$this->render('mobile');
	}
}