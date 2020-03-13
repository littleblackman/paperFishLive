<?php


class AuthenticatorService extends Controller
{
    public function auth($user, $password) {
        if(!password_verify($password, $user->getPassword())) return null;

        $this->session->initUserSession($user);

        return true;

    }
}