<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/14
 * Time: 12:43
 */
namespace app\common\exception;


class ParameterException extends BaseException
{
    public $code = 400;

    public $msg = '参数错误';

    public $errorCode = 10000;
}