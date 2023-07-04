<?php
include('../../../conexionBDD.php');

// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos enviados desde el formulario de edición
    $userId     = $_POST['id_usuario'];
    $nombre     = $_POST['nombre_usuario'];
    $correo     = $_POST['correo_usuario'];
    $telefono   = $_POST['fono_usuario'];
    $depto      = $_POST['depto_id'];
    $estado     = $_POST['estado_usuario'];

    // Actualiza los datos del usuario en la base de datos
    $actualizar = "UPDATE vf_users SET User_Nombre      = '$nombre', 
                                        User_correo     = '$correo', 
                                        User_Fono       = '$telefono', 
                                        User_Depto_Id   = '$depto', 
                                        User_Habilitado = '$estado' 
                    WHERE User_Id = $userId";
    $query_actualizar = $bdd->query($actualizar);

    //$query = $bdd->prepare("UPDATE vf_users SET User_Nombre = ?, User_correo = ?, User_Fono = ?, User_Depto_Id = ?, User_Habilitado = ? WHERE User_Id = ?");
    //$query->bind_param("ssssi", $nombre, $correo, $telefono, $depto, $estado, $userId);
    //$query->execute();

    // Verifica si la consulta se ejecutó correctamente
    if ($query_actualizar) {
        echo "Los datos del usuario se han guardado exitosamente.";
        
        // Redirige a la página anterior
        header("Location: Usuarios.php");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo "Hubo un error al guardar los datos del usuario.";
    }
} else {
    echo "No se ha enviado ningún formulario.";
}
?>
