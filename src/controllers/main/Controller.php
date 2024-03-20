<?php

namespace App\Controllers\Main;

class Controller {

    public function render($view, $params){
        ob_start();
        require dirname(dirname(__DIR__)) . "/templates/" . $view . ".php";

        $content =  ob_get_clean();
        
        require dirname(dirname(__DIR__)) . "/templates/layouts.php";
    }

    // Permet de créer une redirection
    public function redirection(string $url){
        http_response_code(301);
        header('Location: '.$url);
    }
}