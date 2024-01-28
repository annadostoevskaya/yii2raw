<?php

$db = require __DIR__ . '/db.php';

return [
    'id' => 'olympiads',
    'basePath' => dirname(__DIR__),
    'components' => [
        'errorHandler' => [
            'errorAction' => 'api/error'
        ],
        'db' => $db,
    ],
];

?>
