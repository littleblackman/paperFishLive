<?php


class HomeController extends Controller
{
    public function index() {
        return $this->render('home/index');
    }

    public function register() {
        return $this->render('home/register');
    }

    public function login() {
        return $this->render('home/login');
    }
}