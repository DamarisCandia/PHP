<?php
    include('../../../conexionBDD.php');
    
    // Obtener los valores del formulario
    $nombre = $_POST['nombre_usuario'];
    $correo = $_POST['correo_usuario'];
    $pass = $_POST['password_usuario'];
    $numero = $_POST['numero_usuario'];
    $rut = $_POST['rut_usuario'];
    $depto = $_POST['depto_usuario'];
    
    
    $consulta_cantidad_usuarios = "SELECT COUNT(*) AS cantidad_usuarios FROM vf_users";
    $resultado_cantidad_usuarios = $bdd->query($consulta_cantidad_usuarios);
    $fila_cantidad_usuarios = $resultado_cantidad_usuarios->fetch_assoc();
    $cantidad_usuarios = $fila_cantidad_usuarios['cantidad_usuarios'];

    $nuevo_id = $cantidad_usuarios + 1;

    $password = $pass;
    //$password = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);

    //$nuevo id + todos los Gastos_id + Gastos_Estado_id = 2 + mes + año

    $query = $bdd->query("SELECT Gasto_Id FROM vf_gastos");

    $mesActual = date('m');
    $mesFormateado = sprintf("%02d", $mesActual);
    $year = date("Y");

    if ($query->num_rows > 0) {
        while ($row_data = $query->fetch_assoc()) {
            $id_gasto = $row_data["Gasto_Id"];
            $insertQuery = "INSERT INTO vf_pago_gastos(User_id, Gasto_id, Gasto_Estado_id, mes, year)  VALUES ('$nuevo_id', '$id_gasto', '$mesFormateado', '$year')";
        }
    }

    // Consulta para insertar el nuevo usuario en la tabla
    $insertQuery = "INSERT INTO vf_users(User_Id, User_Nombre, User_correo, User_Password, User_Fono, User_Rut, User_Perfil_Id, User_Depto_Id, User_Habilitado) VALUES ('$nuevo_id', '$nombre', '$correo', '$password', '$numero', '$rut', '2', '$depto', '1')";

    // Ejecutar la consulta
    if ($bdd->query($insertQuery) === TRUE) {

        //echo "Usuario agregado correctamente.";
        
        $updateQuery = "UPDATE vf_deptos SET Dept_Habilitado = '1' WHERE Dept_Id = '$depto'";
        if ($bdd->query($updateQuery) === TRUE) {
            //echo "Estado del departamento actualizado correctamente.";
            echo "<script> location.href = '../seccion/Usuarios.php' </script>";
        } else {
            //echo "Error al actualizar el estado del departamento: " . $bdd->error;
            
        }
    } else {
        echo "Error al agregar usuario: " . $bdd->error;
    }
    
    // Cerrar la conexión
    $bdd->close();
?>