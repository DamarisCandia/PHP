<?php
include("../../../Iniciar_sesion.php");
include("../template/cabecera.php");
include('../../../conexionBDD.php');
?>
    <style>
        .boton-derecha {
            margin-left: auto;
            margin-right: 0;
        }
    </style>

    <div class="container text-center">
        <h2>TABLA DE GASTOS COMUNES</h2>

        <?php
        $userId = $_GET['UserId'];

        $query = $bdd->query("SELECT vf_users.User_Perfil_Id, pg.Gasto_id, vf_users.User_Nombre, g.Gasto_Nombre, g.Gasto_Valor, pg.mes, pg.year , e.Tipo_Estado
FROM vf_users
         INNER JOIN vf_pago_gastos pg ON vf_users.User_Id = pg.User_id
         INNER JOIN vf_gastos g ON pg.Gasto_id = g.Gasto_Id
         INNER JOIN vf_estado_gasto e ON pg.Gasto_Estado_id= e.Estado_Id
WHERE vf_users.User_Id = $userId 
ORDER BY pg.year, pg.mes");
        ?>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Gasto</th>
                <th scope="col">Valor</th>
                <th scope="col">Estado</th>
                <th scope="col">Mes</th>
                <th scope="col">Año</th>
                <th scope="col"></th>
            </tr>

            </thead>
            <tbody>
            <?php
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row["Gasto_Nombre"] ?></td>
                        <td><?php echo $row["Gasto_Valor"] ?></td>
                        <td><?php echo $row["Tipo_Estado"] ?></td>
                        <td><?php echo $row["mes"] ?></td>
                        <td><?php echo $row["year"] ?></td>
                        <td>
                            <?php if ($row["Tipo_Estado"] !== "Pagado") { ?>
                                <button class="btn btn-success edit-btn"
                                        data-id="<?php echo $userId; ?>"
                                        data-gasto-id="<?php echo $row['Gasto_id']; ?>"
                                        data-mes="<?php echo $row['mes']; ?>"
                                        data-year="<?php echo $row['year']; ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                    Pagar
                                </button>
                            <?php } ?>
                        </td>

                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="6">
                        <div class="alert alert-warning" role="alert">
                            No tienes gastos comunes
                        </div>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>

    <script>
        // Get all the buttons with class "edit-btn"
        const editButtons = document.querySelectorAll('.edit-btn');

        // Attach a click event listener to each button
        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Get the data attributes from the clicked button
                const userId = this.dataset.id;
                const gastoId = this.dataset.gastoId;
                const mes = this.dataset.mes;
                const year = this.dataset.year;

                // Perform an AJAX request to send the data to the server-side script
                // and execute the SQL query
                // Example using jQuery:
                $.ajax({
                    url: 'pagar_gasto.php',
                    method: 'POST',
                    data: {userId: userId, gastoId: gastoId, mes: mes, year: year},
                    success: function (response) {
                        // Handle the response from the server
                        alert("El gasto se ha registrado para todos los departamentos del edificio seleccionado.!");
                        location.reload();
                    },
                    error: function () {
                        // Handle any errors
                    }
                });
            });
        });
    </script>

<?php include("../template/pie.php"); ?>