<?php

$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'template_project-console',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => $db,
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
