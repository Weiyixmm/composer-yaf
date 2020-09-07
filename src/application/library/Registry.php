<?php
/**
 * Created PhpStorm.
 * User: liyw<634482545@qq.com>
 * Date: 2020-09-04
 * File: Registry.php
 * Desc: 服务注册容器
 */

namespace App\Library;

class Registry
{
    public function __call($name, $args = [])
    {
	    return \Yaf\Registry::get(strtolower($name)) ?: \Yaf\Registry::get(strtolower($name));
    }
}