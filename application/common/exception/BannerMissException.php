<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/13
 * Time: 18:55
 */

namespace app\common\exception;


class BannerMissException extends BaseException
{
    public $code = 400;

    public $msg = '请求的Banner不存在';

    public $errorCode = 10000;
}