<?php

/**
 * Class OrganizationLogic
 * 企业组织架构
 *
 * @datetime: 2017/5/5 16:51
 * @author: lihs
 * @copyright: ec
 */

namespace system\member\logic;


use common\Nsq;

class OrganizationLogic {
    /**
     * 更新组织架构
     *
     * @param $data
     */
    public function put($data){
        return Nsq::getInstance()->pub('web_member',['xxx']);
    }
}