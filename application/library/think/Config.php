<?php
    /**
     * 重写thinkPHP配置获取方法
     */

namespace think;

class Config
{
    // 参数作用域
    /**
     * 获取配置参数 为空则获取所有配置
     * @param string    $name 配置参数名（支持二级配置 .号分割）
     * @param string    $range  作用域
     * @return mixed
     */
    public static function get($name = null, $range = '')
    {
        if(!$name){
            return null;
        }
        $nameArr=explode('.',$name);
        if($nameArr && count($nameArr) == 2){
            return \Yaf\Registry::get('config')->$nameArr[0]->$nameArr[1];
        }
        $config=\Yaf\Registry::get('config')->$name;
        if(is_object($config)){
            return $config->toArray();
        }
        return $config;
    }
}
