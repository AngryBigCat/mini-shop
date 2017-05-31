<?php

namespace app\api\model;


class Category extends BaseModel
{
    public function img()
    {
        return $this->hasOne('Image', 'id', 'topic_img_id');
    }
}
