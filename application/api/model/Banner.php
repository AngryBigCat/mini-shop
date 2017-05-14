<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/13
 * Time: 1:25
 */

namespace app\api\model;


class Banner extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time'];

    public static function getBannerById($id)
    {
        return self::get($id, 'item.image');
    }

    public function item()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }
}