<?php
define('APPLICATION_PATH', dirname(__FILE__));

$application = new Yaf\Application( APPLICATION_PATH . "/conf/application.ini");
header("Content-Type:text/html;charset=UTF-8");
error_reporting(E_ERROR | E_PARSE);
$application->bootstrap()->run();
//$application->getDispatcher()->dispath(new Yaf\Request_Simple());
?>
