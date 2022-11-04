<?php namespace App\Models;

use CodeIgniter\Model;

class Promotion_model extends Model{
  protected $table = 'promotion';
  protected $primaryKey = 'PromotionId';
  protected $allowedFields = ['PromotionName', 'PromotionStatus', 'PromotionImage', 'PromotionOriPrice', 'PromotionPrice', 'PromoCreatedOn', 'PromotionCPU', 'PromotionGPU', 'PromotionMobo', 'PromotionRAM', 'PromotionSSD', 'PromotionPSU', 'PromotionCasing', 'PromotionOther', 'NonPCDetails', 'PromotionDetail1', 'PromotionDetail2', 'PromotionDetail3',
                              'PromotionDetail4'];
  protected $beforeInsert = ['beforeInsert'];

    protected function beforeInsert(array $data){
      $data['data']['PromoCreatedOn'] = date('Y-m-d H:i:s');

      return $data;
    }
  }
