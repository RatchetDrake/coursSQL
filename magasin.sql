/*Créer une base de donnée qui ce nomme magasin 
et qui posséde trois table

Une table client avec 6 colonne
id int 
prenom string
nom string
email string
ville string
password string
Id est primaire en incrémentation automatique

Une table commande avec 5 colonnes
id int
client id int
date_achat date
reference string
cache prix total nombre à virgule
Id est primaire en incrémentation automatique

Une table produit avec 4 colonnes
id int
nom string
quantité nombre à virgule
prix nombre à virgule
Id est primaire en incrémentation automatique

 
 
 */

-- Création de la base de données "magasin"
CREATE DATABASE magasin;

-- Utilisation de la base de données "magasin"
USE magasin;

-- Création de la table "client"
CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    email VARCHAR(255),
    ville VARCHAR(255),
    password VARCHAR(255)
);

-- Création de la table "commande"
CREATE TABLE commande (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    date_achat DATE,
    reference VARCHAR(255),
    prix_total DECIMAL(10, 2),
    FOREIGN KEY (client_id) REFERENCES client(id)
);

-- Création de la table "produit"
CREATE TABLE produit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    quantite DECIMAL(10, 2),
    prix DECIMAL(10, 2)
);
