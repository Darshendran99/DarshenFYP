<?php
namespace App\Validation;
use App\Models\admin_model;

class AdminRules
{

  public function validateAdmin(string $str, string $fields, array $data){
    $model = new admin_model();
    $admin = $model->where('staffEmail', $data['staffEmail'])
                  ->first();

    if(!$admin)
      return false;

    return password_verify($data['stafPassword'], $admin['stafPassword']);
  }
}
