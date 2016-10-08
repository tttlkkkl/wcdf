<?php
/**
 * 系统常用函数库
 * Date: 2016/9/24 0024
 * Time: 9:35
 * Author: 李华胜 lihuasheng@wapwei.com
 */
use \db\Db;
function test()
{
    echo 'test';
}

/**
 * 缓存管理
 * @param mixed     $name 缓存名称，如果为数组表示进行缓存设置
 * @param mixed     $value 缓存值
 * @param mixed     $options 缓存参数
 * @param string    $tag 缓存标签
 * @return mixed
 */
function cache($name, $value = '', $options = null, $tag = null)
{
    Helper::cache($name,$value,$options,$tag);
}
/**
 * 实例化数据库类
 * @param string        $name 操作的数据表名称（不含前缀）
 * @param array|string  $config 数据库配置参数
 * @param bool          $force 是否强制重新连接
 * @return \think\db\Query
 */
function db($name = '', $config = [], $force = true)
{
    return Db::connect($config, $force)->name($name);
}

/**
 * 返回消息打包格式化
 * @param int $status
 * @param $msg
 * @param $data
 * @param string $type
 * @param $rootNodeName
 */
function packing($status=0,$msg,$data,$type='json',$rootNodeName)
{
    $returnData=array(
        'status'=>$status,
        'msg'=>$msg,
        'data'=>$data
    );
    if($type == 'json' || !$type){
        return json_encode($returnData,JSON_UNESCAPED_UNICODE);
    }elseif($type == 'xml'){
        $rootNodeName=$rootNodeName?:'root';
        return Tool::arrToXml($returnData,$rootNodeName,null);
    }
}