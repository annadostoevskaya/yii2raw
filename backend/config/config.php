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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'user',
                    'pluralize' => false,
                ]
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',
        ],
    ],
];

?>
