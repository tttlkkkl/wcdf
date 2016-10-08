<?php

/**
 * 企业微信授权类
 * Date: 16-10-8
 * Time: 下午8:51
 * author :李华 yehong0000@163.com
 */
class WorkWeiXin
{
    public $aOption         = array();
    public $CID             = null;
    public $AID          = null;
    public $wHelper         = null;
    public $agentid = null;
    public $access_token = null;
    protected static $Obj;

    /**
     * WorkWeiXin constructor.
     * @param $cid 企业标识
     * @param $aid 应用标识
     */
    public function __construct($cid,$aid)
    {
        $this->CID=$cid;
        $this->AID=$aid;
    }

    /**
     * 获取实例
     * @param $cid
     * @param $aid
     */
    static public function getInstance($cid,$aid)
    {
        if(!self::$Obj){
            self::$Obj=new self($cid,$aid);
        }
        return self::$Obj;
    }

    /**
     * 获取access_token
     */
    public function getAccessToken()
    {

    }
}