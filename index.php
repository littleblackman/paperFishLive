<?php 
    ini_set('display_errors','on');
    error_reporting(E_ALL);

    // configurer l'application
    require_once('app/MyConfig.php');

    MyConfig::start();

    // lancer le router
    $router = new Router();
    $router->render();
