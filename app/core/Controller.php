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
        $session->setRequest($request);
        $this->session = $session;
        $this->view = new View($session);

         // check security and auth
         $this->checkAndInitApp();

    }

    public function pathTemplate($path) {
        $this->view->setPathTemplate($path);
    }

    public function render($template, $datas = []) {
        $myView = $this->view;
        $myView->setTemplate($template);
        $myView->render($datas);
    }

    public function checkAndInitApp() {

        // check if user not logged, try to connect
        if(!$this->session->isLogged()) {
            if(isset($_COOKIE['identifiant'])) {
                $identifiant = base64_decode($_COOKIE['identifiant']);
                $elements = explode('(paperFish)', $identifiant);
                $email = $elements[0];
                $pwd   = $elements[1];
                $authentificationService = new AuthenticatorService($this->session);
                if($authentificationService->autoconnect($email, $pwd)) {
                    $this->redirect($this->request->getRoute());
                }
            }
        }

        // check if user is authorized
        if(!$this->checkAccess()) {
          $this->redirect("login");
        }

        // if user logged redirect to the home private
        if($this->request->getRoute() == "" && $this->session->isLogged()) {
          $this->redirect("dashboard");
        }
  }

    public function checkAccess() {

        if($this->request->getAccess() == 'public') return true;
        if(in_array($this->request->getAccess(), $this->session->getAccess())) return true;
        return false;
    }

    public function isOwner($object) {
        if($this->session->getUserId() != $object->getOwnerId()) return false;
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