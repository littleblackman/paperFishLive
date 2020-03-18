<?php


class UserController extends Controller 
{

    private $userManager;

    public function __construct($request) {
        parent::__construct($request);
        $this->userManager = new UserManager();
        $this->authenticatorService = new AuthenticatorService($this->session);
    }

    public function create()
    {
        $data = $this->request->get('data');
        $result = $this->userManager->save($data);
        $this->session->setFlashMessage($result[0], $result[1]);

        if($result[1] == "success") {
            return $this->redirect('login');
        } else {
            return $this->redirect('register');
        }
    }

    public function auth() {
        $data = $this->request->get('data');
        if(!$this->authenticatorService->auth($data)) return $this->redirect('login');
        return $this->redirect('home');
    }

    public function logout() {
        $this->session->destroy();
        return $this->redirect('home');
    }
}