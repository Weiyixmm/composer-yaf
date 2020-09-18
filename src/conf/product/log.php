<?php
/**
 * Created PhpStorm.
 * User: liyw<634482545@qq.com>
 * Date: 2020-09-07
 * File: log.php
 * Desc: 日志配置文件
 */

return [
    'logger' => [
        'app' => [
            'name'   => 'app',
            'path'   => dirname(APPLICATION_PATH) .
                        DIRECTORY_SEPARATOR .
                        'logs' .
                        DIRECTORY_SEPARATOR .
                        'app' .
                        DIRECTORY_SEPARATOR .
                        date('Ymd') .
                        DIRECTORY_SEPARATOR .
                        'app.log',
            'level'  => \Monolog\Logger::INFO,
            'bubble' => true,
        ],
        'sql' => [
            'name'   => 'sql',
            'path'   => dirname(APPLICATION_PATH) .
                        DIRECTORY_SEPARATOR .
                        'logs' .
                        DIRECTORY_SEPARATOR .
                        'sql' .
                        DIRECTORY_SEPARATOR .
                        date('Ymd') .
                        DIRECTORY_SEPARATOR .
                        'sql.log',
            'level'  => \Monolog\Logger::DEBUG,
            'bubble' => false,
        ],
    ],
];