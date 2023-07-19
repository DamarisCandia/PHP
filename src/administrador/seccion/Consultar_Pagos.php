<?php
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
  <div class="text-end boton-derecha">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Gasto_Comun">
        Agregar
    </button>
  </div>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Valor</th>
        <th scope="col">Fecha</th>
        <th scope="col">Estado</th>
        <th scope="col">Num° depto</th>
      </tr>
    </thead>
    <tbody>
      <?php
       $query = $bdd->query("SELECT Gasto_Nombre, Gasto_Valor, Gasto_Fecha, Gasto_Estado_Id, Dept_Num_Id FROM VF_Gastos");
      $conta = 0;
      if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
          $estadoQuery = $bdd->query("SELECT Tipo_Estado FROM VF_Estado_Gasto WHERE Estado_Id = '".$row["Gasto_Estado_Id"]."'");
          $estadoRow = $estadoQuery->fetch_assoc();
          $conta = $conta + 1;
      ?>
          <tr>
            <td scope="row"><?php echo $row["Gasto_Nombre"]; ?></td>
            <td><?php echo $row["Gasto_Valor"]; ?></td>
            <td><?php echo $row["Gasto_Fecha"]; ?></td>
            <td><?php echo $estadoRow["Tipo_Estado"]; ?></td>
            <td><?php echo $row["Dept_Num_Id"]; ?></td>
          </tr>
      <?php
        }
      } else {
        echo "<tr><td colspan='5'>No hay gastos</td></tr>";
      }
      ?>
    </tbody>
  </table>

  
</div>

<div class="modal fade" id="Gasto_Comun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Gasto Comun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../guardar_gastos.php" method="POST">
    <div class="row offset-md-3">
        <div class="col-2 col-sm-3">
            <span id="basic-addon1">Nombre</span>
        </div>
        <div class="col col-sm-8">
            <input type="text" class="form-control" name="tipo_gasto" placeholder="Ingrese nombre del gasto" aria-label="Tipo de gasto común" aria-describedby="basic-addon1" required>
        </div>

        <div class="w-100 mb-3"></div>

        <div class="col-2 col-sm-3">
            <span id="basic-addon2">Valor</span>
        </div>
        <div class="col col-sm-8">
            <input type="number" class="form-control" name="valor_gasto" placeholder="Ingrese valor" aria-label="Valor del gasto" aria-describedby="basic-addon2" min="0" step="1" required>
        </div>

        <div class="w-100 mb-3"></div>
        
        <div class="col-2 col-sm-3">
            <span id="basic-addon3">Fecha</span>
        </div>
        <div class="col col-sm-8">
            <?php $fecha_actual = date("m/Y") ?>
            <input type="text" class="form-control" name="fecha_gasto" placeholder="<?php echo $fecha_actual; ?>" aria-label="fecha del gasto" aria-describedby="basic-addon3" disabled>
        </div>

        <div class="w-100 mb-3"></div>

        <div class="col-2 col-sm-3">
            <span id="basic-addon4">Edificio</span>
        </div>
        <div class="col col-sm-8">
                <select class="form-select" name="edificio" required>
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
        </div>

    <div class="offset-md-5">
        <input type="submit" value="Guardar">
    </div>
</form>

        
      </div>
    </div>
  </div>
</div>

<?php include("../template/pie.php"); ?>