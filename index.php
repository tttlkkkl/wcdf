<?php
define('APPLICATION_PATH', dirname(__FILE__));

$application = new Yaf\Application( APPLICATION_PATH . "/conf/application.ini");

$application->bootstrap()->run();
//$application->getDispatcher()->dispath(new Yaf\Request\Simple());
?>
