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

    protected function isIDPostiveInt($value, $rule = '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value) > 0) {
            return true;
        } else {
            return false;
        }
    }

    protected function isNotEmpty($value, $rule, $data, $field)
    {
        if (empty($value)) {
            return false;
        }
        return true;
    }

    protected function isMobile($value, $rule, $data, $field) {
        $rule = '/^1(3|4|5|7|8)\d{9}$/';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataByRule($dataArray)
    {
        if (array_key_exists('user_id', $dataArray) ||
            array_key_exists('uid', $dataArray)) {
            throw new ParameterException([
                'msg' => '参数中包含非法的uid和user_id字段'
          ]);
        }
        $newData = [];
        foreach ($this->rule as $key => $value) {
            $newData[$key] = $dataArray[$key];
        }
        return $newData;
    }
}