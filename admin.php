<?php
include 'conexionBDD.php';
include 'vendor/autoload.php';
?>
<?php
    if(!isset($_GET['seccion'])){
        $_GET['seccion'] = 'seccion1';
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos Comunes</title>
    <link rel="stylesheet" href="css/Style.css" type="text/css">
    
</head>
<body>
    <div id = "info">

    <header>
        <h1>Vive Feliz</h1>
    </header>

    <main>
        <div id = "list">
            <nav>
                <ul>
                    <li><a href="?seccion=seccion1">Ingresar gastos</a></li>
                    <li><a href="?seccion=seccion2">Consultar pagos</a></li>
                    <li><a href="?seccion=seccion3">Generar informes</a></li>
                </ul>
            </nav>
        </div>

        <?php
            if (isset($_GET['seccion']) && $_GET['seccion'] == 'seccion1') {
            ?>
            <div class="seccion">
            <section id="1">
                        <h2>Ingresar gastos comunes</h2>
                        <form action="guardar_gasto.php" method="POST">
                            <label for="tipo">Tipo de gasto:</label>
                            <input type="text" id="tipo" name="tipo" required>
                            <br>
                            <label for="valor">Valor:</label>
                            <input type="number" id="valor" name="valor" min="0" step="0.01" required>
                            <br>
                            <label for="tipo">Fecha:</label>
                            <input type="text" id="fecha" name="fecha" required>
                            <br>
                            <input type="submit" value="Guardar">
                        </form>
                    </section>
                </div>
            <?php
            }
            elseif (isset($_GET['seccion']) && $_GET['seccion'] == 'seccion2') {
            ?>  
                  <section id="2">
  <h2>Tabla de Pagos</h2>
  <table>
    <thead>
      <tr>
        <th>Número de vivienda</th>
        <th>Fecha</th>
        <th>Monto</th>
        <th>Estado</th>
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
            </section>
  
            <?php
            }
            elseif (isset($_GET['seccion']) && $_GET['seccion'] == 'seccion3') {
            ?>
                <div class="seccion">
                <section id="3">
                        <h2>Generar informe</h2>
                        <div id="img_logo">
                            <button>
                                Generar informe PDF
                                <img src="./img/pdf.png" alt="Logo PDF">
                            </button>
                            <button>
                                Generar informe Excel
                                <img src="./img/excel.png" alt="Logo Excel">
                            </button>
                            
                            
                        </div>
                    </section>
                </div>
            <?php
            }
            ?>
        
    </main>
    </div>
</body>
</html>
