<?php
include('../../../conexionBDD.php');



$userId = $_POST['userId'];
$gastoId = $_POST['gastoId'];
$mes = $_POST['mes'];
$year = $_POST['year'];

$query = $bdd->prepare("UPDATE phpbdd.vf_pago_gastos t
SET t.Gasto_Estado_id = 1
WHERE t.User_id = ?
  AND t.Gasto_id = ?
  AND t.mes = ?
  AND t.year = ?;
");
$query->bind_param("iiii", $userId,$gastoId,$mes,$year);
$query->execute();
$result = $query->get_result();

?>
