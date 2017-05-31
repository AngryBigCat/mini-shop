<?php
namespace app\api\validate;


class Count extends BaseValidate {
    protected $rule = [
        'count' => 'isIDPostiveInt|between:1,15'
    ];

    protected $message = [
        'count.isIDPostiveInt' => ':attribute 必须为正整数'
    ];
}