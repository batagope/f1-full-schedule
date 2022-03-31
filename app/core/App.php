<?php

class App {
    
    private $controller = 'HomeController';
    private $method = 'index';
    private $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // var_dump($url);

        if(isset($url[0]) && file_exists('app/controllers/' . $url[0] .  'Controller.php')) {
            $this->controller = $url[0] . 'Controller';
            //var_dump($this->controller);
            unset($url[0]);
        }

        //var_dump($url);

        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();

        if(isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        //var_dump($url);

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);

        //var_dump($url);
        
    }

    private function parseURL() {
        if(isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}