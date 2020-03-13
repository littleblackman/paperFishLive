<?php


class Session
{

    private $credentials = ['private', 'public'];

    public function getCredentials() {
        return $this->credentials;
    }

    public function initUserSession($user) {
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['role'] = $user->getRole();
    }

    public function getRole() {
        return $_SESSION['role'];
    }
    
}