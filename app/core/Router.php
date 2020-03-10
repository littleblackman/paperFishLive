<?php


class Router
{

    private $request;

    // exemple d'url  monsite.fr/show/56/2020-02-21
    // index.php?r=show/56/2020-02-21
    private $routes = [     
                            'home' => ['controller' => 'Home', 'method' => 'index', 'vars' =>  'id', 'access' => 'public'],
                            'show' => ['controller' => 'Home', 'method' => 'show' , 'vars' => 'id/date'],

    ];


    public function __construct() {

        (isset($_GET['r'])) ? $action = $_GET['r'] : $action = "home";  // $action = show/56/2019

        $route = $this->getRoute($action);

        if(key_exists($route, $this->routes)) {

            $controller = $this->routes[$route]['controller'];
            $method     = $this->routes[$route]['method'];

            if(isset($this->routes[$route]['vars'])) {
                $vars = explode('/', $this->routes[$route]['vars']); // id/date
            } else {
                $vars = [];
            }

            if(isset($this->routes[$route]['access'])) {
                $access = $this->routes[$route]['access']; 
            } else {
                $access = 'public';
            }

            $params = $this->getParams($action, $vars);


            $request = new Request();
            $request->setRoute($route);
            $request->setParams($params);
            $request->setController($controller);
            $request->setMethod($method);
            $request->setAccess($access);

            $this->request = $request;

        } else {
            // 404
        }

    }

    public function render() {
        $request = $this->request;
        
        $controller = $request->getController();
        $method     = $request->getMethod();

        $currentController = new $controller($request);
        $currentController->$method();
    }

    public function getRoute($action) {
        $elements = explode('/', $action);
        return $elements[0];
    }

    public function getParams($action, $vars) {
     
        $params = [];

        // get

        $elements = explode('/', $action);
        unset($elements[0]);                     //   56/2019

        foreach($vars as $key => $var) {        //id/date
            if(isset($elements[$key+1])) {
                $params[$var] = $elements[$key + 1];
            }
        }

        // id => 56 et date => 2019


        // post

        if($_POST) {
            foreach($_POST as $key => $val ) {
                $params[$key] = $val; 
            }
        }


        return $params;

    }

}