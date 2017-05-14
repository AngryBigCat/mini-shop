<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/14
 * Time: 20:57
 */

namespace app\api\model;


class BannerItem extends BaseModel
{
    protected $hidden = ['img_id', 'delete_time', 'update_time'];

    public function image()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}