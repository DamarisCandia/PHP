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

  $query = $bdd->query("SELECT vf_users.User_Perfil_Id, vf_users.User_Nombre, g.Gasto_Nombre, g.Gasto_Valor, vf_pago_gastos.mes, vf_pago_gastos.year , e.Tipo_Estado
  FROM vf_users
  INNER JOIN vf_pago_gastos ON vf_users.User_Id = vf_pago_gastos.User_id
  INNER JOIN vf_gastos g ON vf_pago_gastos.Gasto_id = g.Gasto_Id
  INNER JOIN vf_estado_gasto e ON g.Gasto_Estado_Id = e.Estado_Id
  WHERE vf_users.User_Id = $userId
  ORDER BY vf_pago_gastos.year");
  ?>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">Gasto</th>
        <th scope="col">Valor</th>
        <th scope="col">Estado</th>
        <th scope="col">Mes</th>
        <th scope="col">Año</th>
        <th scope="col"> </th>
      </tr>

    </thead>
    <tbody>
      <?php
        if($query->num_rows > 0){
          while($row = $query->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $row["Gasto_Nombre"] ?></td>
        <td><?php echo $row["Gasto_Valor"] ?></td>
        <td><?php echo $row["Tipo_Estado"] ?></td>
        <td><?php echo $row["mes"] ?></td>
        <td><?php echo $row["year"] ?></td>
        <td>
          <button class="btn btn-success edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" >Pagar</button>
        </td>
      </tr>
    <?php }
      } else { ?>
        <tr>
          <td colspan="6">
            <div class="alert alert-warning" role="alert">
              No tienes Comunes
            </div>
          </td>
        </tr>
      <?php } ?>

    </tbody>
  </table>
</div>

<?php include("../template/pie.php"); ?>