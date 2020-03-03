<?php


class View
{

    private $template;

    public function setTemplate($template) {
        $this->template = $template;
    }

    public function render($datas = []) {

        // ['id' => 38, 'name' => 'John Doe'];  1 array
        // transformer $id = 38    et name = 'JD'; 2 var
        
        extract($datas);

        ob_start();

        include_once(VIEW.$this->template.'.php');

        $contentPage = ob_get_clean();

        include_once(VIEW.'template.php');



    }

    public function redirect($route) {
        header("Location;".HOST.$route);
    }
}