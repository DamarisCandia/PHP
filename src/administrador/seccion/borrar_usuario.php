<?php
include('../../../conexionBDD.php');

// Obtén el ID del usuario enviado a través de la petición POST
$userId = $_POST['id'];


// Ejemplo de cómo podrías obtener los datos del usuario
$query = $bdd->prepare("DELETE
FROM phpbdd.vf_users
WHERE User_Id  = ?");
$query->bind_param("i", $userId);
$query->execute();
$result = $query->get_result();
?>
