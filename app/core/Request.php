<?php



class Request
{

    private $route;
    private $params;
    private $controller;
    private $method;
    private $access;
    private $absoluteUrl;


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

    /**
     * Get the value of absoluteUrl
     */ 
    public function getAbsoluteUrl()
    {
        return HOST.$this->absoluteUrl;
    }

    /**
     * Set the value of absoluteUrl
     *
     * @return  self
     */ 
    public function setAbsoluteUrl($absoluteUrl)
    {
        $this->absoluteUrl = $absoluteUrl;

        return $this;
    }
}