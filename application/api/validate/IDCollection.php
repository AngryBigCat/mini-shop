<?php
/**
 * Created by PhpStorm.
 * User: Angry
 * Date: 2017/5/21
 * Time: 22:08
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids.checkIDs' => ':attribute 参数必须是以逗号分隔的多个正整数'
    ];

    protected function checkIDs($value, $rule, $data, $field)
    {
        $ids = explode(',', $value);
        if (empty($ids)) {
            return false;
        }
        foreach ($ids as $id) {
            if (!$this->isIDPostiveInt($id)) {
                return false;
            }
        }
        return true;
    }
}