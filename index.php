<?php

    require 'vendor/autoload.php';
    require 'config/db.php';

    $app = new \Slim\Slim(array(
        'debug' => true,
        'view' => new \Slim\Views\Twig(),
        'templates.path' => 'views'
        )
    );
    
    $view = $app->view();
    $view->parserExtensions = array(
        new \Slim\Views\TwigExtension(),
    );

    require 'config/routes.php';
   
    $app->run();