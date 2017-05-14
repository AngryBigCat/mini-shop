<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/12
 * Time: 22:58
 */

namespace app\api\validate;


class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isIDPostiveInt',
        'num' => 'in:1,2,3'
    ];

    protected function isIDPostiveInt($value, $rule, $data, $field)
    {
        if (is_numeric($value) && is_int((int)$value) && ((int)$value) > 0) {
            return true;
        } else {
            return $field.'必须是正整数';
        }
    }
}