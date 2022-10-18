<?php namespace App\Models;

use CodeIgniter\Model;

class Payment_model extends Model{
  protected $table = 'payment';
  protected $primaryKey = 'PaymentId';
  protected $allowedFields = ['userid','Name','PaymentEmail','PaymentAddress','CardDetails','PaymentTotal','PaidItems', 'paymentTime'];
  protected $beforeInsert = ['beforeInsert'];

  protected function beforeInsert(array $data){
    $data = $this->passwordHash($data);
    return $data;
  }

  protected function passwordHash(array $data){
    if(isset($data['data']['CardDetails']))
      $data['data']['CardDetails'] = password_hash($data['data']['CardDetails'], PASSWORD_DEFAULT);

    return $data;
  }
}
?>
