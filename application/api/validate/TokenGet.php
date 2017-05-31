<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/25
 * Time: 1:55
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code.isNotEmpty' => '微信码不存在！'
    ];
}