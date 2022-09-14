<?php namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model{
  protected $table = 'product';
  protected $primaryKey = 'ProductId';
  protected $allowedFields = ['ProductImage', 'ProductName', 'ProductDetails', 'ProductPerformance', 'ProductPrice', 'CreatedOn'];
}
?>
