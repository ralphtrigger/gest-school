<?php

// doctrine (db)
$app['db.options'] = array(
    'driver' => 'pdo_mysql',
    'charset' => 'utf8',
    'host' => 'localhost',
    'port' => '3306',
    'dbname' => 'gestschooldb',
    'user' => 'gestschool_user',
    'password' => 'password',
);