<?php 
    include('../../../conexionBDD.php');
    include("../template/cabecera.php");
?>
<style>
  .boton-derecha {
    margin-left: auto;
    margin-right: 5%;
  }
  </style>

<div class="text-end boton-derecha">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Asignar_Usuario">
            Agregar
        </button>
    </div>
    
<?php
    include("./Tabla_Usuarios.php");
?>
    

<div class="modal fade" id="Asignar_Usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar Departamento a Nuevo Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Agregar_Usuario.php" method="POST">
                    <div class="row offset-md-3">
                        <div class="col-2 col-sm-3">
                            <span id="basic-addon1">Nombre</span>
                        </div>
                        <div class="col col-sm-8">
                            <input type="text" class="form-control" name="nombre_usuario" placeholder="Ingrese nombre" aria-label="Nombre del usuario" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="w-100 mb-3"></div>

                        <div class="col-2 col-sm-3">
                            <span id="basic-addon2">Correo</span>
                        </div>
                        <div class="col col-sm-8">
                            <input type="email" class="form-control" name="correo_usuario" placeholder="Ingrese correo" aria-label="Correo del usuario" aria-describedby="basic-addon2" required>
                        </div>

                        <div class="w-100 mb-3"></div>

                        <div class="col-2 col-sm-3">
                            <span id="basic-addon6">Password</span>
                        </div>
                        <div class="col col-sm-8">
                            <input type="text" class="form-control" name="password_usuario" placeholder="Ingrese password" aria-label="Contraseña del usuario" aria-describedby="basic-addon6" required>
                        </div>

                        <div class="w-100 mb-3"></div>

                        <div class="col-2 col-sm-3">
                            <span id="basic-addon3">Telefono</span>
                        </div>
                        <div class="col col-sm-8">
                            <input type="number" class="form-control" name="numero_usuario" placeholder="Ingrese numero" aria-label="Numero del usuario" aria-describedby="basic-addon3" required>
                        </div>

                        <div class="w-100 mb-3"></div>

                        <div class="col-2 col-sm-3">
                            <span id="basic-addo4">Rut</span>
                        </div>
                        <div class="col col-sm-8">
                            <input type="number" class="form-control" name="rut_usuario" placeholder="Ingrese rut" aria-label="Rut del usuario" aria-describedby="basic-addon4" required>
                        </div>

                        <div class="w-100 mb-3"></div>

                        <div class="col-2 col-sm-3">
                            <span id="basic-addo5">N° Depto</span>
                        </div>
                        <div class="col col-sm-8">
                            <input type="number" class="form-control" name="depto_usuario" placeholder="Ingrese N° depto" aria-label="Depto del usuario" aria-describedby="basic-addon5" required>
                        </div>
                        <div class="w-100 mb-3"></div>
                        <div class="offset-md-5">
                            <input type="submit" value="Guardar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include("../template/pie.php");
?>