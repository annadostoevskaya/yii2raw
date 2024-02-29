<?php 

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=db;dbname=default',
    'username' => 'default', // TODO(annad): `getenv` || config/environment.php
    'password' => 'secret',
    'charset' => 'utf8',
    'tablePrefix' => 't_',
];

?>
