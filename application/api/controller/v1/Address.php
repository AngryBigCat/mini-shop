<?php

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\model\User;
use app\api\service\Token;
use app\api\validate\AddressNew;
use app\common\exception\SuccessMessage;
use app\common\exception\UserException;

class Address extends BaseController
{
    //TP5前置方法
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createOrUpdate']
    ];

    public function createOrUpdate()
    {
        $validate = new AddressNew();
        $validate->goCheck();
        $uid = Token::getCurrentUid();
        $user = User::get($uid);
        if (!$user) {
            throw new UserException();
        }
        $dataArray = $validate->getDataByRule(input('post.'));
        $address = $user->address;
        if ($address) {
            $user->address->save($dataArray);
        } else {
            $user->address()->save($dataArray);
        }
        return json(new SuccessMessage(), 201);
    }
}
