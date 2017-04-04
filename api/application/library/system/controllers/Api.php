<?php

/**
 * api接口公共控制器
 * Date: 16-10-18
 * Time: 下午9:43
 * author :李华 yehong0000@163.com
 */
namespace system\controllers;
use system\oauth\Login;
class Api extends \Yaf\Controller_Abstract
{
    use \system\controllers\Base;
    public function init()
    {
        \Yaf\Dispatcher::getInstance()->disableView();
        $this->getResponse()->setHeader('Content-Type', 'application/json; charset=utf-8');
        if(!Login::checkLogin()){
            throw new \Exception('未授权的访问!',4000);
        }
    }
}