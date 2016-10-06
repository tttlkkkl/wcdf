<?php

/**
 * ａｐｉ插件，自动包装返回对应数据包结构
 * Date: 16-10-6
 * Time: 下午2:53
 * author :李华 yehong0000@163.com
 */
class ApiPlugin extends Yaf\Plugin_Abstract
{
    /**
     * 统一输出格式为json数据包
     * @param \Yaf\Request_Abstract $request
     * @param \Yaf\Response_Abstract $response
     */
    public function dispatchLoopShutdown(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response)
    {
        if($request->getControllerName()=='Api'){
            $response->setHeader('Content-Type', 'application/json; charset=utf-8');
        }
    }
}