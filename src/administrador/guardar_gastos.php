<?php 
    include('conexionBDD.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tipoGasto = $_POST["tipo_gasto"];
        $valorGasto = $_POST["valor_gasto"];
        $fechaGasto = $_POST["fecha_gasto"];
        $edificioId = $_POST["edificio"];

        // Obtener el último Gasto_Id de la tabla VF_Gastos
        $queryGastosId = $bdd->query("SELECT Gasto_Id FROM VF_Gastos ORDER BY Gasto_Id DESC LIMIT 1");
        if ($queryGastosId->num_rows > 0) {
            $rowGastosId = $queryGastosId->fetch_assoc();
            $gastosId = $rowGastosId["Gasto_Id"] + 1;
        } else {
            $gastosId = 1;
        }

        // Obtener todos los departamentos del edificio seleccionado
        $queryDepartamentos = $bdd->prepare("SELECT Dept_Num_Id FROM VF_Departamentos WHERE Edif_Id = ? and ");
        $queryDepartamentos->bind_param("i", $edificioId);
        $queryDepartamentos->execute();
        $resultDepartamentos = $queryDepartamentos->get_result();

        if ($resultDepartamentos->num_rows > 0) {
            $gastoEstadoId = 1; // Asignar el estado de gasto correspondiente

            // Insertar el gasto en la tabla VF_Gastos
            $insertGasto = $bdd->prepare("INSERT INTO VF_Gastos (Gasto_Id, Gasto_Nombre, Gasto_Valor, Gasto_Fecha, Gasto_Estado_Id, Dept_Num_Id) VALUES (?, ?, ?, ?, ?, ?)");
            $insertGasto->bind_param("isdisi", $gastosId, $tipoGasto, $valorGasto, $fechaGasto, $gastoEstadoId, $deptNumId);

            while ($rowDepartamento = $resultDepartamentos->fetch_assoc()) {
                $deptNumId = $rowDepartamento["Dept_Num_Id"];
                $insertGasto->execute();
            }
            $queryDepartamentos->close();
            $insertGasto->close();
            echo "El gasto se ha registrado para todos los departamentos del edificio seleccionado.";
        } else {
            echo "No se encontraron departamentos para el edificio seleccionado.";
        }
    } else {
        echo "No se recibieron los datos del formulario correctamente.";
    }
?>
