<?php

/**
 * 错误处理
 * Date: 16-9-29
 * Time: 下午11:55
 * author :李华 yehong0000@163.com
 */
class ErrorController extends Yaf\Controller_Abstract {

	public function init()
	{
		Yaf\Dispatcher::getInstance()->disableView();
		$this->setViewpath(VIEW_DIR);
	}

	public function errorAction($exception) {
		if(Yaf\Registry::get('config')->debug){
			var_dump($exception);
			return 0;
		}
		$Response=$this->getResponse();
		$Request=$this->getRequest();
		$Response->clearBody();
		if($Request->isGet()){//get请求时返回
			if(in_array($exception->getCode(),[512,513,514,519,520,521])){
				$Response->setHeader($Request->getServer('SERVER_PROTOCOL'),'500 Internal Server Error');
				$this->getView()->assign('message',$exception->getMessage());
				$this->display('error');
			}elseif(in_array($exception->getCode(),[515,516,517,518])){
				$Response->setHeader($Request->getServer('SERVER_PROTOCOL'),'404 Not Found');
				$this->getView()->assign('message',$exception->getMessage());
				$this->display('404');
			}else{
				$Response->setHeader('Content-Type', 'application/json; charset=utf-8');
				$Response->setHeader($Request->getServer('SERVER_PROTOCOL'),'503 Service Unavailable');
				$Response->setBody(packing($exception->getCode(),$exception->getMessage(),null,null,null));
			}
		}else{
			$Response->setHeader('Content-Type', 'application/json; charset=utf-8');
			$Response->setBody(packing($exception->getCode(),$exception->getMessage(),null,null,null));
		}
	}
}