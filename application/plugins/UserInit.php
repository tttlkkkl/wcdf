<?php

/**
 * 系统用户身份初始化
 * Date: 16-10-12
 * Time: 下午9:31
 * author :李华 yehong0000@163.com
 */
class UserInitPlugin extends Yaf\Plugin_Abstract
{
    /**
     * 路由结束后进行系统身份信息初始化
     * @param \Yaf\Request_Abstract $request
     * @param \Yaf\Response_Abstract $response
     */
    public function routerShutdown(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response)
    {
        if(user() && user()['id']){
              define('UID',user()['id']);
        }
        if(company() && company()['id']){
            define('CID',company()['id']);
        }
        if((!defined('CID') || !defined('UID')) && !isset($_REQUEST['state']) && strtolower($request->getControllerName()) != 'login'){
            $response->setRedirect('/system/login/login');
            die;
        }
    }
}