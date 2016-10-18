<?php

/**
 *　成员ａｐｉ
 * Date: 16-9-29
 * Time: 下午10:48
 * author :李华 yehong0000@163.com
 */
use \member\MemberModel;
class ApiController extends system\controllers\Api
{
    public function init()
    {
        Yaf\Dispatcher::getInstance()->disableView();
    }

    /**
     * 添加成员，数据字段与微信接口提供的一致
     */
    public function addAction()
    {
        $param=array(//参数示例
            'userid'=>'xcccxx',
            'name'=>'ccc',
            'position'=>'工程师',
            'mobile'=>'18025434220',
            'gender'=>1,
            'email'=>'a@a.com',
            'weixinid'=>'weixinid',
            'is_leader'=>1
        );
        $this->getResponse()->setBody(packing(0,'success',MemberModel::addMember($param),null,null));
    }
}