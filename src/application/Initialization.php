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

function Registry()
{
    return \Yaf\Registry::get('registry');
}

function Applog()
{
    return Registry()->Applog();
}

function Sqllog()
{
    return Registry()->Sqllog();
}

function UidProcessor()
{
    return  Registry()->UidProcessor();
}

function Config($configName = null)
{
    return is_null($configName) ? Registry()->Config()->get() : Registry()->Config()->get($configName);
}

function Env($configName = 'env')
{
    return App()->getConfig()->get($configName);
}