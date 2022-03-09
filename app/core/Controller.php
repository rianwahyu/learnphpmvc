<?php


//main class semua controller
class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}
