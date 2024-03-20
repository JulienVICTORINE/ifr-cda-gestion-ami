CREATE DATABASE IF NOT EXISTS cda_gestion_ami;

USE cda_gestion_ami;

CREATE TABLE Utilisateur (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe TEXT NOT NULL
);


Create TABLE Ami(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id int NOT NULL,
    utilisateur2_id int NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(id),
    FOREIGN KEY (utilisateur2_id) REFERENCES Utilisateur(id)
);

CREATE TABLE Demande_ami(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    expediteur_id int NOT NULL,
    destinateur_id int NOT NULL,
    statut VARCHAR(255) NOT NULL,
    FOREIGN KEY (expediteur_id) REFERENCES Utilisateur(id),
    FOREIGN KEY (destinateur_id) REFERENCES Utilisateur(id)
);

INSERT INTO Utilisateur(nom, prenom, email, mot_de_passe) VALUES 
    ("test", "test", "test@test.com", "$2y$10$wD1xbQi1.LaO9/UFnuiFK.kAayEvK8Q6VjNN2EvWQ0OT7N0ValFqO"),
    ("test2", "test2", "test2@test.com", "$2y$10$wD1xbQi1.LaO9/UFnuiFK.kAayEvK8Q6VjNN2EvWQ0OT7N0ValFqO"),
    ("test3", "test3", "test3@test.com", "$2y$10$wD1xbQi1.LaO9/UFnuiFK.kAayEvK8Q6VjNN2EvWQ0OT7N0ValFqO");