<?php

namespace app\api\model;


class Theme extends BaseModel
{
    public function topicImg()
    {
        return $this->hasOne('Image', 'id', 'topic_img_id');
    }

    public function headImg()
    {
        return $this->hasOne('Image', 'id', 'head_img_id');
    }

    public function products()
    {
        return $this->belongsToMany('Product', 'theme_product', 'product_id', 'theme_id');
    }
}
