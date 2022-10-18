<?php namespace App\Models;

use CodeIgniter\Model;

class Cart_model extends Model{
  protected $table = 'cart';
  public $allowedFields = ['uid','ProductId', 'PromotionId','ComponentId','itemName', 'itemImage', 'itemPrice', 'itemQuantity'];
}
?>
