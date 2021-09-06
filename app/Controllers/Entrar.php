<?php

namespace app\Controllers;
use app\Classes\Login;

class Entrar
{
    private $login;
    public function __construct(){
        $this->login = new Login;
    }
    public function index(){

    }

    public function store($request, $response)
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        
       $is_logged = $this->login->login($email, $senha);

       if($is_logged){
           return $response->withHeader('Location', '/');
       }
       return $response->withHeader('Location', '/login');
    }
}