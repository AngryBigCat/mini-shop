<?php
namespace app\api\service;

use app\common\exception\TokenException;
use think\Cache;
use think\Request;

class Token
{
    public static function generateToken()
    {
        $randChars = randChars(32);
        $timestamp = time();
        $salt_value = config('secure.solt_value');
        return md5($randChars.$timestamp.$salt_value);
    }

    public static function needPrimaryScope()
    {
        $scope = self::getCurrentTokenVar('scope');
        if (!$scope) throw new TokenException();
        //如果当前用户权限作用域小于枚举类的USER权限则返回失败
        if ($scope < ScopeEnum::USER) throw new ForBiddenException();
    }

    public static function needExclusiveScope()
    {
        $scope = Token::getCurrentTokenVar('scope');
        if (!$scope) throw new TokenException();
        //如果当前用户权限作用域不等于枚举类的USER权限则返回失败
        if ($scope != ScopeEnum::USER) throw new ForBiddenException();
    }

    public static function getCurrentTokenVar($key)
    {
        $token = Request::instance()
            ->header('token');
        $vars = Cache::get($token);
        if (!$vars) {
            throw new TokenException();
        } else {
            if (!is_array($vars)) {
                $vars = json_decode($vars, true);
            }
            if (array_key_exists($key, $vars)) {
                return $vars[$key];
            } else {
                throw new \Exception('尝试获取的token变量不存在');
            }
        }
    }

    public static function getCurrentUid()
    {
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }
}