<?php

$db = require __DIR__ . '/db.php';

return [
    'id' => 'olympiads-console',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => $db,
    ],
];