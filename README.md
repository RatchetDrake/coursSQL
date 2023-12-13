SQL est un language de base de donnée principalement

Méthode CRUD 

INSERT INTO ( Create )
SELECT ( READ )
UPDATE ( UPDATE )
DELETE ( DELETE )

## Créer une bade de donnée si elle n'existe pas
CREATE DATABASE IF NOT EXISTS
CREATE DATABASE "BaseDeDonnee"; Une base de donnée c'est une base qui va stocké des données donc des tables

USE BaseDeDonnee; Permet de dire que j'utilise la base de donnée BaseDeDonee 
CREATE TABLE "table" (
    NomColonne1 type_donnee,
    colonne2 type_donnee,
    colonne3 type_donnee
);
## Créer une table si elle n'existe pas
CREATE TABLE IF NOT EXISTS 

Exemple concret

CREATE TABLE utilisateur (
    id INT PRIMARY KEY NOT NULL,
    nom VARCHAR(100),
    prenom VARCHAR(255)
);


###### PRIMARY KEY 
Défini la colonne en tant que clé primaire
c'est à dire défini la colonne comme un token

###### NOT NULL 
La colonne n'aurai jamais de valeur null 

###### Type Données

INT, BIGINT, TINYINT (entier)
FLOAT, DOUBLE (nombre à virgule)
VARCHAR, TEXT, LONGTEXT, TINYTEXT, ect... (Chaine de caractère)
DATETIME (La date et l'heure)
DATE (La date)
BOOLEAN (true, false)
ENUM (Choix variable défini)

ALTER TABLE nomTable 
## J'ajoute une clé primaire
    ADD PRIMARY KEY ('nomColonne'), 
## J'ajoute une colonne
    ADD nomColonneChien VARCHAR(100)
## Je retire une colonne
    DROP nomColonne 
## Je modifie une colonne
    MODIFY nomColoneChien VARCHAR(200) 
;
Alter table permet de modifier une colonne de la table défini dans mon cas juste au dessus je défini la colonne nomColonne comme clé primaire


