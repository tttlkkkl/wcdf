<?php
/**
 * 考勤记录逻辑
 *
 * Date: 17-5-6
 * Time: 下午10:29
 * author :李华 yehong0000@163.com
 */

namespace app\work\logic;


class WorkRecord
{
    protected static $Obj;
    protected $Model;
    private function __construct()
    {
        $this->Model=\app\work\model\WorkRecord::getInstance();
    }


    /**
     * @return Work
     */
    static public function getInstance()
    {
        if (!self::$Obj) {
            self::$Obj = new self;
        }
        return self::$Obj;
    }

    public function sign($data)
    {

    }
}