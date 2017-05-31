<?php

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\common\exception\CategoryException;


class Category
{
    public function getAllCategories()
    {
        $categories = CategoryModel::all([], 'img');
        if ($categories->isEmpty()) {
            throw new CategoryException();
        }
        $categories = $categories->hidden(['delete_time', 'update_time']);
        return $categories;
    }
}
