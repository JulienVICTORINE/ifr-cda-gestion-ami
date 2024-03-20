<?php

namespace App\Controllers;

use App\Controllers\Main\AbstractController;
use App\Models\Login;

final class LoginController extends AbstractController {

    public function login(){

        if(isset($_POST["email"]) && 
            isset($_POST["password"]) &&
            !empty($_POST['email']) && 
            !empty($_POST['password'])) {
            if((new Login)->login($_POST['email'],$_POST['password'])) {
                return $this->redirection('/');
            }
            // On fait des choses
        }
        return $this->render("auth/login", []);
    }
}