<?php
/**
 * 打卡记录模型
 *
 * Date: 17-5-6
 * Time: 下午7:31
 * author :李华 yehong0000@163.com
 */

namespace app\work\model;


class WorkRecord
{
    protected static $Obj;
    protected $table='work_record';

    private function __construct()
    {
    }

    /**
     * @return Work
     */
    public static function getInstance()
    {
        if(!self::$Obj){
            self::$Obj=new self;
        }
        return self::$Obj;
    }
}