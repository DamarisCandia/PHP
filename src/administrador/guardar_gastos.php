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
    $nuevo_id = $cantidad_gastos + 1;



    // Obtener todos los departamentos del edificio seleccionado
    $queryDepartamentos = $bdd->prepare("SELECT Dept_Num FROM vf_deptos WHERE Edif_Num_Id = ? AND Dept_Habilitado = 1");
    

    $queryDepartamentos->bind_param("i", $edificioId);
    $queryDepartamentos->execute();
    $resultDepartamentos = $queryDepartamentos->get_result();

    if ($resultDepartamentos->num_rows > 0) {
        $gastoEstadoId = 2; // Asignar el estado de gasto correspondiente

        // Insertar el gasto en la tabla VF_Gastos
        $insertGasto = $bdd->prepare("INSERT INTO VF_Gastos (Gasto_Id, Gasto_Nombre, Gasto_Valor, Gasto_Fecha, Gasto_Estado_Id, Dept_Num_Id) VALUES (?, ?, ?, ?, ?, ?)");
        $insertGasto->bind_param("isssii", $nuevo_id, $tipoGasto, $valorGasto, $fechaGasto, $gastoEstadoId, $deptNumId);

            $deptNumId = $resultDepartamentos->fetch_assoc()["Dept_Num"];
            $insertGasto->execute();

        $queryDepartamentos->close();
        $insertGasto->close();
        echo "El gasto se ha registrado para todos los departamentos del edificio seleccionado.";
    } else {
        echo "No se encontraron departamentos habilitados para el edificio seleccionado.";
    }
} else {
    echo "No se recibieron los datos del formulario correctamente.";

}
?>
