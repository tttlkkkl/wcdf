<?php
/**
 *控制器基类
 *
 * Date: 17-3-12
 * Time: 下午6:31
 * author :李华 yehong0000@163.com
 */

namespace system\controllers;


trait Base
{
    /**
     * 获取表单参数
     *
     * @param null $key
     * @param null $default
     *
     * @return array|null
     */
    public static function getParam($key = null, $default = null)
    {
        $_SERVER['REQUEST_METHOD'] === "PUT"
            ? parse_str(file_get_contents('php://input'), $_PUT)
            : $_PUT = $_POST;
        if (isset($key)) {
            return isset($_PUT[$key]) ? $_PUT[$key] : $default;
        } else {
            return $_PUT ?: (isset($default) ? $default : []);
        }
    }

    /**
     * 获取所有表单参数,为语义而已，可以直接用以上方法
     *
     * @return array|null
     */
    public static function getParams()
    {
        return self::getParam();
    }
}