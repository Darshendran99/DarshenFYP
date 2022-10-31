<?php namespace App\Models;

use CodeIgniter\Model;

class Component_model extends Model{
  protected $table = 'component';
  protected $primaryKey = 'ComponentId';
  protected $allowedFields = ['ComponentId','ComponentName','ComponentType','ComponentBrand','ComponentImage','ComponentDetails','ComponentPrice'];

  }
