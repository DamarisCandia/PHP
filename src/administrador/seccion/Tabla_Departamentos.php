<style>
 .ocupado {
    color: red;
}

.disponible {
    color: green;
}
</style>

<?php
include('../../../conexionBDD.php');

// Obtener el nombre del edificio seleccionado (si se ha enviado)
$nombreEdificio = isset($_POST['nombre_edificio']) ? $_POST['nombre_edificio'] : '';

// Consulta para obtener la lista de nombres de edificio
$edificiosQuery = "SELECT DISTINCT Edificio_Nombre FROM vf_edificios";
$edificiosResult = $bdd->query($edificiosQuery);
?>

<div class="container" id="tabla_usuarios">

        <!-- Agregar el formulario de filtro -->
        <form method="POST" action="">
            <div class="form-group row mb-3">
                <div class="col">
                <strong>Filtrar por nombre de edificio:</strong>
                <select class="form-control" name="nombre_edificio" id="nombre_edificio">
                    <option value="">Todos los edificios</option>
                    <?php
                    // Mostrar la lista de nombres de edificio en el control de selección
                    while ($edificio = $edificiosResult->fetch_assoc()) {
                        $selected = $nombreEdificio == $edificio['Edificio_Nombre'] ? 'selected' : '';
                        echo "<option value=\"{$edificio['Edificio_Nombre']}\" $selected>{$edificio['Edificio_Nombre']}</option>";
                    }
                    ?>
                </select>
                </div>
                <div class="col-2">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>

        <table class="table table-striped table-hover table-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">N° Depto</th>
                    <th scope="col">Edificio</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener los departamentos filtrados por el nombre de edificio seleccionado
                $filtroNombreEdificio = $nombreEdificio != '' ? "WHERE e.Edificio_Nombre = '$nombreEdificio'" : '';
                $query = $bdd->query("SELECT d.Dept_Id, d.Dept_Num, e.Edificio_Nombre, d.Dept_Habilitado FROM vf_deptos d INNER JOIN vf_edificios e ON d.Edif_Num_Id = e.Edif_Id $filtroNombreEdificio");
                $cont = 0;
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        $cont++;
                        $estado = $row["Dept_Habilitado"] == 1 ? 'ocupado' : 'disponible';
                        ?>
                        <tr class="<?php echo $estado; ?>">
                            <th scope="row"><?php echo $row["Dept_Id"]; ?></th>
                            <td><?php echo $row["Dept_Num"]; ?></td>
                            <td><?php echo $row["Edificio_Nombre"]; ?></td>
                            <td><?php echo $row["Dept_Habilitado"] == 1 ? 'Ocupado' : 'Disponible'; ?></td>
                        </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-warning" role="alert">
                                No hay departamentos.
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="5">
                        <div class="alert alert-warning" role="alert">
                            Hay <?php echo $cont; ?> departamentos.
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>