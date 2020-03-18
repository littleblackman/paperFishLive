<?php


class View
{

    private $template;
    private $pathTemplate = null;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function setPathTemplate($path) {
        $this->pathTemplate = $path;
    }

    public function setTemplate($template) {
        $this->template = $template;
    }

    public function render($datas = []) {

        use_helper('front');

        $app_session = $this->session;

        extract($datas);

        ob_start();

        if($this->pathTemplate) {
            include_once($this->pathTemplate.$this->template.'.php');
        } else {
            include_once(VIEW.$this->template.'.php');
        }

        $contentPage = ob_get_clean();

        include_once(VIEW.'template.php');

    }

    public function redirect($route) {

        use_helper('front');
        $path = path($route);
        header("Location:".$path);
    }
}