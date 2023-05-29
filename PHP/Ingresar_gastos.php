<?php include("template/cabecera.php");?>
    
    <div class="container offset-md-3">
        <form action="guardar_gasto.php" method="POST">
        <div class="w-100 mb-3 offset-md-1">
            <h2>Ingresar gastos comunes</h2>
        </div>
            <div class="row">
                <div class="col-3 col-sm-2">
                    <span class="input-group-text" id="basic-addon1">Tipo de gasto</span></div>
                <div class="col-6 col-sm-3">
                    <input type="text" class="form-control" placeholder="Ingrese nombre del gasto" aria-label="Tipo de gasto comun" aria-describedby="basic-addon1" required>
                </div>

                <!-- Obligar a las siguientes columnas a pasar a una nueva línea -->
                <div class="w-100 mb-3"></div>

                <div class="col-3 col-sm-2">
                    <span class="input-group-text" id="basic-addon2">Valor</span></div>
                <div class="col-6 col-sm-3">
                    <input type="number" class="form-control" placeholder="Ingrese valor" aria-label="valor del gasto" aria-describedby="basic-addon2" min="0" step="1" required>
                </div>

                <div class="w-100 mb-3"></div>

                <div class="col-3 col-sm-2">
                    <span class="input-group-text" id="basic-addon3">Fecha</span></div>
                <div class="col-6 col-sm-3">
                    <input type="text" class="form-control" placeholder="Ingrese fecha" aria-label="fecha del gasto" aria-describedby="basic-addon3" required>
                </div>
                <div class="w-100 mb-3"></div>
            </div>
            
            <div class="w-100 mb-3  offset-md-2">
                <input type="submit" value="Guardar">
            </div>
            
            
        </form>
    </div>

<?php include("template/pie.php");?>
