<?php

/**
 * 默认模块，封装一些系统级别的接口
 */
class IndexController extends system\controllers\Web {
	public function init()
	{
		parent::init();
	}

	/**
	 * @return bool
	 */
	public function indexAction()
	{
		echo '欢迎使用企业号快速开发服务框架';
		return true;
	}
}
