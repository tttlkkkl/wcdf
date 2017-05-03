<?php

/**
 * 模块接口列表
 * Date: 16-10-24
 * Time: 上午4:16
 * author :李华 yehong0000@163.com
 */
namespace system\member;

use system\auth\Login;

class Factory
{
    public function __callStatic($name, $arguments)
    {
        return 'Bad Request';
    }

    /**
     * 获取部门信息
     *
     * @param $id
     *
     * @return mixed
     * @throws \Exception
     */
    static public function getAuth()
    {
        return Login::getInstance()->checkLogin();
    }
}