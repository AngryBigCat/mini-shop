<?php
namespace app\api\controller\v2;

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
        return 'this is V2';
    }
}