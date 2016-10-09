<?php

/**
 * 后台系统管理员登录
 * Date: 16-10-9
 * Time: 下午9:16
 * author :李华 yehong0000@163.com
 */
namespace system\oauth;
use \tool\Tool;
class login
{
    static protected $Obj;

    private function __construct()
    {

    }

    /**
     * 检查是否已登录
     * @return bool
     */
    public function checkLogin()
    {
        return false;
    }
    /**
     * 获取实例
     */
    static public function getInstance()
    {
        if(!self::$Obj){
            self::$Obj=new self;
        }
        return self::$Obj;
    }
    /**
     * 获取微信扫码登录地址
     * @return string
     */
    public function getLoginUrl()
    {
        $corp_id='wx4fa7d40737be7934';
        $state=Tool::randomStr(5);
        $redirect_uri=\Yaf\Registry::get('config')->domain->root.'/system/login/callback';
        $redirect_uri=urlencode($redirect_uri);
        $url="https://qy.weixin.qq.com/cgi-bin/loginpage?corp_id={$corp_id}&redirect_uri={$redirect_uri}&state={$state}&usertype=all";
        return $url;
    }

    /**
     * 登录回调地址
     */
    public function callback()
    {
        $Request=\Yaf\Dispatcher::getInstance()->getRequest();
        var_dump($Request->getParams());
        var_dump($_REQUEST);
        return true;
    }
}