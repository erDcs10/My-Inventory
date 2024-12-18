<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=mysql-mydatabase-mightphantomservice.i.aivencloud.com:17317;dbname=mydb',
    'username' => 'erlangga',
    'password' => '123',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => false,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
