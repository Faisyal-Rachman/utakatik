<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Orders_model');
        $this->load->library('facebook');
    }
   public function index(){
        $data = array();
        $slideD = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
        $head['title'] = @$arrSeo['title'];
        $head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        if(isset($_GET['code']))
        {
/* $data = array('name'=>$userProfile['name'],
                              'email'=>$userProfile['email'],
                              'gambar'=>$userProfile['picture']['data']['url']);
                              */
          $this->googleplus->getAuthenticate();
            $this->session->set_userdata('login',true);
			    $data['profileData'] = $this->session->userdata('userProfile');
			//$userProfile = $this->session->userdata('userProfile');
            $userProfile1 = $this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
	//$data = array('name'=>$userProfile['name'],
                           //   'email'=>$userProfile['email'],
                            //  'gambar'=>$userProfile['picture']['data']['url']);
           //$data['datauser'] = $this->Public_model->getUserProfileInfo($userProfile['email']);
            // $data['datauser'] = $this->Public_model->registerUser($userProfile);
			redirect('checkout');
        }
       $data['loginURL'] = $this->googleplus->loginURL();
        $data['authUrl'] =  $this->facebook->login_url();
         $this->render('ceklogin', $head,$data);
    }
 public function loginfb(){
        $data = array();
        $slideD = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
        $head['title'] = @$arrSeo['title'];
        $head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        if($this->facebook->is_authenticated()){
            $userProfile = $this->facebook->request('get', '/me?fields=id,name,first_name,last_name,email,gender,locale,picture');
   $data = array('name'=>$userProfile['name'],
                              'email'=>$userProfile['email'],
                              'gambar'=>$userProfile['picture']['data']['url']);
                               $data['datauser'] = $this->Public_model->getUserProfileInfo($userProfile['email']);
                 if($data['datauser']!=null){
                    $data['datauser'] = $this->Public_model->getUserProfileInfo($userProfile['email']);
                      }else{
                        $data['datauser'] = $this->Public_model->registerUserFb($userProfile);
                       // $data['datauser'] = $this->Public_model->registerUser('faipagun@gmail.com');
                      }
             $head['title'] = @$arrSeo['title'];
        $head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
             redirect('checkout');

        }
        else
        {
             $head['title'] = @$arrSeo['title'];
        $head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
            $data['authUrl'] =  $this->facebook->login_url();
            $this->render('homefb',$head,$data);
        }
     }

    private function setVendorOrders()
    {
        $this->Public_model->setVendorOrder($_POST);
    }
    public function profile(){
        if($this->session->userdata('login') == true)
        {
            $data['profileData'] = $this->session->userdata('userProfile');
            $this->load->view('profile',$data);
        }
        else
        {
            redirect('');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        $this->googleplus->revokeToken();
        redirect('checkout');
    }
       public function logoutfb() {
        $this->facebook->destroy_session();
        redirect('checkout');
    
    }
    /*
     * Send notifications to users that have nofify=1 in /admin/adminusers
     */

    private function sendNotifications()
    {
        $users = $this->Public_model->getNotifyUsers();
        $myDomain = $this->config->item('base_url');
        if (!empty($users)) {
            foreach ($users as $user) {
                $this->sendmail->sendTo($user, 'Admin', 'New order in ' . $myDomain, 'Hello, you have new order. Can check it in /admin/orders');
            }
        }
    }

    private function setActivationLink()
    {
        if ($this->config->item('send_confirm_link') === true) {
            $link = md5($this->orderId . time());
            $result = $this->Public_model->setActivationLink($link, $this->orderId);
            if ($result == true) {
                $url = parse_url(base_url());
                $msg = lang('please_confirm') . base_url('confirm/' . $link);
                $this->sendmail->sendTo($_POST['email'], $_POST['first_name'] . ' ' . $_POST['last_name'], lang('confirm_order_subj') . $url['host'], $msg);
            }
        }
    }

    private function goToDestination()
    {
        if ($_POST['payment_type'] == 'cashOnDelivery' || $_POST['payment_type'] == 'Bank') {
            $this->shoppingcart->clearShoppingCart();
            $this->session->set_flashdata('success_order', true);
        }
        if ($_POST['payment_type'] == 'Bank') {
            $_SESSION['order_id'] = $this->orderId;
            $_SESSION['final_amount'] = $_POST['final_amount'] . $_POST['amount_currency'];
            redirect(LANG_URL . '/checkout/successbank');
        }
        if ($_POST['payment_type'] == 'cashOnDelivery') {
            redirect(LANG_URL . '/checkout/successcash');
        }
        if ($_POST['payment_type'] == 'PayPal') {
            @set_cookie('paypal', $this->orderId, 2678400);
            $_SESSION['discountAmount'] = $_POST['discountAmount'];
            redirect(LANG_URL . '/checkout/paypalpayment');
        }
    }

    private function userInfoValidate($post)
    {
        $errors = array();
        if (mb_strlen(trim($post['first_name'])) == 0) {
            $errors[] = lang('first_name_empty');
        }
        if (mb_strlen(trim($post['last_name'])) == 0) {
            $errors[] = lang('last_name_empty');
        }
        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = lang('invalid_email');
        }
        $post['phone'] = preg_replace("/[^0-9]/", '', $post['phone']);
        if (mb_strlen(trim($post['phone'])) == 0) {
            $errors[] = lang('invalid_phone');
        }
        if (mb_strlen(trim($post['address'])) == 0) {
            $errors[] = lang('address_empty');
        }
        if (mb_strlen(trim($post['city'])) == 0) {
            $errors[] = lang('invalid_city');
        }
        return $errors;
    }

    public function orderError()
    {
        if ($this->session->flashdata('order_error')) {
            $data = array();
            $head = array();
            $arrSeo = $this->Public_model->getSeo('checkout');
            $head['title'] = @$arrSeo['title'];
            $head['description'] = @$arrSeo['description'];
            $head['keywords'] = str_replace(" ", ",", $head['title']);
            $this->render('checkout_parts/order_error', $head, $data);
        } else {
            redirect(LANG_URL . '/checkout');
        }
    }

    public function paypalPayment()
    {
        $data = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('checkout');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $data['paypal_sandbox'] = $this->Home_admin_model->getValueStore('paypal_sandbox');
        $data['paypal_email'] = $this->Home_admin_model->getValueStore('paypal_email');
        $this->render('checkout_parts/paypal_payment', $head, $data);
    }

    public function successPaymentCashOnD()
    {
        if ($this->session->flashdata('success_order')) {
            $data = array();
            $head = array();
            $arrSeo = $this->Public_model->getSeo('checkout');
            $head['title'] = @$arrSeo['title'];
            $head['description'] = @$arrSeo['description'];
            $head['keywords'] = str_replace(" ", ",", $head['title']);
            $this->render('checkout_parts/payment_success_cash', $head, $data);
        } else {
            redirect(LANG_URL . '/checkout');
        }
    }

    public function successPaymentBank()
    {
        if ($this->session->flashdata('success_order')) {
            $data = array();
            $head = array();
            $arrSeo = $this->Public_model->getSeo('checkout');
            $head['title'] = @$arrSeo['title'];
            $head['description'] = @$arrSeo['description'];
            $head['keywords'] = str_replace(" ", ",", $head['title']);
            $data['bank_account'] = $this->Orders_model->getBankAccountSettings();
            $this->render('checkout_parts/payment_success_bank', $head, $data);
        } else {
            redirect(LANG_URL . '/checkout');
        }
    }

    public function paypal_cancel()
    {
        if (get_cookie('paypal') == null) {
            redirect(base_url());
        }
        @delete_cookie('paypal');
        $orderId = get_cookie('paypal');
        $this->Public_model->changePaypalOrderStatus($orderId, 'canceled');
        $data = array();
        $head = array();
        $head['title'] = '';
        $head['description'] = '';
        $head['keywords'] = '';
        $this->render('checkout_parts/paypal_cancel', $head, $data);
    }

    public function paypal_success()
    {
        if (get_cookie('paypal') == null) {
            redirect(base_url());
        }
        @delete_cookie('paypal');
        $this->shoppingcart->clearShoppingCart();
        $orderId = get_cookie('paypal');
        $this->Public_model->changePaypalOrderStatus($orderId, 'payed');
        $data = array();
        $head = array();
        $head['title'] = '';
        $head['description'] = '';
        $head['keywords'] = '';
        $this->render('checkout_parts/paypal_success', $head, $data);
    }

}
