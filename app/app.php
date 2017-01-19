<?php
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), 
    array('twig.path' => __DIR__ . '/../views'));
$app->register(new Silex\Provider\AssetServiceProvider(), 
    array('assets.version' => 'v1'));
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), 
    array('translator.domains' => array()));

// Register services.
$app['dao.class'] = function ($app) {
    return new GestSchool\DAO\ClassDAO($app['db']);
};
$app['dao.student'] = function ($app) {
    return new GestSchool\DAO\StudentDAO($app['db']);
};
