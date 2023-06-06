<?php
include 'conexionBDD.php';
include("template/cabecera.php");
?>

<style>
  body{
    background: url(css/fondoC.png);
}
  .form-group {
    width: 300px;
  }
   .form-group label {
    display: block;
  }
   button{
    width: 270px;
  }
  img{
    margin-top: 10px;
    max-width: 300px;
    max-height: 300px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: -50px;
}
.container {
  margin-top: -160px;
}

#login {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 50px;
  margin-bottom: 200px;
}

.input {
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.input label {
  margin-bottom: 10px;
  text-align: center;
}
</style>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos Comunes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
</head>
<body>
    <img src="css/logoc.png">

    <div id="login", class="bloque5">

        <div class="input">
            <label for="uname">Usuario: </label>
            <input type="text" id="uname" name="name">
        </div>
        
        <div class="input">
            <label for="uname">Contraseña: </label>
            <input type="password" id="uname" name="name">
        </div>

        <br>

        <button type="submit" class="btn btn-primary btn-lg" onclick="location='inicio_cliente.php'">Ingresar</button>
        <button type="submit" class="btn btn-primary btn-lg" onclick="location='admin.php'">¿Olvidaste tu contraseña?</button>
        <button  type="submit" class="btn btn-primary btn-lg"  onclick="location='./PHP_ADMIN/index2_0.php'">2.0</button>

    </div>

    <?php include("template/pie.php");?>
</body>
</html>