<?php namespace App\Models;

use CodeIgniter\Model;

class Gpu_model extends Model{
  protected $table = 'gpuchart';
  protected $allowedFields = ['gpuPrice', 'gpuUpdatedDate'];
}


query("SELECT COUNT(gpuPrice) as count,DAY(gpuUpdatedDate) as day_date FROM users WHERE MONTH(gpuUpdatedDate) = '" . date('m') . "' AND YEAR(gpuUpdatedDate) = '" . date('Y') . "'GROUP BY DAY(gpuUpdatedDate)");

?>
