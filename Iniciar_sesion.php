<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rut = $_POST["rut"];
    $password = $_POST["password"];

    // Realizar la conexión a la base de datos
    include('./conexionBDD.php');

    // Escapar los valores ingresados para evitar inyección de SQL
    $rut = $bdd->real_escape_string($rut);
    $password = $bdd->real_escape_string($password);

    // Consulta SQL para verificar el Rut y la contraseña en la tabla vf_users
    $sql = "SELECT * FROM vf_users WHERE User_Rut = '$rut' AND User_Password = '$password'";
    $result = $bdd->query($sql);

    // Verificar si se encontraron registros
    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $usuario = $result->fetch_assoc();

        // Guardar los datos en variables individuales
        $userPerfil = $usuario["User_Perfil_Id"];
        $userNombre = $usuario["User_Nombre"];
        $UserDepto  = $usuario["User_Depto_Id"];
        // Continúa con el resto de los campos del usuario

        // Redirigir a la página 2.0 y pasar los datos como parámetros
        header("Location: ./src/administrador/template/cabecera.php?userPerfil=$userPerfil&userNombre=$userNombre&UserDepto=$UserDepto");
        exit;
    }

    // Cerrar la conexión a la base de datos
    $bdd->close();
}
?>
