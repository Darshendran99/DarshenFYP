<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\product_model;
use App\Models\promotion_model;
use App\Models\component_model;
use App\Models\gpu_model;
use App\Models\cpu_model;
use App\Models\cart_model;
use App\Models\payment_model;

class Home extends BaseController
{
    public function index()
    {
      $product_model = new product_model();
      $promotion_model = new promotion_model();
      $data['product'] = $product_model->orderBy('ProductPrice', 'ASC')->first();
      $data['promotion'] = $promotion_model->orderBy('PromotionPrice', 'ASC')->first();

      $db = \Config\Database::connect();
              $builder = $db->table('gpuchart');
              $query = $builder->select("COUNT(gpuId) as count, gpuPrice as s, MONTHNAME(gpuUpdatedDate) as month");
              $query = $builder->where("MONTH(gpuUpdatedDate) GROUP BY MONTHNAME(gpuUpdatedDate), s");
              $query = $builder->orderBy("MONTH(gpuUpdatedDate)","asc")->get();
              $record = $query->getResult();
              $gpuchart = [];
              foreach($record as $row) {
                  $gpuchart[] = array(
                      'month'   => $row->month,
                      'sell' => floatval($row->s)
                  );
              }

              $data['gpuchart'] = ($gpuchart);

              $db = \Config\Database::connect();
                      $builder = $db->table('cpuchart');
                      $query = $builder->select("COUNT(cpuId) as count, cpuPrice as s, MONTHNAME(cpuUpdatedDate) as month");
                      $query = $builder->where("MONTH(cpuUpdatedDate) GROUP BY MONTHNAME(cpuUpdatedDate), s");
                      $query = $builder->orderBy("MONTH(cpuUpdatedDate)","asc")->get();
                      $record = $query->getResult();
                      $cpuchart = [];
                      foreach($record as $row) {
                          $cpuchart[] = array(
                              'month'   => $row->month,
                              'sell' => floatval($row->s)
                          );
                      }

                      $data['cpuchart'] = ($cpuchart);


      echo view("sections/Header.php");
      return view("Home/index.php", $data);

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

        echo view("sections/Header.php");
        echo view("Home/Login.php", $data);
        echo view("sections/Footer.php");
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
        //Storing user registration into database
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
        echo view("sections/Header.php");
        echo view("Home/Register.php",$data);
        echo view("sections/Footer.php");

    }

    public function logout(){
      session()->destroy();
      return redirect()->to('/');
    }

    public function Build_PC()
    {
      $component_model = new component_model();
      $data['component'] = $component_model->orderBy('ComponentId', 'ASC') ->findAll();

      echo view("sections/Header.php");
      return view ("Home/Build_PC.php",$data);
    }
    public function Products()
    {
      $product_model = new product_model();
      $data['product'] = $product_model->orderBy('CreatedOn', 'DESC') ->findAll();

      echo view("sections/Header.php");
      return view ("Home/Products.php",$data);
    }

    public function ProductDetails($ProductId = null){
      $product_model = new product_model();
      $data['product'] = $product_model->where('ProductId', $ProductId)->first();
      echo view("sections/Header.php");
      return view("Home/ProductDetails.php", $data);
    }

    public function Promotion()
    {
      $promotion_model = new promotion_model();
      $data['promotion'] = $promotion_model->orderBy('PromoCreatedOn', 'DESC') ->findAll();

      echo view("sections/Header.php");
      return view ("Home/Promotion.php",$data);
    }

    public function PromotionDetails($PromotionId = null){
      $promotion_model = new promotion_model();
      $data['promotion'] = $promotion_model->where('PromotionId', $PromotionId)->first();
      echo view("sections/Header.php");
      return view("Home/PromotionDetails.php", $data);
    }

public function AddCart1($ProductId){

  if (session()->get('isLoggedIn')){
      $id = session('id');
      $product_model = new product_model();
      $data['product'] = $product_model->where('ProductId', $ProductId)->findAll();
      $productCartitem = $data['product'];

      foreach ($productCartitem as $productValidation) {
        $cart_model = new cart_model();
        $data['cart'] = $cart_model->where('uid', $id)->findAll();
        $cart = $data['cart'];
        // If table is empty, nothing in this foreach loop work
        echo count($cart);  
        foreach ($cart as $cart ) {

          if ($productValidation['ProductName'] == $cart['itemName'] ) {

            $array = ['uid' => $id, 'ProductId' => $ProductId];
            $data['updateCart'] = $cart_model->where($array)->findAll();
            $updateCart = $data['updateCart'];
            foreach ($updateCart as $updateCart ) {
              $QuantityValue = $updateCart['itemQuantity'];
              }

              $Update_cart_model = new cart_model();
              $Update_cart_model->set('itemQuantity', $QuantityValue + 1);
              $Update_cart_model->where('id', $id);
              $Update_cart_model->where('ProductId', $ProductId);
              $updateResult = $Update_cart_model->update();


              if($updateResult) {
              echo "Added To Cart.";
            } else {
              echo "Something went wrong";
              echo "<br>";
              echo $QuantityValue + 1;
              echo "<br>";
              echo $id;
              echo "<br>";
              echo $ProductId;
            }


          }else if ($productValidation['ProductName'] != $cart['itemName'] ) {

            foreach ($productCartitem as $productCartitem) {
              $cart_model = new cart_model();
              $cartData1 = [
                'uid' => session('id'),
                'ProductId' => $productCartitem['ProductId'],
                'itemName' => $productCartitem['ProductName'],
                'itemImage' => $productCartitem['ProductImage'],
                'itemPrice' => $productCartitem['ProductPrice'],
              ];
        }
              $result1 = $cart_model->save($cartData1);
              if($result1) {
              echo "Added To Cart.";
            } else {
              echo "Something went wrong";
            }


          }else{
            foreach ($productCartitem as $productCartitem) {
              $cart_model = new cart_model();
              $cartData1 = [
                'uid' => session('id'),
                'ProductId' => $productCartitem['ProductId'],
                'itemName' => $productCartitem['ProductName'],
                'itemImage' => $productCartitem['ProductImage'],
                'itemPrice' => $productCartitem['ProductPrice'],
              ];
        }
              $result1 = $cart_model->save($cartData1);
              if($result1) {
              echo "Added To Cart.";
            } else {
              echo "Something went wrong";
            }
          }

        }

      }



        return redirect()->to();
        }else {
          return redirect()->to('Login');
      }
}

public function AddCart2($PromotionId){

  if (session()->get('isLoggedIn')){

      $promotion_model = new promotion_model();
      $data['promotion'] = $promotion_model->where('PromotionId', $PromotionId)->findAll();
      $promotionCartitem = $data['promotion'];


      foreach ($promotionCartitem as $promotionCartitem) {
        $cart_model = new cart_model();
        $cartData2 = [

          'uid' => session('id'),
          'PromotionId' => $promotionCartitem['PromotionId'],
          'itemName' => $promotionCartitem['PromotionName'],
          'itemImage' => $promotionCartitem['PromotionImage'],
          'itemPrice' => $promotionCartitem['PromotionPrice'],

        ];

}

        $result2 = $cart_model->save($cartData2);

        if($result2) {
        echo "Added To Cart.";
      } else {
        echo "Something went wrong";
      }

        return redirect()->to('Cart');
        }else {
          return redirect()->to('Login');
      }
}


public function AddCart3()
{
  $data = [];
  helper(['form']);

  if ($this->request->getMethod() == 'post') {

    //Storing user registration into database
    $ComponentCartmodel = new cart_model();

    $newData = [
      'ComponentId' => $this->request->getVar('text11'),

    ];

    $ComponentResult = $ComponentCartmodel->save($newData);
    if($ComponentResult) {
    echo "Added To Cart.";
  } else {
    echo "Something went wrong";
  }
    return redirect()->to();
  }




}



    public function Cart()
    {
      $id = session('id');
      $cart_model = new cart_model();
      $data['cart'] = $cart_model->where('uid', $id)->findAll();

      echo view("sections/Header.php");
      return view("Home/Cart.php",$data);
       }

       public function Payment()
       {
         $id = session('id');
         $cart_model = new cart_model();
         $data['cart'] = $cart_model->where('uid', $id)->findAll();



         helper(['form']);

         if ($this->request->getMethod() == 'post') {
         //Validation
         $rules = [
           'name' => 'required|min_length[2]|max_length[25]|alpha_space',
           'email' => 'required|min_length[6]|max_length[50]|valid_email',
           'address' => 'required|min_length[10]|max_length[255]|alpha_numeric_punct',
           'city' => 'required|min_length[4]|max_length[50]|alpha_space',
           'state' => 'required|min_length[4]|max_length[50]|alpha',
           'zip' => 'required|min_length[4]|max_length[50]|integer',
           'cardname' => 'required|min_length[4]|max_length[26]|alpha',
           'cardnumber' => 'required|min_length[14]|max_length[16]|integer',
           'expmonth' => 'required|min_length[3]|max_length[9]|alpha',
           'expyear' => 'required|min_length[3]|max_length[9]|integer',
           'cvv' => 'required|min_length[3]|max_length[3]|integer',

         ];

         $PaymentAddress = $this->request->getVar('address').",".$this->request->getVar('city').",".$this->request->getVar('state').",".$this->request->getVar('zip');
         $CardDetails = $this->request->getVar('cardname').",".$this->request->getVar('cardnumber').",".$this->request->getVar('expmonth').",".$this->request->getVar('expyear').",".$this->request->getVar('cvv');
         $total_price_sum = $this->request->getVar('totalPrice');

         if (! $this->validate($rules)) {
           $data['validation'] = $this->validator;
         }else{
           $payment_model = new payment_model();

           $newData = [
             'userid' => session('id'),
             'Name' => $this->request->getVar('name'),
             'PaymentEmail' => $this->request->getVar('email'),
             'PaymentAddress' => $PaymentAddress,
             'CardDetails' => $CardDetails,
             'PaymentTotal' => $total_price_sum,
             'PaidItems' => $this->request->getVar('totalItem'),
           ];
           $paymentReward = $payment_model->save($newData);
           if($paymentReward) {
           echo "Added To Cart.";
         } else {

           echo "Something went wrong";
         }
         if ($total_price_sum > 6000) {
           return redirect()->to();
         }else{
          return redirect()->to('');
           }
         }
       }
       echo view("sections/Header.php");
       return view("Home/Payment.php",$data);

         }


      public function Game()
      {
        $data = [];

        echo view("sections/Header.php");
        echo view("Home/Game.php",$data);
        echo view("sections/Footer.php");
      }

}
