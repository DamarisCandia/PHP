<?php
$bddHost ='localhost:3307';
$bddUser = 'admin';
$bddPassword = 'admin';
$bddName = 'phpbdd';

$bdd = new mysqli($bddHost, $bddUser, $bddPassword, $bddName);

if($bdd -> connect_error){
    die("error al conectar" .$bdd->connect_error);
}