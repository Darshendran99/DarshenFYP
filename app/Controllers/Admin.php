<?php

namespace App\Controllers;

use App\Models\admin_model;

class Admin extends BaseController
{
    public function index()
    {
        echo view("sections/AdminHeader.php");
        echo view("sections/AdminNavBar.php");
        echo view("Admin/index.php");
        echo view("sections/AdminFooter.php");
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
  'password' => $this->request->getVar('password'),
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
        echo view("sections/AdminHeader.php");
        echo view("Admin/Login.php");
        echo view("sections/AdminFooter.php");
    }

    public function UsersTable()
    {

        echo view("Admin/UsersTable.php");

    }
}
