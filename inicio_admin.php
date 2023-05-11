<?php
include 'conexionBDD.php'
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
            <h1>Vive Feliz - Administrador</h1>
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
                        <h2>Pagos</h2>
                        <br>
                        <?php
                        // Consulta para obtener los pagos de los miembros de la comunidad
                        $query = $bdd->query("SELECT * FROM pagos");
                        if($query->num_rows > 0){
                            // Calcular el total de los pagos
                            $total = 0;
                            while($row = $query->fetch_assoc()){
                                $total += $row["monto"];
                            }
                            ?>
                            <p>Fecha vencimiento : 02/05/2023</p>
                            <h4>Total: $<?php echo $total ?></h4>
                            <br>
                            <table class="table">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                </tr>
                                <?php
                                // Consulta para obtener los miembros de la comunidad
                                $query = $bdd->query("SELECT * FROM miembros");
                                if($query->num_rows > 0){
                                    while($row = $query->fetch_assoc()){
                                        // Consulta para obtener el estado de pago de cada miembro
                                        $pago_query = $bdd->query("SELECT * FROM pagos WHERE miembro_id = " . $row["id"] . " ORDER BY id DESC LIMIT 1");
                                        $estado = "pendiente de pago";
                                        if($pago_query->num_rows > 0){
                                            $pago_row = $pago_query->fetch_assoc();
                                            if($pago_row["monto"] >= $total){
                                                $estado = "pagado";
                                            }elseif($pago_row["fecha_vencimiento"] < date("Y-m-d")){
                                                $estado = "moroso";
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $row["nombre"] ?></td>
                                            <td><?php echo $estado ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
                            <?php
                        }else{
                            ?>
                            <p>No hay pagos registrados</p>
                            <?php
                        }
                        ?>
                        <br>
                    </section>
                    <section id="3">
                        <h2>Ingresar gasto común</h2>
                        <div id="img_logo">
                            <button>
                                Generar informe 
                                <img src="./img/pdf.png" alt="Logo PDF">
                                <img src="./img/excel.png" alt="Logo Excel">
                            </button>
                        </div>
                    </section>
                    <?php
                }
                