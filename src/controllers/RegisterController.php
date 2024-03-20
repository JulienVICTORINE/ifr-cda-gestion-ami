
<?php

namespace App\Controllers;

use App\Controllers\Main\AbstractController;
use App\Models\Utilisateur;

final class RegisterController extends AbstractController {
    
    public function register(){

    $errors = false;

        if(isset($_POST["email"]) && 
        isset($_POST["password"]) &&
        !empty($_POST['email']) && 
        !empty($_POST['password']) && 
        isset($_POST['nom']) && 
        !empty($_POST['nom']) && 
        isset($_POST['prenom']) &&
        !empty($_POST['prenom'])) {
        // On fait des choses

        $userModel = new Utilisateur;

        $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $userModel->addUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $passwordHash);

        return $this->redirection("?page=login");
    }

    $this->render("register/registe", [
        "errors" => $errors
    ]);
    }
}
