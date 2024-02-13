<?php

$db = require __DIR__ . '/db.php';
$redis = require __DIR__ . '/redis.php';

$config = [
    'bootstrap' => [
        'queue',
    ],
    'id' => 'template_project-console',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => $db,
        'queue' => [
            'class' => 'yii\queue\redis\Queue',
            'as log' => 'yii\queue\LogBehavior',
            'redis' => 'redis',
        ],
        'redis' => $redis,
    ],
];

if (YII_ENV == 'dev')
{
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
