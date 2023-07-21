<?php 
    include('../../../conexionBDD.php');
?>

<!-- Agrega el siguiente código para mostrar la ventana modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="userDetails">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div class="container" id="tabla_usuarios">
    <table class="table table-striped table-hover table-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Fono</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = $bdd->query("SELECT * FROM vf_users");
                $cont = 0;
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $cont++;
            ?>
            <tr>
                <th scope="row"><?php echo $row["User_Id"] ?></th>
                <td><?php echo $row["User_Nombre"] ?></td>
                <td><?php echo $row["User_correo"] ?></td>
                <td><?php echo $row["User_Fono"] ?></td>
                <td><?php echo $row["User_Habilitado"] ?></td>
                <td>
                    <button class="btn btn-success edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo $row['User_Id']; ?>"><i class="bi bi-pen"></i></button>
                    <button class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo $row['User_Id']; ?>"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            <?php }
                } else { ?>
            <tr>
                <td colspan="6">
                    <div class="alert alert-warning" role="alert">
                        No hay usuarios!
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <div class="alert alert-warning" role="alert">
        Hay <?php echo $cont ?> usuarios!
    </div>
</div>

<script>
    $(document).ready(function() {
        // Captura el evento de clic en el botón de editar
        $('.edit-btn').on('click', function() {
            var userId = $(this).data('id');
            // Realiza una petición AJAX para obtener los detalles del usuario
            $.ajax({
                url: 'obtener_datos_usuario.php',
                method: 'POST',
                data: { id: userId },
                success: function(response) {
                    $('#userDetails').html(response);
                }
            });
        });

        $('.delete-btn').on('click', function() {
            var userId = $(this).data('id');
            // Realiza una petición AJAX para obtener los detalles del usuario
            $.ajax({
                url: 'borrar_usuario.php',
                method: 'POST',
                data: { id: userId },
                success: function(response) {
                    alert("El usuario fue borrado exitosamente.");
                    location.reload();
                }
            });
        });
    });
</script>
