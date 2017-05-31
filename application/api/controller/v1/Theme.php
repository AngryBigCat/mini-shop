<?php

namespace app\api\controller\v1;

use app\common\exception\IDCollectionException;
use think\Collection;
use think\Loader;
use app\api\model\Theme as ThemeModel;

class Theme
{
    public function getSimpleList($ids = '')
    {
        //验证路由传参
        Loader::validate('IDCollection')->goCheck();

        $ids = explode(',', $ids);

        $theme = ThemeModel::with('topicImg,headImg')->select($ids);

        if ($theme->isEmpty()) {
            throw new IDCollectionException();
        }

        return $theme;

    }

    public function getComplexOne($id) {
        $theme = ThemeModel::get($id, ['topicImg', 'headImg', 'products']);
        return $theme;
    }
}
