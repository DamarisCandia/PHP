<?php 
    include('../../../../conexionBDD.php');
?>

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
                <td> <?php echo $row["User_Nombre"] ?></td>
                <td> <?php echo $row["User_correo"] ?></td>
                <td> <?php echo $row["User_Fono"] ?></td>
                <td> <?php echo $row["User_Habilitado"] ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['id_perro']; ?>" class="btn btn-success"><i class="bi bi-pen"></i></a>
                    <a href="eliminar.php?id=<?php echo $row['id_perro']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                </td>

            </tr>
        </tbody>
        <?php }
        
        } else {
        ?>
        <div class="alert alert-warning" role="alert">
            No hay usuarios!
        </div>
            
        <?php } ?>
        <div class="alert alert-warning" role="alert">
            Hay <?php echo $cont ?> usuarios!
        </div>
    </table>

</div>