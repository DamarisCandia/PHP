<?php include("template/cabecera.php");?>

<style>
  .form-group {
    width: 300px;
  }
   .form-group label {
    display: block;
  }
   button{
    max-width: 300px;
  }
  img{
    margin-top: 10px;
    max-width: 300px;
    max-height: 300px;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.container {
  margin-top: -160px;
}
</style>

<img src="logoc.png">

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh">

  <form>
    <div class="form-group text-center">
      <label for="inputEmail">N° Departamento</label>
      <input type="email" class="form-control" id="inputEmail" placeholder="N° Departamento">
    </div>
    <div class="form-group text-center">
      <label for="inputPassword">Contraseña</label>
      <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
    </div>
    <div class="d-flex justify-content-center flex-column mt-3">
      <button type="submit" class="btn btn-primary btn-lg" onclick="location='inicio_cliente.php'">Ingresar</button>
      <button type="submit" class="btn btn-primary btn-lg" onclick="location='admin.php'">¿Olvidaste tu contraseña?</button>
      <button type="submit" class="btn btn-primary btn-lg" onclick="location='./PHP_ADMIN/index2_0.php'">2.0</button>
    </div>
  </form>
</div>

<?php include("template/pie.php");?>

