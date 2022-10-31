<?php namespace App\Models;

use CodeIgniter\Model;

class Order_model extends Model{
  protected $table = 'orderstatus';
  protected $primaryKey = 'orderId';
  protected $allowedFields = ['userId','paymentId','shippingAddress','itemsOrdered','grandTotal','orderStatus'];

}
?>
