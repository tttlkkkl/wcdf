<?php

/**
 * 工具类
 * Date: 16-9-26
 * Time: 下午10:24
 * author :李华 yehong0000@163.com
 */
class Tool
{
    /**
     * 字符长度验证
     * @param $str
     * @param int $min
     * @param int $max
     * @param $remark
     * @param $must 是否必填验证
     * @return mixed
     * @throws \Exception
     */
    public static function checkStrLen($str,$min=1,$max=30,$remark,$must=true)
    {
        if($must===false && !$str){
            return $str;
        }
        $len=mb_strlen($str);
        if(!$len){
            throw new \Exception($remark.'是必填的哦',-6329);
        }
        if($len < $min){
            throw new \Exception($remark.'长度不能少于'.$min.'个字符哦',-6300);
        }
        if($len > $max){
            throw new \Exception($remark.$max.'个字符就够了~',-6301);
        }
        return $str;
    }

    /**
     * 金额验证
     * @param $val
     * @param $type
     * @param $min
     * @param $max
     * @return mixed
     * @throws \Exception
     */
    public static function checkMoney($val,$type,$min,$max){
        if(!$val || !is_numeric($val)){
            throw new \Exception('存在错误的金额数值~', -3002);
        }
        $valArr=explode('.',$val);
        if(strlen($valArr[1])>2){
            throw new \Exception('请填写如100.00的正确人民币金额数值', -3004);
        }
        if($type && ($val < $min || $val > $max)){
            throw new \Exception("单个金额应该介于{$min}元到{$max}元之间", -3003);
        }
        return $val;
    }

    /**
     * 时间验证，默认返回时间戳
     * @param $time
     * @remark  时间称谓
     * $param $type 0返回时间戳,1返回格式化的标准日期
     */
    public static function checkTime($time,$remark,$type)
    {
        if(!$time){
            throw new \Exception($remark.'不能为空哦~',-10000);
        }
        if(is_numeric($time)){
            if($time < 0){
                throw new \Exception($remark.'不是正确的时间格式，请确认~',-10001);
            }
        }
        if(is_string($time)){
            $time=strtotime($time);
            if(!$time){
                throw new \Exception($remark.'不是正确的时间格式，请确认~',-10002);
            }
        }
        return $type?date('Y-m-d H:i:s',$time):$time;
    }

    /**
     * 邮箱验证
     * @param $val
     * @param $must 是否必填验证
     * @return mixed
     * @throws Exception
     */
    public static function checkEmail($val,$must)
    {
        if($must===false && !$val){
            return $val;
        }
        $rule= '/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/';
        if(preg_match($rule,$val)){
            return $val;
        }else{
            throw new \Exception('请填写正确的邮箱~', -5003);
        }
    }
    /**
     * @param $val
     * @param $must 是否必填验证
     * @return mixed
     * @throws Exception
     */
    public static function checkMobile($val,$remark,$must=true){
        if($must===false && !$val){
            return $val;
        }
        if(preg_match("/^0?1[3|4|5|7|8][0-9]\d{8}$/",$val)){
            return $val;
        }else{
            throw new \Exception(($remark?:'手机号码').'格式不正确~', -5003);
        }
    }
    /**
     * 电话，传真
     * @param $val
     * @param $remark
     * @param $must 是否必填验证
     * @return mixed
     * @throws Exception
     */
    public static function checkTel($val,$remark,$must)
    {
        if($must===false && !$val){
            return $val;
        }
        $isTel="/^([0-9]{3,4}-)?[0-9]{7,8}$/";
        if(!preg_match($isTel,$val)){
            throw new \Exception($remark.'格式不正确哦~',-5632);
        }
        return $val;
    }

    /**
     * @param $val
     * @param $remark
     * @param $must 是否必填验证
     */
    public function checkNumber($val,$remark,$must)
    {
        if($must===false && !$val){
            return $val;
        }
        if(!is_numeric($val)){
            throw new \Exception($remark.'不是有效的数字',-555);
        }
        return $val;
    }
    /**
     * 网址验证
     * @param $val
     * @param $must 是否必填验证
     * @return mixed
     * @throws Exception
     */
    public static function checkUrl($val,$must)
    {
        if($must===false && !$val){
            return $val;
        }
        $str=strtolower(substr($val,0,4));
        if($str != 'http'){
            $val='http://'.$val;
        }
        if (!filter_var($val, FILTER_VALIDATE_URL)){
            throw new \Exception('网址格式不正确',-543);
        }
        return $val;
    }
    /**
     * 生成一个25个到32个字符长度的订单号,默认生成25个
     * @param $len
     */
    public static function getOrderId($len)
    {
        $len=$len?:25;
        $len=($len > 32)?32:$len;
        $fix=date('YmdHis');//前缀
        $mtLen=$len-25;//随机数字串长度
        $fix=(string)$fix.(string)self::random($mtLen);
        $plus=1E+10;
        $plus+=M('Order')->add(array('id'=>null));
        $fix.=(string)$plus;
        return $fix;
    }

    /**
     * 获得一个自增长id
     */
    public static function getUniqueNumber()
    {
        return M('Order')->add(array('id'=>null));
    }
    /**
     * 生成指定长度的随机数字
     * @param $length
     * @return string
     */
    public static function  random($length) {
        $chars = '0123456789';
        $hash = '';
        $max = 9;
        for($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
        return $hash;
    }

    /**
     * 获取指定长度的字符串
     * @param $len
     */
    public static function randomStr($len)
    {
        $chars = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
            'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
            'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G',
            'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
            'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2',
            '3', '4', '5', '6', '7', '8', '9'
        );
        $charsLen = count($chars) - 1;
        shuffle($chars);    // 将数组打乱

        $output = "";
        for ($i=0; $i<$len; $i++)
        {
            $output .= $chars[mt_rand(0, $charsLen)];
        }
        return $output;
    }
    /**
     * 获取32位不重复的字符串
     */
    public static function getNonceStr()
    {
        return md5(uniqid(md5(microtime(true)),true));
    }

    /**
     * arr转ｘｍｌ
     * @param $data
     * @param $rootNodeName
     * @param $xml
     * @return mixed
     */
    public static function arrToXml($data,$rootNodeName='root',$xml=null)
    {
        if (ini_get('zend.ze1_compatibility_mode') == 1)
        {
            ini_set ('zend.ze1_compatibility_mode', 0);
        }

        if ($xml == null)
        {
            $xml = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$rootNodeName />");
        }

        foreach($data as $key => $value)
        {
            if (is_numeric($key))
            {
                $key = 'num_'.$key;
            }

            // $key = preg_replace('/[0-9]+/i', '', $key);
            if (is_array($value))
            {
                $node = $xml->addChild($key);
                self::arrToXml($value, $node);
            }
            else
            {
                $value = htmlentities($value);
                $xml->addChild($key,$value);
            }

        }
        return $xml->asXML();
    }

}