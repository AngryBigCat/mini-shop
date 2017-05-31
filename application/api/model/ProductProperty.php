<?php

namespace app\api\model;

use think\Model;

class ProductProperty extends Model
{
    protected $hidden = ['delete_time', 'update_time', 'product_id'];

    public function property()
    {
        return $this->belongsTo('product');
    }
}
