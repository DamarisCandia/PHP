<?php 
    include('../../../conexionBDD.php');
?>

<div class="container" id="tabla_usuarios">

    <table class="table table-striped table-hover table-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">N° Depto</th>
                <th scope="col">Edificio</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
    $query = $bdd->query("SELECT d.Dept_Id, d.Dept_Num, e.Edificio_Nombre, d.Dept_Habilitado FROM vf_deptos d INNER JOIN vf_edificios e ON d.Edif_Num_Id = e.Edif_Id");
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
    <td>
        <a href="Editar_Depto.php?id=<?php echo $row['Dept_Id']; ?>" class="btn btn-success"><i class="bi bi-pen"></i></a>
    </td>
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