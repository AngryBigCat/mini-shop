<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/13
 * Time: 0:19
 */

namespace app\api\validate;


use app\common\exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        $request = Request::instance();
        $data = $request->param();
        if (!$this->batch()->check($data)) {
            $e = new ParameterException([
                'msg' => $this->error,
//                'code' => '',
//                'errorCode' => ''
            ]);
            throw $e;
        }
    }
}