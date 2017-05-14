<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/14
 * Time: 20:58
 */

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    protected function prefixImgUrl($value, $data)
    {
        if ($data['from'] === 1) {
            return config('setting.image_prefix').$value;
        }
    }
}