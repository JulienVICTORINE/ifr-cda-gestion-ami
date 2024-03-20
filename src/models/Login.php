<?php

namespace App\Models;

use PDO;

final class Login extends Db {
    private PDO $pdo;

    public function __construct()
    {
        parent::__construct();
        $this->pdo = $this->getPDO();
    }

    public function login($email, $password) {

        $query = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE email = :e");
        $query->execute([
            "e" => $email
        ]);

        $user = $query->fetch();
        
        if($user) {
            if(password_verify($password, $user['mot_de_passe'])){
                $_SESSION['user'] = $user;
                return true;
            }
        }

        return false;
    }
}