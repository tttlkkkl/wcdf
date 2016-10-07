<?php

/**
 *
 * Date: 16-9-26
 * Time: 下午10:26
 * author :李华 yehong0000@163.com
 */
namespace member\core;
use member\dao\MemberModel;

class MemberCoreModel
{
    static public $Obj;
    public function __construct()
    {
    }

    /**
     * 获取实例
     * @return MemberCoreModel
     */
    public static function getInstance()
    {
        if(!self::$Obj){
            self::$Obj=new self;
        }
        return self::$Obj;
    }

    /**
     * 添加用户，数据结构和微信接口一致
     * @param $data
     */
    public function addMember($data)
    {
        $user=db('member');
        $rs=$user->where(1)->paginate(1);
        $page = $rs->render();
        print_r($page);
    }
}