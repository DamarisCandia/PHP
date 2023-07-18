<?php
$bddHost = 'localhost';
$bddUser = 'Damaris';
$bddPassword = 'pass';
$bddName = 'phpbdd';

$bdd = new mysqli($bddHost, $bddUser, $bddPassword, $bddName);

if($bdd -> connect_error){
    die("error al conectar" .$bdd->connect_error);
}