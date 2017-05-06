<?php

/**
 *
 * Date: 17-5-6
 * Time: 下午7:11
 * author :李华 yehong0000@163.com
 */
namespace app\work\logic;
use log\Log;
use app\work\model\Work as Model;
class Work
{
    static protected $Obj;

    private function __construct() {

    }


    /**
     * @return Work
     */
    static public function getInstance() {
        if (!self::$Obj) {
            self::$Obj = new self;
        }
        return self::$Obj;
    }

}