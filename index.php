<?php
define('APPLICATION_PATH', dirname(__FILE__));

$application = new Yaf\Application( APPLICATION_PATH . "/conf/application.ini");
header("Content-Type:text/html;charset=UTF-8");
$application->bootstrap()->run();
//$application->getDispatcher()->dispath(new Yaf\Request\Simple());
?>
