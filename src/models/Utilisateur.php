<?php

namespace App\Models;

use PDO;

final class Utilisateur extends Db {

    private PDO $pdo;

    public function __construct()
    {
        parent::__construct();
        $this->pdo = $this->getPDO();
    }

    public function getUsers(){
        $query = $this->pdo->prepare("SELECT * FROM Utilisateur");
        $query->execute();

        return $query->fetchAll(); 
    }

    public function addUser($nom, $prenom, $email, $password){
        $query = $this->pdo->prepare("INSERT INTO Utilisateur (nom, prenom, email, mot_de_passe) VALUES (:n, :p, :e,:m)");
        $query->execute([
            "n" => $nom,
            "p" => $prenom,
            "e" => $email,
            "m" => $password
        ]);

        return true;
    }
}