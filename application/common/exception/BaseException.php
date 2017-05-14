<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/13
 * Time: 18:44
 */

namespace app\common\exception;


class BaseException extends \Exception
{
    public $code = 200;

    public $msg = '请求成功';

    public $errorCode = 0;

    public function __construct($param = [])
    {
        if (!is_array($param)) {
            return;
        }
        if (array_key_exists('code', $param)) {
            $this->code = $param['code'];
        }
        if (array_key_exists('msg', $param)) {
            $this->msg = $param['msg'];
        }
        if (array_key_exists('errorCode', $param)) {
            $this->errorCode = $param['errorCode'];
        }

    }
}