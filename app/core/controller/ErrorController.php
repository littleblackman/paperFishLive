<?php



class ErrorController extends Controller
{
    public function index404() {
        $this->pathTemplate(CORE.'template/');
        return $this->render('error404');
    }
}