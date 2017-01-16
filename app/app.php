<?php
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());

// Register services.
$app['dao.class'] = function ($app) {
    return new GestSchool\DAO\ClassDAO($app['db']);
};
$app['dao.student'] = function ($app) {
    return new GestSchool\DAO\StudentDAO($app['db']);
};
