<?php

/**
 * @name Bootstrap
 * @author weiyi
 * @desc   所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see    http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:\Yaf\Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends \Yaf\Bootstrap_Abstract
{
    private $_config;

    public function _initConfig()
    {
        $configPath = \Yaf\Application::app()->getConfig()['application']['configDir'] ?? APPLICATION_PATH . '/conf/';

        $this->_config = new \Noodlehaus\Config(
            [
                $configPath . Env(),
            ]
        );

        \Yaf\Registry::set("config", $this->_config);
    }

    public function _initLog()
    {
        try {
            # application log
            $logger = new \Monolog\Logger($this->_config['logger']['app']['name']);
            $uidProcessor = new \Monolog\Processor\UidProcessor(32);
            $logger->pushProcessor(new \Monolog\Processor\IntrospectionProcessor());
            $logger->pushProcessor($uidProcessor);
            $stream = new \Monolog\Handler\StreamHandler(
                $this->_config['logger']['app']['path'] . '.' . date('Ymd'),
                $this->_config['logger']['app']['level'],
                $this->_config['logger']['app']['bubble'],
                0766
            );
            $logger->pushHandler($stream);
            \Yaf\Registry::set('applog', $logger);
            \Yaf\Registry::set("uidprocessor", $uidProcessor);

            # sql log
            $logger = new \Monolog\Logger($this->_config['logger']['sql']['name']);
            $logger->pushProcessor(new \Monolog\Processor\IntrospectionProcessor());
            $logger->pushProcessor($uidProcessor);
            $stream = new \Monolog\Handler\StreamHandler(
                $this->_config['logger']['sql']['path'] . '.' . date('Ymd'),
                $this->_config['logger']['sql']['level'],
                $this->_config['logger']['sql']['bubble'],
                0766
            );

            $logger->pushHandler($stream);
            \Yaf\Registry::set("sqllog", $logger);
        } catch (\Exception $e) {

        }
    }

    public function _initPlugin(\Yaf\Dispatcher $dispatcher)
    {
        //注册一个插件
        $objSamplePlugin = new SamplePlugin();
        $dispatcher->registerPlugin($objSamplePlugin);
    }

    public function _initRoute(\Yaf\Dispatcher $dispatcher)
    {
        //在这里注册自己的路由协议,默认使用简单路由
    }

    public function _initView(\Yaf\Dispatcher $dispatcher)
    {
        //在这里注册自己的view控制器，例如smarty,firekylin
    }

    public function _initRegistry()
    {
        \Yaf\Registry::set('registry', new \App\Library\Registry());
    }
}
