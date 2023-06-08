<?php 
    include("../template/cabecera.php");
    include('../../../conexionBDD.php');
?>

<div class="container text-center">
    <h2>Ingresar gastos comunes</h2>

    <form action="../guardar_gastos.php" method="POST">
        <div class="row offset-md-3">
            <div class="col-3 col-sm-3">
                <span class="input-group-text" id="basic-addon1">Tipo de gasto</span>
            </div>
            <div class="col-6 col-sm-5">
                <input type="text" class="form-control" name="tipo_gasto" placeholder="Ingrese nombre del gasto" aria-label="Tipo de gasto común" aria-describedby="basic-addon1" required>
            </div>

            <div class="w-100 mb-3"></div>

            <div class="col-3 col-sm-3">
                <span class="input-group-text" id="basic-addon2">Valor</span>
            </div>
            <div class="col-6 col-sm-5">
                <input type="number" class="form-control" name="valor_gasto" placeholder="Ingrese valor" aria-label="Valor del gasto" aria-describedby="basic-addon2" min="0" step="1" required>
            </div>

            <div class="w-100 mb-3"></div>

            <div class="col-3 col-sm-3">
                <span class="input-group-text" id="basic-addon3">Fecha</span>
            </div>
            <div class="col-6 col-sm-5">
                <input type="text" class="form-control" name="fecha_gasto" placeholder="yyyy-mm-dd" aria-label="fecha del gasto" aria-describedby="basic-addon3" required>
            </div>

            <div class="w-100 mb-3"></div>

            <div class="col-3 col-sm-3">
                <span class="input-group-text" id="basic-addon4">Seleccione edificio</span>
            </div>
            <div class="col-6 col-sm-5">
                <select class="form-select" name="edificio" required>
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
        </div>

        <div class="offset-md-5">
            <input type="submit" value="Guardar">
        </div>
    </form>
</div>

<?php include("../template/pie.php");?>

