<?php

/**
 * 模块接口列表
 * Date: 16-10-24
 * Time: 上午4:16
 * author :李华 yehong0000@163.com
 */
namespace system\member;
use system\member\local\DepartmentLocal;

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
     */
    static public function getDepartment($id)
    {
        return 111;
    }

    /**
     * 添加部门
     *
     * @param $data
     */
    static public function postDepartment($data)
    {
        return DepartmentLocal::getInstance()->post($data);
    }

    /**
     * 更新部门
     *
     * @param $data
     *
     * @return bool
     * @throws \Exception
     */
    public static function putDepartment($data){
        return DepartmentLocal::getInstance()->put($data);
    }
}