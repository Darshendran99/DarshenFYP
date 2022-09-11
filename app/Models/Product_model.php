<?php namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model{

  public function product_list(){
    $db = \Config\Database::connect();
    $query = $db->query('select * from product');
    header("Content-type: image/png");

    $result = $query->getResult();
    if(count($result)>0)
    {
        return $result;
    }
    else
    {
        return false;
    }
  }
}
?>
