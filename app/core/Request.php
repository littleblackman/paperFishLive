<?php



class Request
{

    private $route;
    private $params;
    private $controller;
    private $method;
    private $access;


    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    public function getRoute() {
        return $this->route;
    }


    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    public function getController() {
        return $this->controller;
    }


    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function getMethod() {
        return $this->method;
    }


    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    public function getParams() {
        return $this->params;
    }


    // dans le controller $request->get('id');
    public function get($param) {
        return $this->params[$param];
    }


    public function setAccess($access)
    {
        $this->access = $access;
        return $this;
    }

    public function getAccess() {
        return $this->access;
    }


}