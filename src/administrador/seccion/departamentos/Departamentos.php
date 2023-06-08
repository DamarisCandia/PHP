<?php 
    include('../../../../conexionBDD.php');
?>


    <div class="text-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Asignar_Usuario">
            Agregar
        </button>
    </div>
    

<?php 
    include("./Tabla_Departamentos.php");
?>
    


<div class="modal fade" id="Asignar_Usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar Departamento a Nuevo Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../guardar_usuario.php" method="POST">
                    <div class="row offset-md-3">
                        <div class="col-2 col-sm-3">
                            <span id="basic-addon1">Nombre</span>
                        </div>
                        <div class="col col-sm-8">
                            <input type="text" class="form-control" name="nombre_usuario" placeholder="Ingrese nombre" aria-label="Nombre del usuario" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="w-100 mb-3"></div>

                        <div class="col-2 col-sm-3">
                            <span id="basic-addon2">Correo</span>
                        </div>
                        <div class="col col-sm-8">
                            <input type="text" class="form-control" name="correo_usuario" placeholder="Ingrese correo" aria-label="Correo del usuario" aria-describedby="basic-addon2" required>
                        </div>

                        <div class="w-100 mb-3"></div>

                        <div class="col-2 col-sm-3">
                            <span id="basic-addon3">Telefono</span>
                        </div>
                        <div class="col col-sm-8">
                            <input type="number" class="form-control" name="numero_usuario" placeholder="Ingrese numero" aria-label="Numero del usuario" aria-describedby="basic-addon3" required>
                        </div>

                        <div class="w-100 mb-3"></div>

                        <div class="col-2 col-sm-3">
                            <span id="basic-addon4">Edificio</span>
                        </div>
                        <div class="col col-sm-8">
                            <select class="form-select" name="edificio" id="edificio" required>
                                <option value="" selected></option> <!-- Opción vacía -->
                                <?php
                                $query = $bdd->query("SELECT Edif_id, Edificio_Nombre FROM VF_Edificios");
                                if ($query->num_rows > 0) {
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<option value='" . $row["Edif_id"] . "'>" . $row["Edificio_Nombre"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="w-100 mb-3"></div>

                        <div class="col-2 col-sm-3">
                            <span id="basic-addon5">Depto N°</span>
                        </div>
                        <div class="col col-sm-8">
                            <div id="depto_numero"></div>
                        </div>

                        <div class="offset-md-5">
                            <input type="submit" value="Guardar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
