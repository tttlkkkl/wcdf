<?php

    /**
     *
     * Date: 2016/9/24 0024
     * Time: 9:18
     * Author: 李华胜 lihuasheng@wapwei.com
     */
    class ApiController extends Yaf\Controller_Abstract
    {
        public function init()
        {
            Yaf\Dispatcher::getInstance()->disableView();
        }

        public function indexAction()
        {

        }
    }