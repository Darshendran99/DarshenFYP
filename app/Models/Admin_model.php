<?php namespace App\Models;

use CodeIgniter\Model;

class admin_model extends Model{
  protected $table = 'admin';
  protected $primaryKey = 'StaffId';
  protected $allowedFields = ['staffName', 'staffEmail','stafPassword','created_at', 'updated_at'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];


  protected function beforeInsert(array $data){
    $data = $this->passwordHash($data);
    $data['data']['created_at'] = date('Y-m-d H:i:s');

    return $data;
  }

  protected function beforeUpdate(array $data){
    $data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }

  protected function passwordHash(array $data){
    if(isset($data['data']['stafPassword']))
      $data['data']['stafPassword'] = password_hash($data['data']['stafPassword'], PASSWORD_DEFAULT);

    return $data;
  }

}
?>
