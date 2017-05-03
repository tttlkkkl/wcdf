<?php

/**
 * api接口公共控制器
 * Date: 16-10-18
 * Time: 下午9:43
 * author :李华 yehong0000@163.com
 */
namespace system\controllers;

use system\auth\Login;

class Api extends \Yaf\Controller_Abstract
{
    use \system\controllers\Base;

    public function init()
    {
        \Yaf\Dispatcher::getInstance()->disableView();
        $this->getResponse()->setHeader('Content-Type', 'application/json; charset=utf-8');
        if ($_SERVER['REQUEST_URI'] !== '/system/api/auth' && !Login::checkLogin()) {
            throw new \Exception('未授权的访问!', 4000);
        }
    }

    /**
     * 返回消息打包格式化
     *
     * @param int $status
     * @param $msg
     * @param $data
     * @param string $type
     * @param $rootNodeName
     */
    function packing($status = 0, $msg, $data, $type = 'json', $rootNodeName)
    {
        $returnData = array(
            'code' => $status,
            'msg'  => $msg,
            'data' => $data
        );
        if ($type == 'json' || !$type) {
            return json_encode($returnData, JSON_UNESCAPED_UNICODE);
        } elseif ($type == 'xml') {
            $rootNodeName = $rootNodeName ?: 'root';
            return Tool::arrToXml($returnData, $rootNodeName, null);
        }
    }
}