<?php namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model{
  protected $table = 'product';
  protected $primaryKey = 'ProductId';
protected $allowedFields = ['productname', 'productimage', 'productprice', 'productcpu', 'productgpu', 'productmobo', 'productram', 'productssd', 'productpsu', 'productcasing', 'productother', 'productcsgo', 'productfortnite', 'productgtav', 'productcyberpunk', 'product3dmark', 'productgeekbench', 'CreatedOn'];
  protected $beforeInsert = ['beforeInsert'];

  protected function beforeInsert(array $data){
    $data['data']['CreatedOn'] = date('Y-m-d H:i:s');

    return $data;
  }
}
?>
