<?php
include('../../../conexionBDD.php');

// Obtén el ID del usuario enviado a través de la petición POST
$userId = $_POST['id'];

// Aquí deberías realizar una consulta a la base de datos para obtener los detalles del usuario con el ID proporcionado
// Puedes usar el mismo código que tienes en tu archivo principal para realizar la consulta y obtener los datos necesarios

// Ejemplo de cómo podrías obtener los datos del usuario
$query = $bdd->prepare("SELECT * FROM vf_users WHERE User_Id = ?");
$query->bind_param("i", $userId);
$query->execute();
$result = $query->get_result();

// Verifica si se encontró un usuario con el ID especificado
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Aquí puedes imprimir los datos del usuario en el formulario
    // Puedes utilizar el mismo código HTML y los mismos nombres de campo que tienes en el formulario de edición en el archivo principal

    // Ejemplo:
    ?>
    <div class="row offset-md-3">
        <form action="Guardar_edicion_usuario.php" method="POST">
            <div class="row offset-md-3">
                <div class="col-2 col-sm-3">
                    <span id="basic-addon0">Id</span>
                </div>
                <div class="col col-sm-8">
                    <input type="text" class="form-control" name="id_usuario" placeholder="Ingrese ID" aria-label="ID del usuario" aria-describedby="basic-addon0" required value="<?php echo $row['User_Id']; ?>" disabled>
                </div>

                <div class="w-100 mb-3"></div>

                <div class="col-2 col-sm-3">
                    <span id="basic-addon1">Nombre</span>
                </div>
                <div class="col col-sm-8">
                    <input type="text" class="form-control" name="nombre_usuario" placeholder="Ingrese nombre" aria-label="Nombre del usuario" aria-describedby="basic-addon1" required value="<?php echo $row['User_Nombre']; ?>">
                </div>

                <div class="w-100 mb-3"></div>

                <div class="col-2 col-sm-3">
                    <span id="basic-addon2">Correo</span>
                </div>
                <div class="col col-sm-8">
                    <input type="text" class="form-control" name="correo_usuario" placeholder="Ingrese correo" aria-label="Correo del usuario" aria-describedby="basic-addon2" required value="<?php echo $row['User_correo']; ?>">
                </div>

                <div class="w-100 mb-3"></div>

                <div class="col-2 col-sm-3">
                    <span id="basic-addon3">Teléfono</span>
                </div>
                <div class="col col-sm-8">
                    <input type="text" class="form-control" name="fono_usuario" placeholder="Ingrese teléfono" aria-label="Teléfono del usuario" aria-describedby="basic-addon3" required value="<?php echo $row['User_Fono']; ?>">
                </div>

                <div class="w-100 mb-3"></div>

                <div class="col-2 col-sm-3">
                    <span id="basic-addon5">Estado</span>
                </div>
                <div class="col col-sm-8">
                    <input type="text" class="form-control" name="estado_usuario" placeholder="Ingrese estado" aria-label="Estado del usuario" aria-describedby="basic-addon5" required value="<?php echo $row['User_Habilitado']; ?>">
                </div>

                <div class="w-100 mb-3"></div>
                <div class="offset-md-5">
                    <input type="submit" value="Guardar">
                </div>
            </div>
        </form>
    </div>
    <?php
} else {
    echo "No se encontró ningún usuario con el ID especificado.";
}
?>
