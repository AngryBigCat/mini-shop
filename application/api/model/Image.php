<?php

namespace app\api\model;

class Image extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time', 'from'];

    public function getUrlAttr($value, $data)
    {
        return parent::prefixImgUrl($value, $data);
    }

}
