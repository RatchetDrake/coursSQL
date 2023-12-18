/*Créer une base de donnée qui ce nomme magasin et qui posséde trois table

client avec 6 colonne
id int
prenom string
nom string
email string
ville string
password string
 */


 -- Création de la base de données
CREATE DATABASE IF NOT EXISTS magasin;

-- Utilisation de la base de données
USE magasin;

-- Création de la table "client"
CREATE TABLE IF NOT EXISTS client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    email VARCHAR(255),
    ville VARCHAR(255),
    password VARCHAR(255)
);

INSERT INTO client (prenom, nom, email, ville, password) VALUES 
('Bernard', 'Lermitte', 'lermitte@null', 'null', 'bernardo'), 
('Clautide', 'Lafond', 'clauclau@null', 'null', 'clau1234');

-- Création de la table "commande"
CREATE TABLE IF NOT EXISTS commande (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    client_id INT(11) NOT NULL,
    date_achat DATETIME NOT NULL,
    reference VARCHAR(255) NOT NULL,
    prix_total FLOAT NOT NULL,
    CONSTRAINT ClientExist FOREIGN KEY (client_id) REFERENCES client (id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

INSERT INTO commande (client_id, date_achat, reference, prix_total) VALUES
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100),
(1, '2023-12-12 10:10:10', '001471', 100);

-- Création de la table "produit"
CREATE TABLE IF NOT EXISTS produit (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    quantite INT(11) NOT NULL,
    prix FLOAT NOT NULL
);

INSERT INTO produit (nom, quantite, prix) VALUES 
('Pomme', 10, 50),
('Casse Noisette', 100, 100),
('Noisette', 1000, 2);
