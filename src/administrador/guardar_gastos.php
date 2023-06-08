<?php
include('../../conexionBDD.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoGasto = $_POST["tipo_gasto"];
    $valorGasto = $_POST["valor_gasto"];
    $fechaGasto = date("m/Y");
    $edificioId = $_POST["edificio"];
/*
    echo "Tipo de Gasto: " . $tipoGasto . "<br>";
    echo "Valor de Gasto: " . $valorGasto . "<br>";
    echo "Fecha de Gasto: " . $fechaGasto . "<br>";
    echo "ID del Edificio: " . $edificioId . "<br>";
*/
  // Obtener el último Gasto_Id de la tabla VF_Gastos
    $consulta_cantidad_gastos = "SELECT COUNT(*) AS cantidad_gastos FROM vf_gastos";
    $resultado_cantidad_gastos = $bdd->query($consulta_cantidad_gastos);
    $fila_cantidad_gastos = $resultado_cantidad_gastos->fetch_assoc();
    $cantidad_gastos = $fila_cantidad_gastos['cantidad_gastos'];
    $gastosId = $cantidad_gastos + 1;


// Consulta SQL para obtener los Dept_Id que cumplan con los criterios
$sql = "SELECT Dept_Id FROM vf_deptos WHERE Edif_Num_Id = 1 AND Dept_Habilitado = 1";

// Ejecutar la consulta y obtener el resultado
$result =query($sql);

// Verificar si se encontraron registros
if ($result->num_rows > 0) {
    // Recorrer los registros encontrados
    while ($row = $result->fetch_assoc()) {
        // Acceder al valor de Dept_Id en cada registro
        $deptId = $row["Dept_Id"];
        
        // Hacer algo con el Dept_Id, por ejemplo, imprimirlo
        echo "Dept_Id: " . $deptId . "<br>";
    }
} else {
    echo "No se encontraron registros que cumplan los criterios.";
}

}
?>