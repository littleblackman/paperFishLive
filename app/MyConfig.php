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


        // gérer autoload
        spl_autoload_register(array(__CLASS__, 'autoload'));

    }

    public static function autoload($class) {

        if(file_exists(CORE.$class.'.php')) {
            include_once(CORE.$class.'.php');
        } else if (file_exists(CONTROLLER.$class.'.php')) {
            include_once(CONTROLLER.$class.'.php');
        }
    }

}