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
}
