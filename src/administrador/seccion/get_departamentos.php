<?php
include('../../../../conexionBDD.php');

$edificioId = $_GET["edificioId"]; // Obtener el ID del edificio seleccionado

// Consulta para obtener los departamentos con Dept_Habilitado = 0 y Edif_Num_Id = $edificioId
$queryDepartamentos = $bdd->prepare("SELECT Dept_Num FROM vf_deptos WHERE Dept_Habilitado = 0 AND Edif_Num_Id = ?");
$queryDepartamentos->bind_param("i", $edificioId);
$queryDepartamentos->execute();
$resultDepartamentos = $queryDepartamentos->get_result();

if ($resultDepartamentos->num_rows > 0) {
    while ($rowDepartamento = $resultDepartamentos->fetch_assoc()) {
        echo "<option value='" . $rowDepartamento["Dept_Num"] . "'>" . $rowDepartamento["Dept_Num"] . "</option>";
    }
} else {
    echo "<option value=''>No se encontraron departamentos disponibles</option>";
}

$queryDepartamentos->close();
?>