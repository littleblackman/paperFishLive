<?php


class Session
{

    private $credentials = ['private', 'public'];

    public function getCredentials() {
        return $this->credentials;
    }
}