<?php
// web/index.php

require __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// Enable debug mode
$app['debug'] = true;

// Routes
require __DIR__.'/../app/routes.php';

$app->run();
