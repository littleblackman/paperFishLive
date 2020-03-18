<?php

abstract class Controller
{

    private $view;
    protected $request;
    protected $session;


    public function __construct($request) {

        // store request
        $this->request = $request;

        // créer la session
        $session = new Session();
        $this->session = $session;
        $this->view = new View($session);

        // vérifier les autorisations
        if(!$this->checkAccess()) $this->redirect('403');

    }

    public function pathTemplate($path) {
        $this->view->setPathTemplate($path);
    }

    public function render($template, $datas = []) {
        $myView = $this->view;
        $myView->setTemplate($template);
        $myView->render($datas);
    }

    public function checkAccess() {
        $credentials = $this->session->getCredentials();
        if(!in_array($this->request->getAccess(), $credentials)) return false;
        return true;

    }

    public function redirect($route) {
        $this->view->redirect($route);
    }

    public function renderJson($datas)
    {
        echo json_encode($datas);
    }


}