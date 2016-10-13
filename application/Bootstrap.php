<?php
/**
 * @name Bootstrap
 * @author root
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf\Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf\Bootstrap_Abstract{

	/**
	 * 配置文件全局挂载
	 */
    public function _initConfig()
	{
		$arrConfig = Yaf\Application::app()->getConfig();
		Yaf\Registry::set('config', $arrConfig);
	}

	/**
	 * 设置系统常量
	 */
	public function _initConstant()
	{
		define('DS',DIRECTORY_SEPARATOR);
		define('APP_DIR',Yaf\Registry::get('config')->application->directory);
		define('ROOT_DIR',dirname(APP_DIR));
		define('VIEW_DIR',APP_DIR.DS.'views'.DS);
	}
	/**
	 * 全局函数库的加载
	 */
	public function _initCommonFunction()
	{
		Yaf\Loader::import(Yaf\Registry::get('config')->application->directory . '/library/Common/Functions.php');
	}

	/**
	 * 注册一个插件
	 * @param \Yaf\Dispatcher $dispatcher
	 */
	public function _initPlugin(Yaf\Dispatcher $dispatcher)
	{
		$Config=Yaf\Registry::get('config');
		if($Config->debug && $Config->xhprof->dir){//开启xhprof性能追踪
			$dispatcher->registerPlugin(new XhprofPlugin());
		}
		$dispatcher->registerPlugin(new ApiPlugin());
		$dispatcher->registerPlugin(new UserInitPlugin());
	}

	public function _initRoute(Yaf\Dispatcher $dispatcher)
	{
		//在这里注册自己的路由协议,默认使用简单路由
	}

	public function _initView(Yaf\Dispatcher $dispatcher)
	{
		//在这里注册自己的view控制器，例如smarty,firekylin
	}
}
