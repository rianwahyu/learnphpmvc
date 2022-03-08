<?php

class App
{

    protected $controller = 'Home';
    protected $method = 'index';
    protected $param = [];

    public function __construct()
    {
        $url = $this->parseURL();
        

        //controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
            
        }

        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        //method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if(!empty($url)){
            $this->params = array_values($url);
            
        }
        //run controller + method, send params if exist

        call_user_func_array([$this->controller, $this->method], $this->params);



    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            //hapus karakter terakhis
            $url = rtrim($_GET['url'], '/');
            //filter url dari karakter lain
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
