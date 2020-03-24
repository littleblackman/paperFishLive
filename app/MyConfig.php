<?php

class MyConfig
{

    public static function start() {

        // gérer les erreurs
        ini_set('display_errors','on');
        error_reporting(E_ALL);

        // lancer la session
        session_start();

        // création des constants
        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        $folder = "paperFishLive";

        define('ROOT', $root.''.$folder.'/');
        define('HOST', 'http://'.$host.'/'.$folder.'/');

        define('ASSETS', HOST.'assets/');
        define('CSS', ASSETS.'css/');
        define('JS', ASSETS.'js/');
        define('IMG', ASSETS.'img/');

        define('CORE', ROOT.'app/core/');
        define('CONTROLLER', ROOT.'src/controller/');
        define('VIEW', ROOT.'src/view/');

        define('CONFIG', ROOT.'app/config/');
        define('HELPER', CORE.'helper/');

        define('MANAGER', ROOT.'src/model/manager/');
        define('ENTITY', ROOT.'src/model/entity/');
        define('SERVICE', ROOT.'src/service/');
        define('MODEL', ROOT.'src/model/');

        // define const params
        $params = parse_ini_file(CONFIG.'params.ini', true);
        
        define('DB_HOST', $params['bdd']['DB_HOST']);
        define('DB_NAME', $params['bdd']['DB_NAME']);
        define('DB_LOGIN', $params['bdd']['DB_LOGIN']);
        define('DB_PWD', $params['bdd']['DB_PWD']);

        define('DEFAULT_PAGE_TITLE', $params['default']['PAGE_TITLE']);
        define('DEFAULT_PAGE_DESCRIPTION', $params['default']['PAGE_DESCRIPTION']);

        define('ENV', $params['app']['env']);

        require_once(CONFIG.'functions.php');

        // gérer autoload
        spl_autoload_register(array(__CLASS__, 'autoload'));

    }

    public static function autoload($class) {

        if(file_exists(CORE.$class.'.php')) {
            include_once(CORE.$class.'.php');
        } else if (file_exists(CONTROLLER.$class.'.php')) {
            include_once(CONTROLLER.$class.'.php');
        } else if (file_exists(MANAGER.$class.'.php')) {
            include_once(MANAGER.$class.'.php');
        } else if (file_exists(ENTITY.$class.'.php')) {
            include_once(ENTITY.$class.'.php');
        } else if (file_exists(SERVICE.$class.'.php')) {
            include_once(SERVICE.$class.'.php');
        }else if (file_exists(CORE.'controller/'.$class.'.php')) {
            include_once(CORE.'controller/'.$class.'.php');
        } else if (file_exists(MODEL.'validator/'.$class.'.php')) {
            include_once(MODEL.'validator/'.$class.'.php');
        }
    }

}