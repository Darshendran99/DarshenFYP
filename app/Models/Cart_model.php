<?php namespace App\Models;

use CodeIgniter\Model;

class Cart_model extends Model{
  protected $table = 'cart';
  protected $allowedFields = ['id','ProductId', 'PromotionId','ComponentId','itemQuantity', 'ItemTotalPrice'];
}
?>
