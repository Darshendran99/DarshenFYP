<?php namespace App\Models;

use CodeIgniter\Model;

class Reward_model extends Model{
  protected $table = 'reward';
  public $allowedFields = ['RewardID','RewardName', 'RewardImage','RewardScore'];
}
?>
