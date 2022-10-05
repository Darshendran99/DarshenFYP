<?php namespace App\Models;

use CodeIgniter\Model;

class Gpu_model extends Model{
  protected $table = 'gpuchart';
  protected $allowedFields = ['gpuId','gpuPrice', 'gpuUpdatedDate'];
}
?>
