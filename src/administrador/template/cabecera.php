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
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                    <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/>
                    <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z"/>
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
            <a class="nav-link text-danger" href="../../../index.php">
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
