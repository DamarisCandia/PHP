<?php
$bddHost = 'localhost';
$bddUser = 'Damaris';
$bddPassword = 'pass';
$bddName = 'phpBDD';

$bdd = new mysqli($bddHost, $bddUser, $bddPassword, $bddName);

if($bdd->connect_error){
    die("Error al conectar con la BDD: " .$bdd->connect_error);
}