<?php

namespace app\api\model;

class Product extends BaseModel
{
    protected $hidden = ['delete_time', 'from', 'create_time', 'update_time', 'pivot', 'img_id'];

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

    public static function getCount($count)
    {
        return self::limit($count)->order('create_time', 'desc')->select();
    }

    public static function getProductsByCategory($id)
    {
        return self::where('category_id', $id)->select();
    }

    public static function getDetail($id)
    {
        return self::with([
            'img' => function ($query) {
                $query->with('imgUrl')->order('order', 'asc');
            }
        ])->with('properties')->find($id);
    }

    public function img()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

    public function properties()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }
}
