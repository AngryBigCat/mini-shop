<?php
namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\common\exception\BannerMissException;
use think\Loader;

/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/12
 * Time: 21:55
 */
class Banner
{
    public function getBanner($id) {
        Loader::validate('IDMustBePostiveInt')->goCheck();
        $result = BannerModel::getBannerById($id);
        if (!$result) {
            throw new BannerMissException();
        }
        return $result;
    }
}