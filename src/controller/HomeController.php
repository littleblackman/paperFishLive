<?php


class HomeController extends Controller
{
    public function index() {
        if($this->session->isLogged() == 1) $this->redirect('dashboard');
        return $this->render('home/index');
    }

    public function dashboard() {
        return $this->render('home/dashboard');
    }

    public function register() {
        return $this->render('home/register');
    }

    public function login() {
        return $this->render('home/login');
    }
}