<?php


class Router
{

    private $request;

    private $routes;

    public function __construct() {

        (isset($_GET['r'])) ? $action = $_GET['r'] : $action = "";

        $this->routes = Route::createRoutesArray();

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


        } else {
            
            ($route == "403") ? $extension = "403" : $extension = "404";

            $route      = 'error'.$extension;
            $params     = [];
            $controller = "Error";
            $method     = "index".$extension;
            $access     = "public";
        }

        $request = new Request();
        $request->setRoute($route);
        $request->setParams($params);
        $request->setController($controller);
        $request->setMethod($method);
        $request->setAccess($access);
        $request->setAbsoluteUrl($action);

        $this->request = $request;  

    }

    public function render() {
        $request = $this->request;
        
        $controller = $request->getController().'Controller';
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
        $elements = explode('/', $action);
        unset($elements[0]);                

        foreach($vars as $key => $var) {
            if(isset($elements[$key+1])) {
                $params[$var] = $this->validData($elements[$key + 1]);
            }
        }

        if($_POST) {
            foreach($_POST as $key => $val ) {
                $params[$key] = $this->validData($val); 
            }
        }

        return $params;
    }

    public function validData($datas) {
        if(is_array($datas)) return $datas;
        $datas = trim($datas);
        $datas = stripslashes($datas);
        $datas = htmlspecialchars($datas);
        return $datas;
    }

}