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
use App\Models\order_model;
use App\Models\reward_model;

class Home extends BaseController
{
    public function index()
    {
      $product_model = new product_model();
      $promotion_model = new promotion_model();
      $component_model = new component_model();
      $data['product'] = $product_model->orderBy('ProductPrice', 'ASC')->first();
      $data['promotion'] = $promotion_model->orderBy('PromotionPrice', 'ASC')->first();
      $data['component'] = $component_model->orderBy('ComponentPrice', 'ASC')->first();

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
              $model = new UserModel();
              $user = $model->where('email', $this->request->getVar('email'))
                            ->first();
              $this->setUserSession($user);
              return redirect()->to('/');
            }else{
              // Recaptcha
              $session = session();
                $session->setFlashdata('msg', 'Please Complete Captcha');
            }
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
      }else{
        // Recaptcha
        $session = session();
          $session->setFlashdata('msg', 'Please Complete Captcha');
      }
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
// Product
  if (session()->get('isLoggedIn')){
      $id = session('id');
      $product_model = new product_model();
      $data['product'] = $product_model->where('ProductId', $ProductId)->findAll();
      $productCartitem = $data['product'];


        $cart_model = new cart_model();
        $array = ['uid' => $id, 'ProductId' => $ProductId];
        $data['cart'] = $cart_model->where($array)->findAll();
        $cart = $data['cart'];

        $NumberOfCartItem = count($cart);

        if ($NumberOfCartItem > 0 ) {
            foreach ($cart as $cart ) {

            $array = ['uid' => $id, 'ProductId' => $ProductId];
            $data['updateCart'] = $cart_model->where($array)->findAll();
            $updateCart = $data['updateCart'];
            foreach ($updateCart as $updateCart ) {
              $QuantityValue = $updateCart['itemQuantity'];
              }

              $Update_cart_model = new cart_model();
              $Update_cart_model->set('itemQuantity', $QuantityValue + 1);
              $Update_cart_model->where('uid', $id);
              $Update_cart_model->where('ProductId', $ProductId);
              $updateResult = $Update_cart_model->update();


              if($updateResult) {
              echo "Added To Cart.";
            } else {
              echo "Something went wrong";
            }
          }
          echo "Does not work";
          }else {

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
          return redirect()->to('Cart');

        }else {
          return redirect()->to('Login');
      }
}

public function AddCart2($PromotionId){
// Promotion
  if (session()->get('isLoggedIn')){
      $id = session('id');
      $promotion_model = new promotion_model();
      $data['promotion'] = $promotion_model->where('PromotionId', $PromotionId)->findAll();
      $promotionCartitem = $data['promotion'];

        $cart_model = new cart_model();
        $array = ['uid' => $id, 'PromotionId' => $PromotionId];
        $data['cart'] = $cart_model->where($array)->findAll();
        $cart = $data['cart'];

        $NumberOfCartItem = count($cart);

        if ($NumberOfCartItem > 0 ) {
          foreach ($cart as $cart ) {

          $array = ['uid' => $id, 'PromotionId' => $PromotionId];
          $data['updateCart'] = $cart_model->where($array)->findAll();
          $updateCart = $data['updateCart'];
          foreach ($updateCart as $updateCart ) {
            $QuantityValue = $updateCart['itemQuantity'];
            }

            $Update_cart_model = new cart_model();
            $Update_cart_model->set('itemQuantity', $QuantityValue + 1);
            $Update_cart_model->where('uid', $id);
            $Update_cart_model->where('PromotionId', $PromotionId);
            $updateResult = $Update_cart_model->update();


            if($updateResult) {
            echo "Added To Cart.";
          } else {
            echo "Something went wrong";
          }
        }
          echo "Does not work";
          }else {

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
            }
          return redirect()->to('Cart');

        }else {
          return redirect()->to('Login');
      }
}


public function AddCart3(){
  // BuildYourPC
  $data = [];
  helper(['form']);

  if ($this->request->getMethod() == 'post') {
// IntelCPU
    $intelCpuComponent = $this->request->getVar('intelCpu');
    if ($intelCpuComponent != ""){
      $Componentmodel = new component_model();
      $data['component1'] = $Componentmodel->where('ComponentId', $intelCpuComponent)->first();
      $getComponentData1 = $data['component1'];

    $ComponentCartmodel1 = new cart_model();
    $cartData3 = [
      'uid' => session('id'),
      'ComponentId' => $getComponentData1['ComponentId'],
      'itemName' => $getComponentData1['ComponentName'],
      'itemImage' => $getComponentData1['ComponentImage'],
      'itemPrice' => $getComponentData1['ComponentPrice'],
    ];

    $ComponentResult1 = $ComponentCartmodel1->save($cartData3);
    if($ComponentResult1) {
    echo "Intel CPU Added To Cart.";
    echo "<br>";
  } else {
    echo "Something went wrong";
  }
}
// AMD CPU

    $amdCpuComponent = $this->request->getVar('amdCpu');

    if ($amdCpuComponent != ""){
      $Componentmodel2 = new component_model();
      $data['component2'] = $Componentmodel2->where('ComponentId', $amdCpuComponent)->first();
      $getComponentData2 = $data['component2'];

    $ComponentCartmodel2 = new cart_model();
    $cartData4 = [
      'uid' => session('id'),
      'ComponentId' => $getComponentData2['ComponentId'],
      'itemName' => $getComponentData2['ComponentName'],
      'itemImage' => $getComponentData2['ComponentImage'],
      'itemPrice' => $getComponentData2['ComponentPrice'],
    ];

    $ComponentResult2 = $ComponentCartmodel2->save($cartData4);
    if($ComponentResult2) {
    echo "AMD CPU Added To Cart.";
    echo "<br>";
  } else {
    echo "Something went wrong";
  }
}
// Intel Motherboard
    $intelMoboComponent = $this->request->getVar('intelMobo');

    if ($intelMoboComponent != ""){
      $Componentmodel3 = new component_model();
      $data['component3'] = $Componentmodel3->where('ComponentId', $intelMoboComponent)->first();
      $getComponentData3 = $data['component3'];

    $ComponentCartmodel3 = new cart_model();
    $cartData5 = [
      'uid' => session('id'),
      'ComponentId' => $getComponentData3['ComponentId'],
      'itemName' => $getComponentData3['ComponentName'],
      'itemImage' => $getComponentData3['ComponentImage'],
      'itemPrice' => $getComponentData3['ComponentPrice'],
    ];

    $ComponentResult3 = $ComponentCartmodel3->save($cartData5);
    if($ComponentResult3) {
    echo "Intel Motherboard Added To Cart.";
    echo "<br>";
  } else {
    echo "Something went wrong";
  }
}
// AMD Motherboard
    $amdMoboComponent = $this->request->getVar('amdMobo');
    if ($amdMoboComponent != ""){
      $Componentmodel4 = new component_model();
      $data['component4'] = $Componentmodel4->where('ComponentId', $amdMoboComponent)->first();
      $getComponentData4 = $data['component4'];

    $ComponentCartmodel4 = new cart_model();
    $cartData6 = [
      'uid' => session('id'),
      'ComponentId' => $getComponentData4['ComponentId'],
      'itemName' => $getComponentData4['ComponentName'],
      'itemImage' => $getComponentData4['ComponentImage'],
      'itemPrice' => $getComponentData4['ComponentPrice'],
    ];

    $ComponentResult4 = $ComponentCartmodel4->save($cartData6);
    if($ComponentResult4) {
    echo "AMD Motherboard Added To Cart.";
    echo "<br>";
  } else {
    echo "Something went wrong";
  }
}
// Intel GPU
    $intelGpuComponent = $this->request->getVar('intelGpu');
    if ($intelGpuComponent != ""){
      $Componentmodel5 = new component_model();
      $data['component5'] = $Componentmodel5->where('ComponentId', $intelGpuComponent)->first();
      $getComponentData5 = $data['component5'];

    $ComponentCartmodel5 = new cart_model();
    $cartData7 = [
      'uid' => session('id'),
      'ComponentId' => $getComponentData5['ComponentId'],
      'itemName' => $getComponentData5['ComponentName'],
      'itemImage' => $getComponentData5['ComponentImage'],
      'itemPrice' => $getComponentData5['ComponentPrice'],
    ];

    $ComponentResult5 = $ComponentCartmodel5->save($cartData7);
    if($ComponentResult5) {
    echo "Intel GPU Added To Cart.";
    echo "<br>";
  } else {
    echo "Something went wrong";
  }
}
// AMD GPU
    $amdGpuComponent = $this->request->getVar('amdGpu');
    if ($amdGpuComponent != ""){
      $Componentmodel6 = new component_model();
      $data['component6'] = $Componentmodel6->where('ComponentId', $amdGpuComponent)->first();
      $getComponentData6 = $data['component6'];

    $ComponentCartmodel6 = new cart_model();
    $cartData7 = [
      'uid' => session('id'),
      'ComponentId' => $getComponentData6['ComponentId'],
      'itemName' => $getComponentData6['ComponentName'],
      'itemImage' => $getComponentData6['ComponentImage'],
      'itemPrice' => $getComponentData6['ComponentPrice'],
    ];

    $ComponentResult6 = $ComponentCartmodel6->save($cartData7);
    if($ComponentResult6) {
    echo "AMD GPU Added To Cart.";
    echo "<br>";
  } else {
    echo "Something went wrong";
  }
}
// NIVDIA GPU
    $nvidiaGpuComponent = $this->request->getVar('nvidiaGpu');
    if ($nvidiaGpuComponent != ""){
      $Componentmodel6 = new component_model();
      $data['component7'] = $Componentmodel6->where('ComponentId', $nvidiaGpuComponent)->first();
      $getComponentData7 = $data['component7'];

    $ComponentCartmodel7 = new cart_model();
    $cartData8 = [
      'uid' => session('id'),
      'ComponentId' => $getComponentData7['ComponentId'],
      'itemName' => $getComponentData7['ComponentName'],
      'itemImage' => $getComponentData7['ComponentImage'],
      'itemPrice' => $getComponentData7['ComponentPrice'],
    ];

    $ComponentResult7 = $ComponentCartmodel7->save($cartData8);
    if($ComponentResult7) {
    echo "NIVDIA GPU Added To Cart.";
    echo "<br>";
  } else {
    echo "Something went wrong";
  }
}
// RAM
    $ram_Component = $this->request->getVar('ram_');
    if ($ram_Component != ""){
      $Componentmodel7 = new component_model();
      $data['component8'] = $Componentmodel7->where('ComponentId', $ram_Component)->first();
      $getComponentData7 = $data['component8'];

    $ComponentCartmodel8 = new cart_model();
    $cartData9 = [
      'uid' => session('id'),
      'ComponentId' => $getComponentData7['ComponentId'],
      'itemName' => $getComponentData7['ComponentName'],
      'itemImage' => $getComponentData7['ComponentImage'],
      'itemPrice' => $getComponentData7['ComponentPrice'],
    ];

    $ComponentResult8 = $ComponentCartmodel8->save($cartData9);
    if($ComponentResult8) {
    echo "RAM Added To Cart.";
    echo "<br>";
  } else {
    echo "Something went wrong";
  }
}
// SSD
    $ssd_Component = $this->request->getVar('ssd_');
    if ($ssd_Component != ""){
      $Componentmodel8 = new component_model();
      $data['component9'] = $Componentmodel8->where('ComponentId', $ssd_Component)->first();
      $getComponentData8 = $data['component9'];

    $ComponentCartmodel9 = new cart_model();
    $cartData10 = [
      'uid' => session('id'),
      'ComponentId' => $getComponentData8['ComponentId'],
      'itemName' => $getComponentData8['ComponentName'],
      'itemImage' => $getComponentData8['ComponentImage'],
      'itemPrice' => $getComponentData8['ComponentPrice'],
    ];

    $ComponentResult9 = $ComponentCartmodel9->save($cartData10);
    if($ComponentResult9) {
    echo "SSD Added To Cart.";
    echo "<br>";
  } else {
    echo "Something went wrong";
  }
}
// PSU
    $psu_Component = $this->request->getVar('psu_');
    if ($psu_Component != ""){
      $Componentmodel9 = new component_model();
      $data['component10'] = $Componentmodel9->where('ComponentId', $psu_Component)->first();
      $getComponentData9 = $data['component10'];

    $ComponentCartmodel10 = new cart_model();
    $cartData11 = [
      'uid' => session('id'),
      'ComponentId' => $getComponentData9['ComponentId'],
      'itemName' => $getComponentData9['ComponentName'],
      'itemImage' => $getComponentData9['ComponentImage'],
      'itemPrice' => $getComponentData9['ComponentPrice'],
    ];

    $ComponentResult10 = $ComponentCartmodel10->save($cartData11);
    if($ComponentResult10) {
    echo "PSU Added To Cart.";
    echo "<br>";
  } else {
    echo "Something went wrong";
  }
}
// Casing
    $casing_Component = $this->request->getVar('casing_');
    if ($casing_Component != ""){
      $Componentmodel10 = new component_model();
      $data['component11'] = $Componentmodel10->where('ComponentId', $casing_Component)->first();
      $getComponentData10 = $data['component11'];

    $ComponentCartmodel11 = new cart_model();
    $cartData12 = [
      'uid' => session('id'),
      'ComponentId' => $getComponentData10['ComponentId'],
      'itemName' => $getComponentData10['ComponentName'],
      'itemImage' => $getComponentData10['ComponentImage'],
      'itemPrice' => $getComponentData10['ComponentPrice'],
    ];

    $ComponentResult11 = $ComponentCartmodel11->save($cartData12);
    if($ComponentResult11) {
    echo "Casing Added To Cart.";
    echo "<br>";
  } else {
    echo "Something went wrong";
  }
}
    return redirect()->to('Cart');
  }

}


public function RemoveProductItem()
{
  $id = session('id');
  if (session()->get('isLoggedIn')){
    $itemProdId = $this->request->getVar('prodID');

      if ($itemProdId != ""){
        $deleteProductItem = new cart_model();
        $deleteProductItemArray = ['uid' => $id, 'ProductId' => $itemProdId];
        $data['productItems'] = $deleteProductItem->where($deleteProductItemArray)->delete();
        $ProductitemsDeleted = $data['productItems'];
          if($ProductitemsDeleted) {
            echo "Removed Product item from cart";
            return redirect()->to('Cart');
          }else{
            echo "SQL Error RemoveItem()";
          }
        }
      }else {
        return redirect()->to('Login');
    }
}

public function RemovePromotionItem()
{
  $id = session('id');
  if (session()->get('isLoggedIn')){
    $itemPromId = $this->request->getVar('promID');

      if ($itemPromId != ""){
        $deletePromotionItem = new cart_model();
          $deletePromotionItemArray = ['uid' => $id, 'PromotionId' => $itemPromId];
          $data['promotionItems'] = $deletePromotionItem->where($deletePromotionItemArray)->delete();
          $PromotionitemsDeleted = $data['promotionItems'];
            if($PromotionitemsDeleted) {
              echo "Removed Promotion item from cart";
              return redirect()->to('Cart');
            }else{
              echo "SQL Error RemoveItem()";
            }
          }
      }else {
        return redirect()->to('Login');
    }
}
public function RemoveComponentItem()
{
  $id = session('id');
  if (session()->get('isLoggedIn')){
    $itemCompId = $this->request->getVar('compID');

      if ($itemCompId != ""){
        $deleteComponentItem = new cart_model();
        $deleteComponentItemArray = ['uid' => $id, 'ComponentId' => $itemCompId];
        $data['cartItems'] = $deleteComponentItem->where($deleteComponentItemArray)->delete();
        $ComponentitemsDeleted = $data['cartItems'];
          if($ComponentitemsDeleted) {
            echo "Removed Component item from cart";
            return redirect()->to('Cart');
          }else{
            echo "SQL Error RemoveItem()";
          }
        }
      }else {
        return redirect()->to('Login');
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
           'state' => 'required|min_length[4]|max_length[50]|alpha_space',
           'zip' => 'required|min_length[4]|max_length[50]|integer',
           'cardname' => 'required|min_length[4]|max_length[26]|alpha',
           'cardnumber' => 'required|min_length[14]|max_length[16]|integer',
           'expmonth' => 'required|min_length[3]|max_length[9]|alpha',
           'expyear' => 'required|min_length[3]|max_length[9]|integer',
           'cvv' => 'required|min_length[3]|max_length[3]|integer',

         ];

         $PaymentAddress = $this->request->getVar('address').",".$this->request->getVar('city').",".$this->request->getVar('state').","
                            .$this->request->getVar('zip');
         $CardDetails = $this->request->getVar('cardname').",".$this->request->getVar('cardnumber').",".$this->request->getVar('expmonth').","
                            .$this->request->getVar('expyear').",".$this->request->getVar('cvv');
         $total_price_sum = $this->request->getVar('totalPrice');
         date_default_timezone_set("Asia/Kuala_Lumpur");
         $paymentTime= date("Y-m-d H:i:s");

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
             'paymentTime' => $paymentTime,
           ];
           $paymentReward = $payment_model->save($newData);


           if($paymentReward) {
           echo "Added To Cart.";
           echo "<br>";

           $checkPaymentID = new payment_model();
           $array = ['userId' => $id, 'paymentTime' => $paymentTime];
           $data['paymentDate'] = $checkPaymentID->where($array)->findAll();
           $paymentDate = $data['paymentDate'];

           foreach ($paymentDate as $paymentDate ) {
             $orderPaymentId = $paymentDate["PaymentId"];
           }

           $order_model = new order_model();

           $newOrderData = [
             'userId' => session('id'),
             'paymentId' => $orderPaymentId,
             'shippingAddress' => $PaymentAddress,
             'itemsOrdered' => $this->request->getVar('totalItem'),
             'grandTotal' => $total_price_sum,
             'orderStatus' => "0",

           ];
           $orderStatusResult = $order_model->save($newOrderData);
              if($orderStatusResult) {
                echo "Added To OrderTable.";
                echo "<br>";

                $deleteCart = new cart_model();
                $data['post'] = $deleteCart->where('uid', $id)->delete();
                $abc = $data['post'];
                  if($abc) {
                    echo "Removed Paid items from cart";
                  }else{
                    echo "SQL Error Payment()";
                  }

              } else {
                echo "Something went wrong when adding order";
              }

         } else {
           echo "Something went wrong when completing payment";
         }
         if ($total_price_sum > 6000) {
           return redirect()->to('Game');
         }else{
          return redirect()->to('OrderStatus');
           }
         }
         }
         echo view("sections/Header.php");
         return view("Home/Payment.php",$data);
       }




      public function Game()
      {
        $reward_model = new reward_model();
        $data['rewardTier1'] = $reward_model->where('RewardTier', '1')->first();
        $data['rewardTier2'] = $reward_model->where('RewardTier', '2')->first();
        $data['rewardTier3'] = $reward_model->where('RewardTier', '3')->first();

        echo view("sections/Header.php");
        return view("Home/Game.php",$data);
      }

      public function GameReward($RewardID = null)
      {

        if (session()->get('isLoggedIn')){
          $rewardData = new reward_model();
          $data['rewards'] = $rewardData->where('RewardID', $RewardID)->first();
          $rewardtoCart = $data['rewards'];

          $freeItem = "FREE [ ".$rewardtoCart['RewardName']." ]";

          $id = session('id');
          $checkPaymentID = new payment_model();
          $checkPaymentID->where('userId', $id);
          $data['paymentDate'] = $checkPaymentID->orderBy('PaymentId', 'DESC')->first();
          $paymentDate = $data['paymentDate'];

            $orderPaymentId = $paymentDate["PaymentId"];
           $orderPaymentId;

          $freeOrder = new order_model();

          $freeRewardOrder = [
            'userId' => session('id'),
            'paymentId' => $orderPaymentId,
            'shippingAddress' => "Same As Order Above",
            'itemsOrdered' => $freeItem,
            'grandTotal' => "0000",
            'orderStatus' => "0",

          ];
          $freeRewardOrderResult = $freeOrder->save($freeRewardOrder);
             if($freeRewardOrderResult) {
               echo "Added To OrderTable.";
               echo "<br>";
             }else {
               echo "error";
             }

              return redirect()->to('OrderStatus');
            }else {
                return redirect()->to('Login');
            }
      }

      public function OrderStatus()
      {
        $id = session('id');
        $viewCart = new order_model();
        $data['orderView'] = $viewCart->where('userId', $id)->findAll();

        echo view("sections/Header.php");
        return view("Home/OrderStatus.php",$data);
      }

      public function AccountManagement()
      {
        $id = session('id');
        $usermodel = new UserModel();
        $data['users'] = $usermodel->where('id', $id)->first();

        echo view("sections/Header.php");
        return view("Home/AccountManagement.php",$data);
      }

      public function updateAccount()
      {
        $id = session('id');
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
        //Validation
        $rules = [
          'firstname' => 'required|min_length[2]|max_length[25]',
          'lastname' => 'required|min_length[2]|max_length[25]',
          'address' => 'required|min_length[10]|max_length[255]',
          'email' => 'required|min_length[6]|max_length[50]|valid_email',
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
          $updateUsermodel = new UserModel();

          $newUserData = [
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'address' => $this->request->getVar('address'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
          ];

                  $updateUsermodel->set($newUserData);
                  $updateUsermodel->where('id', $id);
                  $updateUsermodelResult = $updateUsermodel->update();
                        if($updateUsermodelResult) {
                          echo "Updated";
                          $session = session();
                          $session->setFlashdata('success', 'Successfully Updated Account');
                          return redirect()->to('');
                        } else {
                          echo "Something went wrong";
                        }
              }else{
                // Recaptcha
                $session = session();
                  $session->setFlashdata('msg', 'Please Complete Captcha');
                  return redirect()->to('AccountManagement');
              }
        }
        return redirect()->to('');
        }
      }

}
