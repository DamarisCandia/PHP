<?php
include 'conexionBDD.php';

if(isset($_POST['submit'])){
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];

    // Validación de los campos
    if(empty($tipo)){
        $error = "Por favor ingrese el tipo de gasto";
    } elseif(empty($valor)){
        $error = "Por favor ingrese el valor del gasto";
    } else {
        // Insertar el nuevo gasto en la base de datos
        $query = "INSERT INTO gastos (tipo, valor) VALUES ('$tipo', '$valor')";
        if($bdd->query($query) === TRUE){
            $mensaje = "El gasto ha sido ingresado correctamente";
        } else {
            $error = "Error al ingresar el gasto: " . $bdd->error;
        }
    }
}

// Redireccionar al formulario de ingreso de gastos
header("Location: ingresar_gasto_form.php");
exit;
?>
