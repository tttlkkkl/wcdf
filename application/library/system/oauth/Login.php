<?php

/**
 * 后台系统管理员登录
 * Date: 16-10-9
 * Time: 下午9:16
 * author :李华 yehong0000@163.com
 */
namespace system\oauth;
use tool\Http;
use \tool\Tool;
class login
{
    static protected $Obj;
    public $company;
    private function __construct()
    {

    }

    /**
     * 检查是否已登录
     * @return bool
     */
    public function checkLogin()
    {
        return false;
    }
    /**
     * 获取实例
     */
    static public function getInstance()
    {
        if(!self::$Obj){
            self::$Obj=new self;
        }
        return self::$Obj;
    }

    /**
     * 获取微信扫码登录地址
     * @return string
     */
    public function getLoginUrl()
    {
        $corp_id=Base::getCompanyInfo(null)['corpid'];
        $state=Tool::randomStr(5);
        session('state_str',$state);
        $redirect_uri=\Yaf\Registry::get('config')->domain->root.'/system/login/callback';
        $redirect_uri=urlencode($redirect_uri);
        $url="https://qy.weixin.qq.com/cgi-bin/loginpage?corp_id={$corp_id}&redirect_uri={$redirect_uri}&state={$state}&usertype=all";
        return $url;
    }

    /**
     * 登录回调地址
     */
    public function callback()
    {
        $Request=\Yaf\Dispatcher::getInstance()->getRequest();
        if(session('state_str')!=$_REQUEST['state']){
            throw new \Exception('标识符错误或已过期，请重试！',4200);
        }
        $userInfo=$this->getLoginUserInfo($_REQUEST['auth_code']);
        if($userInfo){
            //pre($userInfo);
        }else{
            return false;
        }
    }

    /**
     * 获取登录用户信息
     * @param $code
     */
    public function getLoginUserInfo($code)
    {
        $url='https://qyapi.weixin.qq.com/cgi-bin/service/get_login_info?access_token='.WeiXin::getInstance(null,null);
        $data=Http::post($url,array('auth_code'=>$code));
        if($data['errcode']==0) {
            return $data['access_token'];
        }else{
            Log::emergency('授权信息获取失败！返回：'.json_encode($data));
            throw new \Exception('授权信息获取失败!',$data['errcode']);
        }
    }
    /**
     * 登录初始化,设置必要的系统变量等
     */
    public function init()
    {

    }
}