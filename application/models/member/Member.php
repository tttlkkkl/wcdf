<?php

/**
 * 成员提供方法列表
 * Date: 16-9-26
 * Time: 下午10:20
 * author :李华 yehong0000@163.com
 */
namespace member;
use member\core\MemberCore;
class Member
{
    static public function addMember()
    {
        return MemberCore::getInstance()->addMember();
    }
}