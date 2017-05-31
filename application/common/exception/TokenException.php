<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/26
 * Time: 0:00
 */

namespace app\common\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已过期或失效';
    public $errorCode = 10000;
}