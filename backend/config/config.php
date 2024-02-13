<?php

$db = require __DIR__ . '/db.php';

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
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'redis',
            'port' => 6379,
            'database' => 0,
            'retries' => 1,
        ],
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
        ]
    ],
];

?>
