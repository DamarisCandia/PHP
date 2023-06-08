<?php 
    include("../template/cabecera.php");
    include('../../../conexionBDD.php');
?>

<div class="container">
    <div class="row justify-content-start">
        <div class="col-sm-6 text-left">
            <button type="button" onclick="cargarUsuarios()">Usuarios</button>
        </div>
        <div class="col-sm-6 text-left">
            <button type="button" onclick="cargarDeptos()">Departamentos</button>
        </div>
    </div>
    
    <div class="row justify-content-end">
        <div id="UsuariosContainer">
            <!-- Aquí se mostrará la clase Usuarios.php -->
        </div>
        <div id="DeptosContainer">
            <!-- Aquí se mostrará la clase Usuarios.php -->
        </div>
    </div>
</div>


<script>
    var usuariosVisible = false;
    var deptosVisible = false;

    function cargarUsuarios() {
        if (usuariosVisible) {
            document.getElementById("UsuariosContainer").innerHTML = "";
            usuariosVisible = false;
        } else {
            document.getElementById("DeptosContainer").innerHTML = "";
            deptosVisible = false;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("UsuariosContainer").innerHTML = this.responseText;
                    usuariosVisible = true;
                }
            };
            xhttp.open("GET", "./usuarios/Usuarios.php", true);
            xhttp.send();
        }
    }
</script>

<script>
    function cargarDeptos() {
        if (deptosVisible) {
            document.getElementById("DeptosContainer").innerHTML = "";
            deptosVisible = false;
        } else {
            document.getElementById("UsuariosContainer").innerHTML = "";
            usuariosVisible = false;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("DeptosContainer").innerHTML = this.responseText;
                    deptosVisible = true;
                }
            };
            xhttp.open("GET", "./departamentos/Departamentos.php", true);
            xhttp.send();
        }
    }
</script>

<?php include("../template/pie.php");?>


