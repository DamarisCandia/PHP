<?php include("template/cabecera.php");?>

<div class="container text-center">
  <h2>Tabla de Pagos</h2>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">Número de vivienda</th>
        <th scope="col">Fecha</th>
        <th scope="col">Monto</th>
        <th scope="col">Estado</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>001</td>
        <td>10/05/2023</td>
        <td>$500</td>
        <td>Pendiente</td>
      </tr>
      <tr>
        <td>002</td>
        <td>05/05/2023</td>
        <td>$250</td>
        <td>Pagado</td>
      </tr>
      <tr>
        <td>003</td>
        <td>02/05/2023</td>
        <td>$1000</td>
        <td>Pendiente</td>
      </tr>
    </tbody>
  </table>
</div>

<?php include("template/pie.php");?>
