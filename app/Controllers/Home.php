<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {

        echo view("Home/index.php");
    }

    public function Login()
    {
      $data = [];
      helper(['form']);

      		if ($this->request->getMethod() == 'post') {
      			//Validation
      			$rules = [
      				'email' => 'required|min_length[6]|max_length[50]|valid_email',
      				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
      			];

      			$errors = [
      				'password' => [
      					'validateUser' => 'Email or Password don\'t match'
      				]
      			];

      			if (! $this->validate($rules, $errors)) {
      				$data['validation'] = $this->validator;
      			}else{
      				$model = new UserModel();

      				$user = $model->where('email', $this->request->getVar('email'))
      											->first();

      				$this->setUserSession($user);

      				return redirect()->to('/');

      			}
      		}

        echo view("Home/Login.php", $data);
    }
      private function setUserSession($user){
    		  $data = [
    			     'id' => $user['id'],
    			     'firstname' => $user['firstname'],
    		     	 'lastname' => $user['lastname'],
    			     'email' => $user['email'],
    			     'isLoggedIn' => true,
    		  ];

    		    session()->set($data);
    		      return true;
    	 }

    public function Register()
    {
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
        //Storing user reistration into database
				$model = new UserModel();

				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
          'address' => $this->request->getVar('address'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('Login');
			}
		}
        echo view("Home/Register.php",$data);

    }

    public function logout(){
  		session()->destroy();
  		return redirect()->to('/');
  	}

    public function Promotion()
    {
        echo view("Home/Promotion.php");
    }
    public function Build_PC()
    {
        echo view("Home/Build_PC.php");
    }
    public function Products()
    {
        echo view("Home/Products.php");
    }
    public function Cart()
    {
        echo view("Home/Cart.php");
    }
}
