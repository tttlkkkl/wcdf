<?php

/**
 *
 * Date: 16-10-9
 * Time: 下午10:13
 * author :李华 yehong0000@163.com
 */
use system\oauth\Login;
class LoginController extends system\controllers\Web
{
    public function init()
    {
        Yaf\Dispatcher::getInstance()->disableView();
    }

    /**
     * 登录地址
     */
    public function loginAction()
    {
        if(Login::getInstance()->checkLogin()){
            $this->redirect($_SERVER['REQUEST_URI']);
        }else{
            $url=Login::getInstance()->getLoginUrl();
            $this->getView()->assign('url',$url);
            Yaf\Dispatcher::getInstance()->enableView();
        }
    }

    /**
     * 登录回调
     */
    public function callbackAction()
    {
        if(Login::getInstance()->callback()){
            //$this->redirect('/system/index/index');
        }else{
            //$this->redirect('/system/login/login');
        }
    }
}