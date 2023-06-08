<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/bootstrap.css">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/diseño.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="../../../css/logoc.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <title>VIVE FELIZ</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light opacity-75" style="background-color: #0d6efd;">
    <ul class="nav navbar-nav fs-4">
        <li class="nav-item fs-6 nav-link disabled user-select-none">
            <a class="nav-link text-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                    <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z"/>
                    <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z"/>
                </svg>
                Condominios Vive Feliz
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="../seccion/inicio.php">
                Inicio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light dropdown-toggle" href="#" id="mantenedorDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Mantenedor
            </a>
            <ul class="dropdown-menu" aria-labelledby="mantenedorDropdown">
                <li><a class="dropdown-item" href="../seccion/Usuarios.php">Usuarios</a></li>
                <li><a class="dropdown-item" href="../seccion/Departamentos.php">Departamentos</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="../seccion/Consultar_Pagos.php">Gastos comunes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="../seccion/Generar_Informe.php">Generar informes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="../seccion/Galeria_Imagenes.php">Galeria</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </a>
        </li>
    </ul>
</nav>

<script>
$(document).ready(function() {
  $('.dropdown-toggle').on('click', function(e) {
    if ($(this).next('.dropdown-menu').length) {
      e.preventDefault();
      $(this).next('.dropdown-menu').toggle();
    }
  });

  $('.dropdown-menu').on('mouseleave', function() {
    $(this).hide();
  });
});
</script>

</body>
</html>
