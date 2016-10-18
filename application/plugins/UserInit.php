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
    public function routerStartup(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response)
    {
        if(user() && user()['id']){
              define('UID',user()['id']);
        }
        if(company() && company()['id']){
            define('CID',company()['id']);
        }
        if((!defined('CID') || !defined('UID')) && !isset($_REQUEST['state'])){
            $request->setModuleName('system');
            $request->setControllerName('Login');
            $request->setActionName('login');
            //如果在路由结束之后，强制分发或者在路由之前强制分发都会使，system/login/login额外的被执行一次，而且前端不会感知,原因不得而知
        }
    }
}