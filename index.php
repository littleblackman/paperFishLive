<?php 
    // configurer l'application
    require_once('app/MyConfig.php');

    MyConfig::start();

    // lancer le router
    $router = new Router();
    $router->render();
