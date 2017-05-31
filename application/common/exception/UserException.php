<?php

/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/21
 * Time: 23:12
 */

namespace app\common\exception;


class UserException extends BaseException
{
    public $code = 404;

    public $msg = '用户不存在';

    public $errorCode = 30007;
}