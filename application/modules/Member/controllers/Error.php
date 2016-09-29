<?php

/**
 * 错误处理
 * Date: 16-9-29
 * Time: 下午11:55
 * author :李华 yehong0000@163.com
 */
class ErrorController extends Yaf\Controller_Abstract {

    public function init()
    {
        Yaf\Dispatcher::getInstance()->disableView();
    }

    public function errorAction($exception) {
        var_dump($this->getRequest()->getException());
    }
}