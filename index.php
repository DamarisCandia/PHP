<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos Comunes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      body {
        background: url(css/fondoC.png);
      }
      .form-group {
        width: 300px;
      }
      .form-group label {
        display: block;
      }
      button {
        width: 270px;
      }
      img {
        margin-top: 50px;
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
        text-align: center;
      }
      .button-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
      }
      .btn-primary:first-child {
        margin-bottom: 10px;
      }
    </style>
</head>
<body>
    <img src="css/logoc.png">
    <div id="login" class="bloque5">
      <form method="POST" action="Iniciar_sesion.php">
        <div class="input">
          <label for="rut">Usuario:</label>
          <input type="text" id="rut" name="rut" required>
        </div>
        <div class="input">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <br>
        <div class="button-container">
          <button type="submit" class="btn btn-primary btn-lg">Ingresar</button>
          <button class="btn btn-primary btn-lg">¿Olvidaste tu contraseña?</button>
        </div>
      </form>
    </div>
    <?php include("template/pie.php");?>
</body>
</html>
