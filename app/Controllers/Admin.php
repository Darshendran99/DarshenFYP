<?php

namespace App\Controllers;

use App\Models\admin_model;
use App\Models\UserModel;
use App\Models\product_model;
use App\Models\promotion_model;
use App\Models\component_model;
use App\Models\gpu_model;
use App\Models\cpu_model;
use App\Models\cart_model;
use App\Models\payment_model;
use App\Models\order_model;
use App\Models\reward_model;

class Admin extends BaseController
{
    public function index()
    {
        if (session()->get('AdminisLoggedIn')){
          $StaffId = session('StaffId');
          $admin_model = new admin_model();
          $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
          // TotalToday's Revenue

          // Total Users
          $UserModel = new UserModel();
          $UsersData =  $UserModel->countAll();
          $data = array(
            'userData' => $UsersData,
          );
          // Total Revenue
          $paymentRev = new payment_model();
          $data['payment'] = $paymentRev->findAll();

          $order_model = new order_model();
          $data['ordersTable'] = $order_model->orderBy('orderId', 'ASC')->first();

        echo view("sections/AdminHeader.php");
        echo view("sections/AdminNavBar.php",$data1);
        echo view("Admin/index.php", $data);
        echo view("sections/AdminFooter.php");

      }else {
        return redirect()->to('AdminLogin');
    }
  }

    public function AdminRegister(){
      $data = [];
      helper(['form']);

      if ($this->request->getMethod() == 'post') {
      //Validation
      $rules = [
        'name' => 'required|min_length[2]|max_length[50]',
        'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[admin.staffEmail]',
        'password' => 'required|min_length[8]|max_length[255]',
        'password_confirm' => 'matches[password]',
      ];

      if (! $this->validate($rules)) {
        $data['validation'] = $this->validator;
      }else{

// ReCaptcha
$recaptchaResponse = trim($this->request->getVar('g-recaptcha-response'));
$secret='6LegAqEiAAAAAMI4rynvgUDGBd_KwINxMKeQzkE_';
$credential = array(
    'secret' => $secret,
    'response' => $this->request->getVar('g-recaptcha-response')
);
$verify = curl_init();
curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($verify, CURLOPT_POST, true);
curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($verify);
$status= json_decode($response, true);
if($status['success']){
// Recaptcha
//Storing user registration into database
$model = new admin_model();

$newData = [
  'staffName' => $this->request->getVar('name'),
  'staffEmail' => $this->request->getVar('email'),
  'stafPassword' => $this->request->getVar('password'),
];
        $model->save($newData);
        $session = session();
        $session->setFlashdata('success', 'Successful Registration');
        return redirect()->to('AdminLogin');
      }else{
        // Recaptcha
        $session = session();
          $session->setFlashdata('msg', 'Please Complete Captcha');
      }

      }
    }
        echo view("sections/AdminHeader.php");
        echo view("Admin/AdminRegister.php",$data);
        echo view("sections/AdminFooter.php");
    }

    public function AdminLogin()
    {
      $data = [];
      helper(['form']);

          if ($this->request->getMethod() == 'post') {
            //Validation
            $rules = [
              'staffEmail' => 'required|min_length[6]|max_length[50]|valid_email',
              'stafPassword' => 'required|min_length[8]|max_length[255]|validateAdmin[staffEmail,stafPassword]',
            ];
            $errors = [
              'stafPassword' => [
                'validateAdmin' => 'Email or Password don\'t match'
              ]
            ];
            if (! $this->validate($rules, $errors)) {
              $data['validation'] = $this->validator;
            }else{
              // ReCaptcha
              $recaptchaResponse = trim($this->request->getVar('g-recaptcha-response'));
              $secret='6LegAqEiAAAAAMI4rynvgUDGBd_KwINxMKeQzkE_';
              $credential = array(
                  'secret' => $secret,
                  'response' => $this->request->getVar('g-recaptcha-response')
              );
              $verify = curl_init();
              curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
              curl_setopt($verify, CURLOPT_POST, true);
              curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
              curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
              $response = curl_exec($verify);
              $status= json_decode($response, true);
              if($status['success']){
              // Recaptcha
              $model = new admin_model();
              $admin = $model->where('staffEmail', $this->request->getVar('staffEmail'))
                            ->first();
              $this->setAdminSession($admin);
              return redirect()->to('AdminPage');
            }else{
              // Recaptcha
              $session = session();
                $session->setFlashdata('msg', 'Please Complete Captcha');
            }
            }
          }
          echo view("sections/AdminHeader.php");
          echo view("Admin/AdminLogin.php", $data);
          echo view("sections/AdminFooter.php");
      }
      private function setAdminSession($admin){
          $data = [
               'StaffId' => $admin['StaffId'],
               'staffName' => $admin['staffName'],
               'staffEmail' => $admin['staffEmail'],
               'AdminisLoggedIn' => true,
          ];

            session()->set($data);
              return true;
       }
      public function Adminlogout(){
        session()->destroy();
        return redirect()->to('AdminLogin');
      }


    public function UsersTable()
    {
      if (session()->get('AdminisLoggedIn')){

        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $UserModel = new UserModel();
        $data['usersTable'] = $UserModel->orderBy('id', 'ASC') ->findAll();

      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/UsersTable.php",$data);
      echo view("sections/AdminFooter.php");
    }else {
        return redirect()->to('AdminLogin');
    }
    }
    public function ProductsTable()
    {
      if (session()->get('AdminisLoggedIn')){

        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $product_model = new product_model();
        $data['productsTable'] = $product_model->orderBy('ProductId', 'ASC') ->findAll();

      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/ProductsTable.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
    }
    public function PromotionsTable()
    {
      if (session()->get('AdminisLoggedIn')){

        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $promotion_model = new promotion_model();
        $data['promotionsTable'] = $promotion_model->orderBy('PromotionId', 'ASC') ->findAll();

      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/PromotionsTable.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
    }
    public function ComponentsTable()
    {
      if (session()->get('AdminisLoggedIn')){

        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $component_model = new component_model();
        $data['componentsTable'] = $component_model->orderBy('ComponentId', 'ASC') ->findAll();

      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/ComponentsTable.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
    }
    public function RewardsTable()
    {
      if (session()->get('AdminisLoggedIn')){

        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $reward_model = new reward_model();
        $data['rewardsTable'] = $reward_model->orderBy('RewardID', 'ASC') ->findAll();

      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/RewardsTable.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
    }

    public function OrdersTable()
    {
      if (session()->get('AdminisLoggedIn')){

        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $order_model = new order_model();
        $data['ordersTable'] = $order_model->orderBy('orderId', 'ASC') ->findAll();

      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/OrdersTable.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
    }

    public function PaymentsTable()
    {
      if (session()->get('AdminisLoggedIn')){

        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $payment_model = new payment_model();
        $data['paymentsTable'] = $payment_model->orderBy('PaymentId', 'ASC') ->findAll();

      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/PaymentsTable.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
    }

    public function CPUsTable()
    {
      if (session()->get('AdminisLoggedIn')){

        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $cpu_model = new cpu_model();
        $data['cpusTable'] = $cpu_model->orderBy('cpuId', 'ASC') ->findAll();

      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/CPUsTable.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
    }

    public function GPUsTable()
    {
      if (session()->get('AdminisLoggedIn')){

        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $cpu_model = new gpu_model();
        $data['gpusTable'] = $cpu_model->orderBy('gpuId', 'ASC') ->findAll();

      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/GPUsTable.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
    }

    public function AdminsTable()
    {
      if (session()->get('AdminisLoggedIn')){

        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $admin_model = new admin_model();
        $data['adminsTable'] = $admin_model->orderBy('StaffId', 'ASC') ->findAll();

      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/AdminsTable.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
    }

    public function AddUser(){
      if (session()->get('AdminisLoggedIn')){

        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
        //Validation
        $rules = [
          'firstname' => 'required|min_length[2]|max_length[25]',
          'lastname' => 'required|min_length[2]|max_length[25]',
          'address' => 'required|min_length[10]|max_length[255]',
          'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
          'password' => 'required|min_length[8]|max_length[255]',
          'password_confirm' => 'matches[password]',
        ];

        if (! $this->validate($rules)) {

          $data['validation'] = $this->validator;

        }else{

          //Storing user registration into database
          $model = new UserModel();

          $newData = [
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'address' => $this->request->getVar('address'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
          ];
          $Result = $model->save($newData);
          if($Result) {
            $session = session();
            $session->setFlashdata('success', 'Added User');

          return redirect()->to('UsersTable');
          } else {
          echo "Something went wrong.";
          }
          }
        }

      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/AddUser.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
    }

    public function AddProduct(){
      if (session()->get('AdminisLoggedIn')){
        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
        //Validation
        $rules = [
          'productname' => 'required|min_length[10]|max_length[50]',
          'productimage' => 'uploaded[productimage]|is_image[productimage]|max_size[productimage,4000]',
          'productprice' => 'required|min_length[1]|max_length[255]|integer',
          'productLink' => 'required|min_length[35]|max_length[60]',
          'productcpu' => 'required|min_length[5]|max_length[50]',
          'productgpu' => 'required|min_length[5]|max_length[50]',
          'productmobo' => 'required|min_length[5]|max_length[50]',
          'productram' => 'required|min_length[5]|max_length[50]',
          'productssd' => 'required|min_length[5]|max_length[50]',
          'productpsu' => 'required|min_length[5]|max_length[50]',
          'productcasing' => 'required|min_length[5]|max_length[50]',
          'productother' => 'max_length[50]',
          'productcsgo' => 'required|min_length[1]|max_length[50]|integer',
          'productfortnite' => 'required|min_length[1]|max_length[50]|integer',
          'productgtav' => 'required|min_length[1]|max_length[50]|integer',
          'productcyberpunk' => 'required|min_length[1]|max_length[50]|integer',
          'product3dmark' => 'required|min_length[1]|max_length[50]|integer',
          'productgeekbench' => 'required|min_length[1]|max_length[50]|integer',
        ];

        if (! $this->validate($rules)) {

          $data['validation'] = $this->validator;

        }else{
          $image = file_get_contents($this->request->getFile('productimage'));
          $model = new product_model();

          $newData = [
            'ProductName' => $this->request->getVar('productname'),
            'ProductImage' => $image,
            'ProductPrice' => $this->request->getVar('productprice'),
            'productLink' => $this->request->getVar('productLink'),
            'ProductCPU' => $this->request->getVar('productcpu'),
            'ProductGPU' => $this->request->getVar('productgpu'),
            'ProductMobo' => $this->request->getVar('productmobo'),
            'ProductRAM' => $this->request->getVar('productram'),
            'ProductSSD' => $this->request->getVar('productssd'),
            'ProductPSU' => $this->request->getVar('productpsu'),
            'ProductCasing' => $this->request->getVar('productcasing'),
            'ProductOther' => $this->request->getVar('productother'),
            'ProductCSGO' => $this->request->getVar('productcsgo'),
            'ProductFortnite' => $this->request->getVar('productfortnite'),
            'ProductGTAV' => $this->request->getVar('productgtav'),
            'ProductCyberpunk' => $this->request->getVar('productcyberpunk'),
            'Product3DMark' => $this->request->getVar('product3dmark'),
            'ProductGeekbench' => $this->request->getVar('productgeekbench'),
          ];
          $Result = $model->save($newData);
          if($Result) {
            $session = session();
            $session->setFlashdata('success', 'Added Product');

          return redirect()->to('ProductsTable');
          } else {
          echo "Something went wrong.";
          return redirect()->to();
          }
          }
          }
  echo view("sections/AdminHeader.php");
  echo view("sections/AdminNavBar.php",$data1);
  echo view("Admin/AddProduct.php",$data);
  echo view("sections/AdminFooter.php");
  }else {
    return redirect()->to('AdminLogin');
  }
  }

    public function AddPromotion(){

      if (session()->get('AdminisLoggedIn')){
        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
        //Validation
        $rules = [
          'promotionname' => 'required|min_length[10]|max_length[50]',
          'promotionimage' => 'uploaded[promotionimage]|is_image[promotionimage]|max_size[promotionimage,4000]',
          'promotionoriprice' => 'required|min_length[1]|max_length[10]|integer',
          'promotionprice' => 'required|min_length[1]|max_length[10]|integer',
          'promotioncpu' => 'max_length[50]',
          'promotiongpu' => 'max_length[50]',
          'promotionmobo' => 'max_length[50]',
          'promotionram' => 'max_length[50]',
          'promotionssd' => 'max_length[50]',
          'promotionpsu' => 'max_length[50]',
          'promotioncasing' => 'max_length[50]',
          'promotionother' => 'max_length[50]',
          'nonpcdetails' => 'max_length[50]',
          'promotiondetail1' => 'max_length[50]',
          'promotiondetail2' => 'max_length[50]',
          'promotiondetail3' => 'max_length[50]',
          'promotiondetail4' => 'max_length[50]',
        ];

        if (! $this->validate($rules)) {

          $data['validation'] = $this->validator;

        }else{
          $image = file_get_contents($this->request->getFile('promotionimage'));
          $model = new promotion_model();

          $newData = [
            'PromotionName' => $this->request->getVar('promotionname'),
            'PromotionStatus' => $this->request->getVar('promotionstatus'),
            'PromotionImage' => $image,
            'PromotionOriPrice' => $this->request->getVar('promotionoriprice'),
            'PromotionPrice' => $this->request->getVar('promotionprice'),
            'PromotionCPU' => $this->request->getVar('promotioncpu'),
            'PromotionGPU' => $this->request->getVar('promotiongpu'),
            'PromotionMobo' => $this->request->getVar('promotionmobo'),
            'PromotionRAM' => $this->request->getVar('promotionram'),
            'PromotionSSD' => $this->request->getVar('promotionssd'),
            'PromotionPSU' => $this->request->getVar('promotionpsu'),
            'PromotionCasing' => $this->request->getVar('promotioncasing'),
            'PromotionOther' => $this->request->getVar('promotionother'),
            'NonPCDetails' => $this->request->getVar('nonpcdetails'),
            'PromotionDetail1' => $this->request->getVar('promotiondetail1'),
            'PromotionDetail2' => $this->request->getVar('promotiondetail2'),
            'PromotionDetail3' => $this->request->getVar('promotiondetail3'),
            'PromotionDetail4' => $this->request->getVar('promotiondetail4'),

          ];
          $Result = $model->save($newData);
          if($Result) {
            $session = session();
            $session->setFlashdata('success', 'Added Promotion');

          return redirect()->to('PromotionsTable');
          } else {
          echo "Something went wrong.";
          return redirect()->to();
          }
          }
          }
      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/AddPromotion.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
      }

    public function AddComponent(){
      if (session()->get('AdminisLoggedIn')){
        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
        //Validation
        $rules = [
          'componentname' => 'required|min_length[5]|max_length[50]',
          'componentimage' => 'uploaded[componentimage]|is_image[componentimage]|max_size[componentimage,4000]',
          'componentdetails' => 'required|min_length[10]|max_length[255]',
          'componentprice' => 'required|min_length[1]|max_length[50]|integer',
        ];

        if (! $this->validate($rules)) {

          $data['validation'] = $this->validator;

        }else{
          $image = file_get_contents($this->request->getFile('componentimage'));
          //Storing user registration into database
          $model = new component_model();

          $newData = [
            'ComponentName' => $this->request->getVar('componentname'),
            'ComponentType' => $this->request->getVar('componenttype'),
            'ComponentBrand' => $this->request->getVar('compbrand'),
            'ComponentImage' => $image,
            'ComponentDetails' => $this->request->getVar('componentdetails'),
            'ComponentPrice' => $this->request->getVar('componentprice'),
          ];
          $Result = $model->save($newData);
          if($Result) {
            $session = session();
            $session->setFlashdata('success', 'Added Component');

          return redirect()->to('ComponentsTable');
          } else {
          echo "Something went wrong.";
          }
          }
        }
      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/AddComponent.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
      }

    public function AddReward(){
      if (session()->get('AdminisLoggedIn')){
        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
        //Validation
        $rules = [
          'rewardname' => 'required|min_length[5]|max_length[50]',
          'rewardimage' => 'uploaded[rewardimage]|is_image[rewardimage]|max_size[rewardimage,4000]',
        ];

        if (! $this->validate($rules)) {

          $data['validation'] = $this->validator;

        }else{
          $image = file_get_contents($this->request->getFile('rewardimage'));
          //Storing user registration into database
          $model = new reward_model();

          $newData = [
            'RewardName' => $this->request->getVar('rewardname'),
            'RewardImage' => $image,
            'RewardTier' => $this->request->getVar('rewardtier'),
          ];
          $Result = $model->save($newData);
          if($Result) {
            $session = session();
            $session->setFlashdata('success', 'Added Reward');

          return redirect()->to('RewardsTable');
          } else {
          echo "Something went wrong.";
          return redirect()->to();
          }
          }
        }
      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/AddReward.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
      }

    public function AddOrder(){
      if (session()->get('AdminisLoggedIn')){
        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();

        $UserModel = new UserModel();
        $data['useridData'] = $UserModel->orderBy('id', 'ASC') ->findAll();
        $payment_model = new payment_model();
        $data['paymntidData'] = $payment_model->orderBy('PaymentId', 'ASC') ->findAll();

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
        //Validation
        $rules = [
          // 'orderusrid' => 'required|min_length[1]|max_length[11]',
          'shippingadd' => 'required|min_length[10]|max_length[255]',
          'itemordr' => 'required|min_length[10]|max_length[255]',
          'itemtotal' => 'required|min_length[1]|max_length[20]|integer',
        ];

        if (! $this->validate($rules)) {

          $data['validation'] = $this->validator;

        }else{

          //Storing user registration into database
          $model = new order_model();

          $newData = [
            'userId' => $this->request->getVar('orderusrid'),
            'paymentId' => $this->request->getVar('orderpaymntid'),
            'shippingAddress' => $this->request->getVar('shippingadd'),
            'itemsOrdered' => $this->request->getVar('itemordr'),
            'grandTotal' => $this->request->getVar('itemtotal'),
            'orderStatus' => $this->request->getVar('orderstatus'),
          ];
          $Result = $model->save($newData);
          if($Result) {
            $session = session();
            $session->setFlashdata('success', 'Added Order');

          return redirect()->to('OrdersTable');
          } else {
          echo "Something went wrong.";
          return redirect()->to();
          }
          }
        }
      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/AddOrder.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
      }

    public function AddCPU(){
      if (session()->get('AdminisLoggedIn')){
        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
        //Validation
        $rules = [
          'cpuprice' => 'required|min_length[3]|max_length[11]|integer',
        ];
        if (! $this->validate($rules)) {
          $data['validation'] = $this->validator;
        }else{
          $model = new cpu_model();
          $newData = [
            'cpuPrice' => $this->request->getVar('cpuprice'),
          ];
          $Result = $model->save($newData);
          if($Result) {
            $session = session();
            $session->setFlashdata('success', 'Added CPU Price for the month');
          return redirect()->to('CPUsTable');
          } else {
          echo "Something went wrong.";
          }
          }
        }
      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/AddCPU.php",$data);
      echo view("sections/AdminFooter.php");
      }else {
        return redirect()->to('AdminLogin');
      }
      }

    public function AddGPU(){
      if (session()->get('AdminisLoggedIn')){
        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
        //Validation
        $rules = [
          'gpuprice' => 'required|min_length[4]|max_length[11]|integer',
        ];
        if (! $this->validate($rules)) {
          $data['validation'] = $this->validator;
        }else{
          $model = new gpu_model();
          $newData = [
            'gpuPrice' => $this->request->getVar('gpuprice'),
          ];
          $Result = $model->save($newData);
          if($Result) {
            $session = session();
            $session->setFlashdata('success', 'Added GPU Price for the month');
          return redirect()->to('GPUsTable');
          } else {
          echo "Something went wrong.";
          }
          }
        }
      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/AddGPU.php",$data);
      echo view("sections/AdminFooter.php");
    }else {
        return redirect()->to('AdminLogin');
      }
      }

    public function AddAdmin(){
      if (session()->get('AdminisLoggedIn')){
        $StaffId = session('StaffId');
        $admin_model = new admin_model();
        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
        //Validation
        $rules = [
          'staffname' => 'required|min_length[2]|max_length[25]',
          'staffemail' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[admin.staffEmail]',
          'staffpassword' => 'required|min_length[8]|max_length[255]',
          'staffpassword_confirm' => 'matches[staffpassword]',
        ];

        if (! $this->validate($rules)) {

          $data['validation'] = $this->validator;

        }else{

          //Storing user registration into database
          $model = new admin_model();

          $newData = [
            'staffName' => $this->request->getVar('staffname'),
            'staffEmail' => $this->request->getVar('staffemail'),
            'stafPassword' => $this->request->getVar('staffpassword'),
          ];
          $Result = $model->save($newData);
          if($Result) {
            $session = session();
            $session->setFlashdata('success', 'Added Admin');

          return redirect()->to('AdminsTable');
          } else {
          echo "Something went wrong.";
          }
          }
        }
      echo view("sections/AdminHeader.php");
      echo view("sections/AdminNavBar.php",$data1);
      echo view("Admin/AddAdmin.php",$data);
      echo view("sections/AdminFooter.php");
    }else {
        return redirect()->to('AdminLogin');
      }
      }

      public function ModifyUser(){
        if (session()->get('AdminisLoggedIn')){
          $StaffId = session('StaffId');
          $admin_model = new admin_model();
          $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
          $usersid = $this->request->getVar('userid');
          $UserModel = new UserModel();
          $data['viewuser'] = $UserModel->where('id', $usersid)->first();

          echo view("sections/AdminHeader.php");
          echo view("sections/AdminNavBar.php",$data1);
          echo view("Admin/ModifyUser.php",$data);
          echo view("sections/AdminFooter.php");
        }else {
          return redirect()->to('AdminLogin');
        }
        }

        public function UpdateModUser(){
          if (session()->get('AdminisLoggedIn')){

            if ($this->request->getMethod() == 'post') {
              //Storing user registration into database
              $updateUsermodel = new UserModel();
              $theid = $this->request->getVar('userid');
              $newUserData = [
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'address' => $this->request->getVar('address'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
              ];

                      $updateUsermodel->set($newUserData);
                      $updateUsermodel->where('id', $theid);
                      $updateUsermodelResult = $updateUsermodel->update();
                            if($updateUsermodelResult) {
                              $session = session();
                              $session->setFlashdata('success', 'Successfully Updated');
                              return redirect()->to('UsersTable');
                            } else {
                              echo "Something went wrong";
                              return redirect()->to();
                            }
            }return redirect()->to('');

          }else {
            return redirect()->to('AdminLogin');
          }
        }

        public function DeleteModUser(){
          if (session()->get('AdminisLoggedIn')){

            if ($this->request->getMethod() == 'post') {
              //Storing user registration into database
              $deleteUsermodel = new UserModel();
              $theid = $this->request->getVar('userid');
              $data['post'] = $deleteUsermodel->where('id', $theid)->delete();
              $deleteUsermodelResult = $data['post'];
                            if($deleteUsermodelResult) {
                              $session = session();
                              $session->setFlashdata('deleted', 'Successfully Deleted');
                              return redirect()->to('UsersTable');
                            } else {
                              echo "Something went wrong";
                              return redirect()->to();
                            }
            }return redirect()->to('');

          }else {
            return redirect()->to('AdminLogin');
          }
        }


        public function ModifyProducts(){
          if (session()->get('AdminisLoggedIn')){
            $StaffId = session('StaffId');
            $admin_model = new admin_model();
            $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
            $data = [];
            helper(['form']);

            if ($this->request->getMethod() == 'post') {
              $productId = $this->request->getVar('prodId');
              $productModel = new product_model();
              $data['viewproduct'] = $productModel->where('ProductId', $productId)->first();

            }
            echo view("sections/AdminHeader.php");
            echo view("sections/AdminNavBar.php",$data1);
            echo view("Admin/ModifyProducts.php",$data);
            echo view("sections/AdminFooter.php");
          }else {
            return redirect()->to('AdminLogin');
          }
          }

          public function UpdateModProduct(){
            if (session()->get('AdminisLoggedIn')){

              if ($this->request->getMethod() == 'post') {
                //Storing user registration into database
                $updateProductmodel = new product_model();
                $theid = $this->request->getVar('productid');
                // $image = file_get_contents($this->request->getFile('productimage'));

                $newData = [
                  'ProductName' => $this->request->getVar('productname'),
                  // 'ProductImage' => $image,
                  'ProductPrice' => $this->request->getVar('productprice'),
                  'ProductCPU' => $this->request->getVar('productcpu'),
                  'ProductGPU' => $this->request->getVar('productgpu'),
                  'ProductMobo' => $this->request->getVar('productmobo'),
                  'ProductRAM' => $this->request->getVar('productram'),
                  'ProductSSD' => $this->request->getVar('productssd'),
                  'ProductPSU' => $this->request->getVar('productpsu'),
                  'ProductCasing' => $this->request->getVar('productcasing'),
                  'ProductOther' => $this->request->getVar('productother'),
                  'ProductCSGO' => $this->request->getVar('productcsgo'),
                  'ProductFortnite' => $this->request->getVar('productfortnite'),
                  'ProductGTAV' => $this->request->getVar('productgtav'),
                  'ProductCyberpunk' => $this->request->getVar('productcyberpunk'),
                  'Product3DMark' => $this->request->getVar('product3dmark'),
                  'ProductGeekbench' => $this->request->getVar('productgeekbench'),

                ];

                        $updateProductmodel->set($newData);
                        $updateProductmodel->where('ProductId', $theid);
                        $updateProductmodelResult = $updateProductmodel->update();
                              if($updateProductmodelResult) {
                                $session = session();
                                $session->setFlashdata('success', 'Successfully Updated');
                                return redirect()->to('ProductsTable');
                              } else {
                                echo "Something went wrong";
                                return redirect()->to();
                              }


              }return redirect()->to('');

            }else {
              return redirect()->to('AdminLogin');
            }
          }


          public function ModifyPromotion(){
            if (session()->get('AdminisLoggedIn')){
              $StaffId = session('StaffId');
              $admin_model = new admin_model();
              $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
              $data = [];
              helper(['form']);

              if ($this->request->getMethod() == 'post') {
                $promoId = $this->request->getVar('promId');
                $promotionModel = new promotion_model();
                $data['viewpromotion'] = $promotionModel->where('PromotionId', $promoId)->first();

              }
              echo view("sections/AdminHeader.php");
              echo view("sections/AdminNavBar.php",$data1);
              echo view("Admin/ModifyPromotion.php",$data);
              echo view("sections/AdminFooter.php");
            }else {
              return redirect()->to('AdminLogin');
            }
            }

            public function UpdateModPromotion(){
              if (session()->get('AdminisLoggedIn')){

                if ($this->request->getMethod() == 'post') {
                  //Storing user registration into database
                  $model = new promotion_model();
                  $theid = $this->request->getVar('promotionid');
                  // $image = file_get_contents($this->request->getFile('productimage'));

                  $newData = [
                    'PromotionName' => $this->request->getVar('promotionname'),
                    'PromotionStatus' => $this->request->getVar('promotionstatus'),
                    // 'PromotionImage' => $image,
                    'PromotionOriPrice' => $this->request->getVar('promotionoriprice'),
                    'PromotionPrice' => $this->request->getVar('promotionprice'),
                    'PromotionCPU' => $this->request->getVar('promotioncpu'),
                    'PromotionGPU' => $this->request->getVar('promotiongpu'),
                    'PromotionMobo' => $this->request->getVar('promotionmobo'),
                    'PromotionRAM' => $this->request->getVar('promotionram'),
                    'PromotionSSD' => $this->request->getVar('promotionssd'),
                    'PromotionPSU' => $this->request->getVar('promotionpsu'),
                    'PromotionCasing' => $this->request->getVar('promotioncasing'),
                    'PromotionOther' => $this->request->getVar('promotionother'),
                    'NonPCDetails' => $this->request->getVar('nonpcdetails'),
                    'PromotionDetail1' => $this->request->getVar('promotiondetail1'),
                    'PromotionDetail2' => $this->request->getVar('promotiondetail2'),
                    'PromotionDetail3' => $this->request->getVar('promotiondetail3'),
                    'PromotionDetail4' => $this->request->getVar('promotiondetail4'),

                  ];

                          $model->set($newData);
                          $model->where('promotionid', $theid);
                          $updatePromotionmodelResult = $model->update();
                                if($updatePromotionmodelResult) {
                                  $session = session();
                                  $session->setFlashdata('success', 'Successfully Updated');
                                  return redirect()->to('PromotionsTable');
                                } else {
                                  echo "Something went wrong";
                                  return redirect()->to();
                                }


                }return redirect()->to('');

              }else {
                return redirect()->to('AdminLogin');
              }
            }

              public function ModifyComponents(){
                if (session()->get('AdminisLoggedIn')){
                  $StaffId = session('StaffId');
                  $admin_model = new admin_model();
                  $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
                  $data = [];
                  helper(['form']);

                  if ($this->request->getMethod() == 'post') {
                    $compoId = $this->request->getVar('compId');
                    $componentModel = new component_model();
                    $data['viewcomponent'] = $componentModel->where('ComponentId', $compoId)->first();

                  }
                  echo view("sections/AdminHeader.php");
                  echo view("sections/AdminNavBar.php",$data1);
                  echo view("Admin/ModifyComponents.php",$data);
                  echo view("sections/AdminFooter.php");
                }else {
                  return redirect()->to('AdminLogin');
                }
                }

                public function UpdateModComponent(){
                  if (session()->get('AdminisLoggedIn')){

                    if ($this->request->getMethod() == 'post') {
                      //Storing user registration into database
                      $model = new component_model();
                      $theid = $this->request->getVar('componentid');
                      // $image = file_get_contents($this->request->getFile('productimage'));

                      $newData = [
                        'ComponentName' => $this->request->getVar('componentname'),
                        'ComponentType' => $this->request->getVar('componenttype'),
                        'ComponentBrand' => $this->request->getVar('compbrand'),
                        // 'ComponentImage' => $image,
                        'ComponentDetails' => $this->request->getVar('componentdetails'),
                        'ComponentPrice' => $this->request->getVar('componentprice'),

                      ];

                              $model->set($newData);
                              $model->where('componentid', $theid);
                              $updatePromotionmodelResult = $model->update();
                                    if($updatePromotionmodelResult) {
                                      $session = session();
                                      $session->setFlashdata('success', 'Successfully Updated');
                                      return redirect()->to('ComponentsTable');
                                    } else {
                                      echo "Something went wrong";
                                      return redirect()->to();
                                    }


                    }return redirect()->to('');

                  }else {
                    return redirect()->to('AdminLogin');
                  }
                }

                public function ModifyReward(){
                  if (session()->get('AdminisLoggedIn')){
                    $StaffId = session('StaffId');
                    $admin_model = new admin_model();
                    $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
                    $data = [];
                    helper(['form']);

                    if ($this->request->getMethod() == 'post') {
                      $rewardId = $this->request->getVar('rewId');
                      $rewardModel = new reward_model();
                      $data['viewreward'] = $rewardModel->where('RewardID', $rewardId)->first();

                    }
                    echo view("sections/AdminHeader.php");
                    echo view("sections/AdminNavBar.php",$data1);
                    echo view("Admin/ModifyReward.php",$data);
                    echo view("sections/AdminFooter.php");
                  }else {
                    return redirect()->to('AdminLogin');
                  }
                  }


                  public function UpdateModReward(){
                    if (session()->get('AdminisLoggedIn')){

                      if ($this->request->getMethod() == 'post') {
                        //Storing user registration into database
                        $model = new reward_model();
                        $theid = $this->request->getVar('rewardId');
                        // $image = file_get_contents($this->request->getFile('productimage'));

                        $newData = [
                          'RewardName' => $this->request->getVar('rewardname'),
                          // 'RewardImage' => $image,
                          'RewardTier' => $this->request->getVar('rewardtier'),

                        ];

                                $model->set($newData);
                                $model->where('RewardID', $theid);
                                $updatePromotionmodelResult = $model->update();
                                      if($updatePromotionmodelResult) {
                                        $session = session();
                                        $session->setFlashdata('success', 'Successfully Updated');
                                        return redirect()->to('RewardsTable');
                                      } else {
                                        echo "Something went wrong";
                                        return redirect()->to();
                                      }


                      }return redirect()->to('');

                    }else {
                      return redirect()->to('AdminLogin');
                    }
                  }

                  public function ViewPayment(){
                    if (session()->get('AdminisLoggedIn')){
                      $StaffId = session('StaffId');
                      $admin_model = new admin_model();
                      $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
                      $data = [];
                      helper(['form']);

                      if ($this->request->getMethod() == 'post') {
                        $paymntId = $this->request->getVar('payId');
                        $paymentModel = new payment_model();
                        $data['viewpayment'] = $paymentModel->where('PaymentId', $paymntId)->first();

                      }
                      echo view("sections/AdminHeader.php");
                      echo view("sections/AdminNavBar.php",$data1);
                      echo view("Admin/ViewPayment.php",$data);
                      echo view("sections/AdminFooter.php");
                    }else {
                      return redirect()->to('AdminLogin');
                    }
                    }

                    public function ModifyOrder(){
                      if (session()->get('AdminisLoggedIn')){
                        $StaffId = session('StaffId');
                        $admin_model = new admin_model();
                        $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
                        $data = [];
                        helper(['form']);

                        if ($this->request->getMethod() == 'post') {
                          $UserModel = new UserModel();
                          $data['useridData'] = $UserModel->orderBy('id', 'ASC') ->findAll();
                          $payment_model = new payment_model();
                          $data['paymntidData'] = $payment_model->orderBy('PaymentId', 'ASC') ->findAll();

                          $orderId = $this->request->getVar('ordrId');
                          $orderModel = new order_model();
                          $data['vieworder'] = $orderModel->where('orderId', $orderId)->first();

                        }
                        echo view("sections/AdminHeader.php");
                        echo view("sections/AdminNavBar.php",$data1);
                        echo view("Admin/ModifyOrder.php",$data);
                        echo view("sections/AdminFooter.php");
                      }else {
                        return redirect()->to('AdminLogin');
                      }
                      }

                      public function UpdateModOrder(){
                        if (session()->get('AdminisLoggedIn')){

                          if ($this->request->getMethod() == 'post') {
                            //Storing user registration into database
                            $model = new order_model();
                            $theid = $this->request->getVar('orderId');

                            $newData = [
                              'userId' => $this->request->getVar('orderusrid'),
                              'paymentId' => $this->request->getVar('orderpaymntid'),
                              'shippingAddress' => $this->request->getVar('shippingadd'),
                              'itemsOrdered' => $this->request->getVar('itemordr'),
                              'grandTotal' => $this->request->getVar('itemtotal'),
                              'orderStatus' => $this->request->getVar('orderstatus'),

                            ];

                                    $model->set($newData);
                                    $model->where('orderId', $theid);
                                    $updatePromotionmodelResult = $model->update();
                                          if($updatePromotionmodelResult) {
                                            $session = session();
                                            $session->setFlashdata('success', 'Successfully Updated');
                                            return redirect()->to('OrdersTable');
                                          } else {
                                            echo "Something went wrong";
                                            return redirect()->to();
                                          }


                          }return redirect()->to('');

                        }else {
                          return redirect()->to('AdminLogin');
                        }
                      }

                      public function ModifyCPU(){
                        if (session()->get('AdminisLoggedIn')){
                          $StaffId = session('StaffId');
                          $admin_model = new admin_model();
                          $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
                          $data = [];
                          helper(['form']);

                          if ($this->request->getMethod() == 'post') {

                            $cpuid = $this->request->getVar('thecpuId');
                            $cpuModel = new cpu_model();
                            $data['viewcpu'] = $cpuModel->where('cpuId', $cpuid)->first();

                          }
                          echo view("sections/AdminHeader.php");
                          echo view("sections/AdminNavBar.php",$data1);
                          echo view("Admin/ModifyCPU.php",$data);
                          echo view("sections/AdminFooter.php");
                        }else {
                          return redirect()->to('AdminLogin');
                        }
                        }

                        public function UpdateModCPU(){
                          if (session()->get('AdminisLoggedIn')){

                            if ($this->request->getMethod() == 'post') {
                              //Storing user registration into database
                              $model = new cpu_model();
                              $theid = $this->request->getVar('cpuId');

                              $newData = [
                                'cpuPrice' => $this->request->getVar('cpuprice'),
                              ];

                                      $model->set($newData);
                                      $model->where('cpuId', $theid);
                                      $updatePromotionmodelResult = $model->update();
                                            if($updatePromotionmodelResult) {
                                              $session = session();
                                              $session->setFlashdata('success', 'Successfully Updated');
                                              return redirect()->to('CPUsTable');
                                            } else {
                                              echo "Something went wrong";
                                              return redirect()->to();
                                            }


                            }return redirect()->to();

                          }else {
                            return redirect()->to('AdminLogin');
                          }
                        }

                        public function ModifyGPU(){
                          if (session()->get('AdminisLoggedIn')){
                            $StaffId = session('StaffId');
                            $admin_model = new admin_model();
                            $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
                            $data = [];
                            helper(['form']);

                            if ($this->request->getMethod() == 'post') {

                              $gpuid = $this->request->getVar('thegpuId');
                              $gpuModel = new gpu_model();
                              $data['viewgpu'] = $gpuModel->where('gpuId', $gpuid)->first();

                            }
                            echo view("sections/AdminHeader.php");
                            echo view("sections/AdminNavBar.php",$data1);
                            echo view("Admin/ModifyGPU.php",$data);
                            echo view("sections/AdminFooter.php");
                          }else {
                            return redirect()->to('AdminLogin');
                          }
                          }

                          public function UpdateModGPU(){
                            if (session()->get('AdminisLoggedIn')){

                              if ($this->request->getMethod() == 'post') {
                                //Storing user registration into database
                                $model = new gpu_model();
                                $theid = $this->request->getVar('gpuId');

                                $newData = [
                                  'gpuPrice' => $this->request->getVar('gpuprice'),
                                ];

                                        $model->set($newData);
                                        $model->where('gpuId', $theid);
                                        $updatePromotionmodelResult = $model->update();
                                              if($updatePromotionmodelResult) {
                                                $session = session();
                                                $session->setFlashdata('success', 'Successfully Updated');
                                                return redirect()->to('GPUsTable');
                                              } else {
                                                echo "Something went wrong";
                                                return redirect()->to();
                                              }


                              }return redirect()->to();

                            }else {
                              return redirect()->to('AdminLogin');
                            }
                          }


                          public function ModifyAdmin(){
                            if (session()->get('AdminisLoggedIn')){
                              $StaffId = session('StaffId');
                              $admin_model = new admin_model();
                              $data1['adminData'] = $admin_model->where('StaffId', $StaffId)->first();
                              $data = [];
                              helper(['form']);

                              if ($this->request->getMethod() == 'post') {
                                $theadminid = $this->request->getVar('adminid');
                                $adminModel = new admin_model();
                                $data['viewadmin'] = $adminModel->where('StaffId', $theadminid)->first();
                              }
                              echo view("sections/AdminHeader.php");
                              echo view("sections/AdminNavBar.php",$data1);
                              echo view("Admin/ModifyAdmin.php",$data);
                              echo view("sections/AdminFooter.php");
                            }else {
                              return redirect()->to('AdminLogin');
                            }
                            }
                            public function UpdateModAdmin(){
                              if (session()->get('AdminisLoggedIn')){

                                if ($this->request->getMethod() == 'post') {
                                  //Storing user registration into database
                                  $model = new admin_model();
                                  $theid = $this->request->getVar('StaffId');
                                  $newUserData = [
                                    'staffName' => $this->request->getVar('staffname'),
                                    'staffEmail' => $this->request->getVar('staffemail'),
                                    'stafPassword' => $this->request->getVar('staffpassword'),
                                  ];

                                          $model->set($newUserData);
                                          $model->where('StaffId', $theid);
                                          $updateAdminResult = $model->update();
                                                if($updateAdminResult) {
                                                  $session = session();
                                                  $session->setFlashdata('success', 'Successfully Updated');
                                                  return redirect()->to('AdminsTable');
                                                } else {
                                                  echo "Something went wrong";
                                                  return redirect()->to();
                                                }
                                }return redirect()->to('');

                              }else {
                                return redirect()->to('AdminLogin');
                              }
                            }

}
