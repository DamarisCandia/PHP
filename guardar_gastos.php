<?php
    include 'conexionBDD.php';

    if(isset($_POST['tipo']) && isset($_POST['valor'])){
        $tipo = $_POST['tipo'];
        $valor = $_POST['valor'];

        $stmt = $bdd->prepare("INSERT INTO gastos (tipo, valor) VALUES (?, ?)");
        $stmt->bind_param("si", $tipo, $valor);

        if($stmt->execute()){
            echo "Gasto guardado exitosamente";
        }else{
            echo "Error al guardar el gasto";
        }

        $stmt->close();
    }
?>