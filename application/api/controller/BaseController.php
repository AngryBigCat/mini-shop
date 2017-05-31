<?php

namespace app\api\controller;

use app\api\service\Token;
use think\Controller;

class BaseController extends Controller
{
    protected function checkPrimaryScope()
    {
        Token::needPrimaryScope();
    }


    protected function checkExclusiveScope()
    {
        Token::needExclusiveScope();
    }
}
