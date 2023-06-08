<?php
include('../../../../conexionBDD.php');

    if(isset($_GET['id'])) {
        $id_dept = $_GET['id'];
    } else {
        header("Location: inicio.php");
        exit();
    }

    $consulta_depto = "SELECT * FROM vf_deptos WHERE Dept_Id = $id_dept";
    $resultado_depto = $bdd->query($consulta_depto);

    if($resultado_depto->num_rows > 0) {
        $perro = $resultado_depto->fetch_assoc();
    ?>
    <div class="container">
        <h1>Editar Departamento</h1>
        <form method="POST" action="guardar_edicion.php">
                <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                <label class="btn btn-outline-success" for="success-outlined">Disponible</label>

                <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                <label class="btn btn-outline-danger" for="danger-outlined">Ocupado</label>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
    <?php
    } else {
        echo "Depto no encontrado";
    }
?>
