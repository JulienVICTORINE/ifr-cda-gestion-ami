<?php

namespace App\Models;

use PDO;

final class Ami extends Db {
    private PDO $pdo;

    public function __construct()
    {
        parent::__construct();
        $this->pdo = $this->getPDO();
    }

    public function notMyFriends(){

        $query = $this->pdo->prepare("SELECT u.id, u.nom, u.prenom
        FROM Utilisateur u
        WHERE u.id <> :id
          AND u.id NOT IN (
            SELECT utilisateur2_id FROM Ami WHERE utilisateur_id = :id
          )
          AND u.id NOT IN (
            SELECT destinateur_id FROM Demande_ami WHERE expediteur_id = :id
          )");

        $query->execute([
            "id" => $_SESSION['user']['id']
        ]);

        return $query->fetchAll();
    }

    public function myFriends(){

        $query = $this->pdo->prepare("SELECT u.id, u.nom, u.prenom
            FROM Utilisateur u
            INNER JOIN Ami a ON (u.id = a.utilisateur2_id AND a.utilisateur_id = :id)");


            $query->execute([
                "id" => $_SESSION['user']['id']
            ]);

            return $query->fetchAll();
    }

}