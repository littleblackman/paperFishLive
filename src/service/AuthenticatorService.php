<?php


class AuthenticatorService
{
    private $session;
    private $userManager;

    public function __construct($session) {
        $this->session = $session;
        $this->userManager = new UserManager();
    }

    public function autoconnect(){}

    public function auth($data) {

        if(!$user = $this->userManager->findByEmail($data['email'])) {
            $this->session->setFlashMessage('Email ou mot de passe incorrect !', 'error');
            return false;
        }
        if(!password_verify($data['password'], $user->getPassword())) {
            $this->session->setFlashMessage('Email ou mot de passe incorrect ;(', 'error');
            return false;
        } 
        $this->session->initUserSession($user);
        $this->session->setFlashMessage('Welcome sur PaperFish '.$user->getUsername(), 'success');
        return true;

    }
}