<?php

require_once("../projetF/connexion.php");
    $Req= "CREATE TABLE IF NOT EXISTS jeux (
            id_produit INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            categorie VARCHAR(20) NOT NULL ,
            nom VARCHAR(20) NOT NULL,
            description TEXT NOT NULL ,
            type VARCHAR(5) NOT NULL ,
            photo VARCHAR(250) NOT NULL ,
            prix INT(3) NOT NULL ,
            stock INT(3) NOT NULL )";
 $conn->query($Req);

        $Req= "CREATE TABLE IF NOT EXISTS admin (
            id INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            username VARCHAR(20) NOT NULL ,
            password VARCHAR(20) NOT NULL );";
 $conn->query($Req);
        $Req="CREATE TABLE IF NOT EXISTS user (
            id INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            pseudo VARCHAR(20) NOT NULL ,
            password VARCHAR(20) NOT NULL,
            nom VARCHAR(20) NOT NULL,
            prenom VARCHAR(20) NOT NULL,
            email VARCHAR(20) NOT NULL,
            adresse VARCHAR(50) NOT NULL,
            ville VARCHAR(20) NOT NULL,
            cp VARCHAR(20) NOT NULL);";
 $conn->query($Req);


 $Req="CREATE TABLE IF NOT EXISTS cartpay (
    id INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    numberC VARCHAR(20) NOT NULL ,
    nomC VARCHAR(20) NOT NULL,
    mois ENUM('01','02','03','04','05','06','07','08','09','10','11','12') NOT NULL,
    annee ENUM('2021','2022','2023','2024','2025','2026','2027','2028','2029','2030') NOT NULL,
    cvv VARCHAR(20) NOT NULL)";
$conn->query($Req);


$Req= "CREATE TABLE IF NOT EXISTS  commande (
    id_commande INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_membre INT(3) NULL DEFAULT NULL,
    montant INT(3) NOT NULL,
    date_enregistrement DATETIME NOT NULL,
    etat ENUM('en cours de traitement', 'envoyé', 'livré') NOT NULL
) ";
$conn->query($Req);


$Req= "CREATE TABLE IF NOT EXISTS  details_commande (
id_details_commande INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_commande INT(3) NULL DEFAULT NULL,
id_produit INT(3) NULL DEFAULT NULL,
quantite INT(3) NOT NULL,
prix INT(3) NOT NULL
)";
$conn->query($Req);


       
?>