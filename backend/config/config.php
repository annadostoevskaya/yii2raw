<?php

$db = require __DIR__ . '/db.php';
$redis = require __DIR__ . '/redis.php';

return [
    'id' => 'template_project',
    'basePath' => dirname(__DIR__),
    'components' => [
        'errorHandler' => [
            'errorAction' => 'api/error'
        ],
        'db' => $db,
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'cache' => (YII_DEBUG ? ['class' => 'yii\caching\DummyCache'] : [
            'class' => 'yii\redis\Cache',
            'redis' => 'redis',
        ]),
        'queue' => [
            'class' => 'yii\queue\redis\Queue',
            'as log' => 'yii\queue\LogBehavior',
            'redis' => 'redis',
        ],
        'redis' => $redis,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'user',
                    'pluralize' => false,
                ],
                [
                    'pattern' => '<controller>/<action>',
                    'route' => '<controller>/<action>'
                ]
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',
        ],
    ],
];

?>
