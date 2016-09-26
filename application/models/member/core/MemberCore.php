<?php

/**
 *
 * Date: 16-9-26
 * Time: 下午10:26
 * author :李华 yehong0000@163.com
 */
namespace member\core;
class MemberCore
{
    static public $Obj;
    public function __construct()
    {
    }
    public static function getInstance()
    {
        if(!self::$Obj){
            self::$Obj=new self;
        }
        return self::$Obj;
    }
    public function addMember()
    {
        echo '加载';
    }
}