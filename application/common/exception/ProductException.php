<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/21
 * Time: 23:12
 */

namespace app\common\exception;


class ProductException extends BaseException
{
    public $code = 404;

    public $msg = '商品不存在';

    public $errorCode = 30002;
}