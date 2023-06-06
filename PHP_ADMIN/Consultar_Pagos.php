<?php
include("template/cabecera.php");
include('../conexionBDD.php');
?>

<div class="container text-center">
  <h2>Tabla de Pagos</h2>
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

<?php include("template/pie.php"); ?>
