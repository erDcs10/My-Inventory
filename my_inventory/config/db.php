<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=192.168.141.195:3306;dbname=mydb',
    'username' => 'erlangga',
    'password' => '123',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => false,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
