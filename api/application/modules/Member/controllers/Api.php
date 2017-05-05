<?php

/**
 *　成员ａｐｉ
 * Date: 16-9-29
 * Time: 下午10:48
 * author :李华 yehong0000@163.com
 */
class ApiController extends system\controllers\Api {
    public function init() {
        parent::init(); // TODO: Change the autogenerated stub
    }

    /**
     * 成员资源
     */
    public function memberAction() {

    }

    /**
     * 部门资源
     */
    public function departmentsAction() {
        $fun = sprintf('%sDepartment', $this->getRequest()->getMethod());
        $this->getResponse()->setBody($this->packing(0, 'success', call_user_func(
            [
                'system\member\Factory',
                $fun
            ],
            self::getParams()
        ), null, null));
    }

    /**
     * 组织架构资源
     */
    public function organizationsAction() {
        $fun = sprintf('%sOrganization', $this->getRequest()->getMethod());
        $this->getResponse()->setBody($this->packing(0, 'success', call_user_func(
            [
                'system\member\Factory',
                $fun
            ],
            self::getParams()
        ), null, null));
    }
}