<?php
/**
 * Created PhpStorm.
 * User: liyw<634482545@qq.com>
 * Date: 2020-09-04
 * File: Initialization.php
 * Desc: 初始化文件
 */

define('NOW_DATETIME', date('Y-m-d H:i:s'));
define('NOW_TIMESTAMP', time());

function App()
{
    return \Yaf\Application::app();
}


/**
 * @return App\Library\Registry
 */
function Registry()
{
    return \Yaf\Registry::get('registry');
}

/**
 * @return Monolog\Logger
 */
function Applog()
{
    return Registry()->Applog();
}

/**
 * @return Monolog\Logger
 */
function Sqllog()
{
    return Registry()->Sqllog();
}

/**
 * @return Monolog\Logger
 */
function UidProcessor()
{
    return  Registry()->UidProcessor();
}

/**
 * @param $configName
 * @return array|mixed|string|null
 */
function Config($configName)
{
    return $configName ? Registry()->Config()->get($configName) : '';
}

function Env($configName = 'env')
{
    return App()->getConfig()->get($configName);
}