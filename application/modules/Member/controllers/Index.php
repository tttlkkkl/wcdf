<?php

/**
 * web管理后台
 * Date: 16-9-26
 * Time: 下午11:03
 * author :李华 yehong0000@163.com
 */
use \member\MemberModel;
class IndexController extends system\controllers\Web
{
    public function indexAction()
    {
        echo '用户模块首页';
        echo MemberModel::addMember(array());
        var_dump(Yaf\Dispatcher::getInstance());
    }
}