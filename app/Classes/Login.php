<?php

namespace app\Classes;

use app\Infrastructure\InMemoryRepository;
use app\Models\User;
use app\Models\UserRepository;

class Login 
{
    
    public function login($email, $senha)
    {
        $user = new InMemoryRepository;
        
       
        $userFound = $user->findByEmail("email",$email);
        var_dump($userFound);
        die;
        if (!$userFound) {
            return false;
        }
        if(password_verify($senha, $userFound["senha"])) {
            $_SESSION['user_data_logged'] = $userFound;
            $_SESSION['is_logged'] = true;
            return true;
        }
        return false;
    }

    public function logout()
    {
        unset($_SESSION['user_data_logged'], $_SESSION['is_logged']);

        return true;
    }
}