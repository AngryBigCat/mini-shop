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
    ];

    protected $message = [
        'id.isIDPostiveInt' => ':attribute 必须是正整数'
    ];

}