<?php
include 'conexionBDD.php';
$mes = isset($_POST['mes']) ? $_POST['mes'] : date('m');
$anio = isset($_POST['anio']) ? $_POST['anio'] : date('Y');
$query = "SELECT m.nombre, p.estado FROM miembros m
          LEFT JOIN pagos p ON m.id = p.id_miembro AND MONTH(p.fecha_pago) = $mes AND YEAR(p.fecha_pago) = $anio
          ORDER BY m.nombre ASC";
$resultado = $bdd->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos de Miembros</title>
    <link rel="stylesheet" href="css/Style.css" type="text/css">
</head>
<body>
    <div id="info">
        <header>
            <h1>Pagos de Miembros</h1>
        </header>
        <main>
            <form method="post">
                <label for="mes">Mes:</label>
                <select name="mes" id="mes">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        $selected = ($mes == $i) ? 'selected' : '';
                        echo "<option value='$i' $selected>" . date("F", mktime(0, 0, 0, $i, 1)) . "</option>";
                    }
                    ?>
                </select>
                <label for="anio">Año:</label>
                <select name="anio" id="anio">
                    <?php
                    $currentYear = date('Y');
                    for ($i = $currentYear; $i >= $currentYear - 5; $i--) {
                        $selected = ($anio == $i) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>
                <button type="submit">Buscar</button>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Estado de Pago</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $resultado->fetch_assoc()) {
                        $estadoPago = empty($row['estado']) ? 'pendiente de pago' : $row['estado'];
                        echo "<tr>
                                  <td>" . $row['nombre'] . "</td>
                                  <td>" . $estadoPago . "</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>