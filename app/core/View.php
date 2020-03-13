<?php


class View
{

    private $template;

    public function setTemplate($template) {
        $this->template = $template;
    }

    public function render($datas = []) {

        use_helper('front');
        
        extract($datas);

        ob_start();

        include_once(VIEW.$this->template.'.php');

        $contentPage = ob_get_clean();

        include_once(VIEW.'template.php');

    }

    public function redirect($route) {

        use_helper('front');
        $path = path($route);
        header("Location:".$path);
    }
}