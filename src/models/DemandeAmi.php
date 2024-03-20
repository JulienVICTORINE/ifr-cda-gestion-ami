<?php

namespace App\Models;

use PDO;

final class DemandeAmi extends Db {

    private PDO $pdo;

    public function __construct()
    {
        parent::__construct();
        $this->pdo = $this->getPDO();
    }

    public function myRequestFriend($expediteur) {
        $query = $this->pdo->prepare("SELECT u.id, u.nom, u.prenom
        FROM Demande_ami d
        INNER JOIN Utilisateur u ON d.destinateur_id = u.id
        WHERE d.expediteur_id = :e");

        $query->execute([
            "e" => $expediteur
        ]);

        return $query->fetchAll();
    }


    public function myRequestFriendReceived($expediteur) {
        $query = $this->pdo->prepare("SELECT u.id, u.nom, u.prenom
        FROM Demande_ami d
        INNER JOIN Utilisateur u ON d.expediteur_id = u.id
        WHERE d.destinateur_id = :e");

        $query->execute([
            "e" => $expediteur
        ]);

        return $query->fetchAll();
    }

    public function sendRequestFriend($expediteur, $destinataire) {

        $query = $this->pdo->prepare("INSERT INTO Demande_ami (expediteur_id, destinateur_id, statut) 
        VALUES (:e, :d, 'En attente')");

        $query->execute([
            "e" => $expediteur,
            "d" => $destinataire
        ]);

        return true;
    }

    public function removeMyRequestFriends($expediteur, $destinataire) {

        $query = $this->pdo->prepare("DELETE FROM Demande_ami 
        WHERE expediteur_id = :e AND destinateur_id = :d");

        $query->execute([
            "e" => $expediteur,
            "d" => $destinataire
        ]);

        return true;
    }

    public function acceptRequestFriend($expediteur, $destinataire) {

  
        // On supprime de la liste en haut
        $this->removeMyRequestFriends($destinataire, $expediteur);

        // On ajoute pour les deux utilisateurs
        // On ajoute côté expéditeur
        $query = $this->pdo->prepare("INSERT INTO Ami (utilisateur_id, utilisateur2_id) VALUES (:e, :d)");
        $query->execute([
            "e" => $expediteur,
            "d" => $destinataire
        ]);

        // On ajoute côté destinataire
        $query = $this->pdo->prepare("INSERT INTO Ami (utilisateur_id, utilisateur2_id) VALUES (:d, :e)");
        $query->execute([
            "e" => $expediteur,
            "d" => $destinataire
        ]);

        return true;
    }

}