<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=mysqldb;dbname=test',
    'username' => 'dev',
    'password' => 'dev',
    'charset' => 'utf8',
    'tablePrefix' => 'dev_',
    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
