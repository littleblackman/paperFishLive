<?php


class UserController extends Controller 
{

    private $userManager;

    public function __construct($request) {
        parent::__construct($request);
        $this->userManager = new UserManager();
        $this->authenticatorService = new AuthenticatorService();
    }

    public function create()
    {
        $data = $this->request->get('data');
        $this->userManager->create($data);
        return $this->redirect('home');
    }

    public function auth() {

        $data = $this->request->get('data');

        // récupérer le user via son email
        if(!$user = $this->userManager->findByEmail($data['email'])) {
            echo 'false'; exit;
            return  $this->redirect('login'); // avec un message;
        }

        $this->authenticatorService->auth($user, $data['password']);

        // authentifier 

        // si echec return home avec message

        // si oui return avec message

    }
}