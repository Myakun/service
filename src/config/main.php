<?php

declare(strict_types=1);

use app\components\i18n\Formatter;
use yii\caching\FileCache;
use yii\helpers\ArrayHelper;

$params = include __DIR__ . '/params.php';

$config = [
    'aliases' => [
        '@bower' => __DIR__ . '/../vendor/bower-asset'
    ],
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'authManager' => [
            'class' => yii\rbac\DbManager::class,
        ],
        'cache' => [
            'class' => FileCache::class
        ],
        'db' => [
            'charset' => 'utf8',
            'class' => yii\db\Connection::class,
            'tablePrefix' => '',
            'enableSchemaCache' => !YII_DEBUG,
        ],
        'errorHandler' => [
            'discardExistingOutput' => !YII_DEBUG
        ],
        'formatter' => [
            'class' => Formatter::class,
            'dateFormat' => 'php:d.m.Y',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'file' => [
                    'class' => yii\log\FileTarget::class,
                    'enabled' => true,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'mailer' => [
            'class' => yii\swiftmailer\Mailer::class,
            'htmlLayout' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
            ],
        ],
    ],
    'id' => 'warehouse',
    'language' => 'ru',
    'params' => $params['params'],
    'timeZone' => 'Europe/Moscow',
];

$config['components']['db'] = ArrayHelper::merge($config['components']['db'], [
    'dsn' => sprintf(
        'mysql:dbname=%s;host=%s;port=%d;',
        $params['MySQL']['database'],
        $params['MySQL']['host'],
        $params['MySQL']['port'],
    ),
    'password' => $params['MySQL']['password'],
    'username' =>  $params['MySQL']['username'],
]);

$config['components']['mailer']['transport'] = ArrayHelper::merge($config['components']['mailer']['transport'], [
    'encryption' => $params['mailer']['encryption'],
    'host' => $params['mailer']['host'],
    'password' => $params['mailer']['password'],
    'port' => $params['mailer']['port'],
    'username' => $params['mailer']['username'],
]);

return $config;