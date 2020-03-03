<?php

class Controller
{

    private $view;
    protected $request;
    protected $session;


    public function __construct($request) {
        $this->request = $request;
        $this->view = new View();

        // créer la session
        $this->session = new Session();


        // vérifier les autorisations
        if(!$this->checkAccess()) $this->redirect('403');


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


}