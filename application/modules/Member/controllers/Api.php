<?php

/**
 *　成员ａｐｉ
 * Date: 16-9-29
 * Time: 下午10:48
 * author :李华 yehong0000@163.com
 */
class ApiController extends system\controllers\Api
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    /**
     * 添加成员，数据字段与微信接口提供的一致
     */
    public function departmentAction()
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
        $fun=sprintf('%sDepartment',$this->getRequest()->getMethod());
        $this->getResponse()->setBody(packing(0,'success',call_user_func(array('system\member\Factory',$fun)),null,null));
    }
}