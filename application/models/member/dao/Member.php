<?php

/**
 * 成员数据模型
 * Date: 16-10-6
 * Time: 下午10:34
 * author :李华 yehong0000@163.com
 */
namespace member\dao;
use think\Dao;
class MemberModel extends DAo
{
    protected static $Obj;
    protected $table='w_member';

    /**
     * 获取实例
     * @return MemberModel
     */
    public static function getInstance()
    {
        if(!self::$Obj){
            self::$Obj=new self;
        }
        return self::$Obj;
    }
}