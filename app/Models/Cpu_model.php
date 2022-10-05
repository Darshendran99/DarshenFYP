<?php namespace App\Models;

use CodeIgniter\Model;

class Cpu_model extends Model{
  protected $table = 'Cpuchart';
  protected $allowedFields = ['cpuId','cpuPrice', 'cpuUpdatedDate'];
}
?>
