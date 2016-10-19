<?php

/**
 * web端成员登录
 * Date: 16-10-9
 * Time: 下午9:16
 * author :李华 yehong0000@163.com
 */
namespace system\oauth;
use tool\Http;
use \tool\Tool;
class Login
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
    static public function checkLogin()
    {
        return (defined('CID') || defined('UID'));
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
        $state=session('state_str');
        if(!$state){
            $state=Tool::randomStr(5);
            session('state_str',$state);
        }
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
        if(session('state_str')!=$_REQUEST['state']){
            throw new \Exception('标识符错误或已过期，请重试！',4200);
        }
        $userInfo=$this->getLoginUserInfo($_REQUEST['auth_code']);
        $userInfo=json_decode($userInfo,true);
        if($userInfo){
            return $this->loginInit($userInfo);
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
        $url='https://qyapi.weixin.qq.com/cgi-bin/service/get_login_info?access_token='.WeiXin::getInstance(null,null)->getAccessToken();
        try{
            return Http::post($url,json_encode(array('auth_code'=>$code)));
        }catch(\Exception $E){
            Log::emergency('授权信息获取失败！--'.$E->getCode().':'.$E->getMessage());
            throw new \Exception($E->getCode(),$E->getMessage());
        }
    }
    /**
     * 登录初始化,设置必要的系统变量等
     */
    public function loginInit($userInfo)
    {
        //TODO 待权限系统和用户系统完成编写相应的逻辑代码
        echo '登录信息认证成功!'."\n";
        echo '欢迎你'.($userInfo['usertype']==5?'普通成员-':'管理员-').$userInfo['user_info']['name'];
        return false;
    }
}