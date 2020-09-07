<?php

/* 定义这个常量是为了在application.ini中引用*/
define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));

include dirname(APPLICATION_PATH) . "/vendor/autoload.php";
include APPLICATION_PATH . '/application/Initialization.php';

$application = new \Yaf\Application( APPLICATION_PATH . '/conf/application.ini', 'product');

$application->bootstrap()->run();
?>
