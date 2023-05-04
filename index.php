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
    <link rel="stylesheet" href="css/Style.css">
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
                <li><a href="#1">Gastos</a></li>
                <li><a href="#2">Pagos</a></li>
                <li><a href="#3">Historial de Pagos</a></li>
            </ul>
        </nav>
        </div>

        <section id="1">
            <h2>Gastos</h2>
            
            <table class = "table">
                <tr>
                    <td>
                        Gastos
                    </td>
                    <td>
                        Valor
                    </td>
                </tr>
                <?php
                $query = $bdd->query("SELECT * FROM gastos");
                $conta =0;
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $conta = $conta + $row["valor"];
                ?>
                <tr>
                <td scope="row"><?php echo $row["tipo"]?></td>
                <td scope="row"><?php echo $row["valor"]?></td>
                </tr>

                <?php
                } 
                }else{
                    ?>
                    <p>No hay perritos</p>
                    <?php
                }
                ?>
            </table>
            
        </section>

        <section id="2">
            <h2>Pagos</h2>
            <h4>Fecha vencimiento : 02/05/2023</h4>
            <h3>Total: <?php echo $conta ?></h3> 
            <p>En caso de atrasarse en su pago se cobrara una multa de $5.000 por semana</p>
            <button> Pagar</button>
        </section>

        <section id="3">
            <h2>Historial de Pagos</h2>

            <ul>
                <li>Abril : Cancelado</li>
                <li>Marzo : Cancelado</li>
                <li>Febrero : Cancelado</li>
                <li>Enero : Cancelado</li>
                <li>Diciembre : Cancelado</li>
            </ul>
        </section>
    </main>

    </div>
    
</body>
</html>