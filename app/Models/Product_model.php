<?php namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model{
  protected $table = 'product';
  protected $allowedFields = ['ProductName', 'ProductImage', 'ProductPrice', 'ProductCPU', 'ProductGPU', 'ProductMobo', 'ProductRAM', 'ProductSSD', 'ProductPSU', 'ProductCasing', 'ProductOther', 'ProductCSGO', 'ProductFortnite', 'ProductGTAV', 'ProductCyberpunk', 'Product3DMark', 'ProductGeekbench', 'CreatedOn'];
  protected $beforeInsert = ['beforeInsert'];

  protected function beforeInsert(array $data){
    $data['data']['CreatedOn'] = date('Y-m-d H:i:s');

    return $data;
  }
}
?>
