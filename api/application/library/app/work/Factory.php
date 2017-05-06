<?php

/**
 *
 * Date: 17-5-6
 * Time: 下午7:08
 * author :李华 yehong0000@163.com
 */
namespace app\work;

class Factory
{
    public static function __callStatic($name, $arguments)
    {
        return 'Bad Request';
    }
    public function postWork(){

    }
}