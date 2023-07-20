<?php
    include('../../../conexionBDD.php');

    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=ReporteExcel.xls");
?>

<table class="table table-striped table-hover table-primary">

        <caption>Estado Pagos</caption>
        <tr>
            <th>Nombre de Usuario</th>
            <th>Nombre del Gasto</th>
            <th>Valor del Gasto</th>
            <th>Mes</th>
            <th scope="col">Año</th>
            <th scope="col">Estado del Gasto</th>5
        </tr>

        <?php

        $query = $bdd->query("SELECT vf_users.User_Perfil_Id, vf_users.User_Nombre, g.Gasto_Nombre, g.Gasto_Valor, vf_pago_gastos.mes, vf_pago_gastos.year , e.Tipo_Estado
        FROM vf_users
        INNER JOIN vf_pago_gastos ON vf_users.User_Id = vf_pago_gastos.User_id
        INNER JOIN vf_gastos g ON vf_pago_gastos.Gasto_id = g.Gasto_Id
        INNER JOIN vf_estado_gasto e ON g.Gasto_Estado_Id = e.Estado_Id
        WHERE vf_users.User_Perfil_Id = 2
        ORDER BY vf_users.User_Nombre");

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row["User_Nombre"]; ?></td>
                    <td><?php echo $row["Gasto_Nombre"]; ?></td>
                    <td><?php echo $row["Gasto_Valor"]; ?></td>
                    <td><?php echo $row["mes"]; ?></td>
                    <td><?php echo $row["year"]; ?></td>
                    <td><?php echo $row["Tipo_Estado"]; ?></td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="8">
                    <div class="alert alert-warning" role="alert">
                        No se encontraron resultados.
                    </div>
                </td>
            </tr>
        <?php
        }
        header("Content-Disposition: attachment; filename=ReporteExcel.xls");
        ?>
</table>