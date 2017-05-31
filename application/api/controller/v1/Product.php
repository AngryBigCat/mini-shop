<?php

namespace app\api\controller\v1;

use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePostiveInt;
use app\common\exception\ProductException;

class Product
{
    public function getRecent($count = 15)
    {
        (new Count())->goCheck();
        $products = ProductModel::getCount($count);

        if ($products->isEmpty()) {
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return $products;
    }

    public function getAllInCategory($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $allInCategory = ProductModel::getProductsByCategory($id);
        if ($allInCategory->isEmpty()) {
            throw new ProductException();
        }
        $allInCategory = $allInCategory->hidden(['summary']);
        return $allInCategory;
    }

    public function getDetail($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $product = ProductModel::getDetail($id);
        if (!$product) {
            throw new ProductException([
                'msg' => '该商品获取失败',
                "errorCode" => 30005,
            ]);
        }
        return $product;
    }

    public function img() {

    }
}
