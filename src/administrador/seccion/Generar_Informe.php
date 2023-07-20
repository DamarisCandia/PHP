<?php include("../template/cabecera.php");?>
<style>
    .form-label {
        font-size: 2rem;
    }
    .center-div {
        display: flex;
        justify-content: center;
    }
    .custom-select {
        width: 300px;
        justify-content: center;
        margin: auto;
    }
    .button-container {
        display: flex;
        justify-content: center;
        margin: auto;
    }
</style>
<div class="mb-3">
    <div class="center-div">
        <label for="disabledSelect" class="form-label">Tipo Informe</label>
    </div>
    <div class="custom-select">
        <select id="disabledSelect" class="form-select">
            <option value="Mensual">Mensual</option>
            <option value="Anual">Anual</option>
        </select>
    </div>
</div>
<div class="container text-center">
    <div id="img_logo" class="button-container">
        <button id="pdf_button">
            Generar informe PDF
            <img src="../../../img/pdf.png" alt="Logo PDF">
        </button>
        <button id="excel_button">
            Generar informe Excel
            <img src="../../../img/excel.png" alt="Logo Excel">
        </button>

        <button id="aButton">aaa</button>
    </div>
</div>

<script>
    // Obtener los elementos de botón
    var pdfButton = document.getElementById('pdf_button');

    //href="Generar_Reporte.xlsx" download
    var excelButton = document.getElementById('excel_button');
    var selectTipoInforme = document.getElementById('disabledSelect');
    // Agregar evento de clic al botón de PDF
    pdfButton.addEventListener('click', function() {
        var tipoInforme = selectTipoInforme.value;
        mostrarMensaje('¡Se generará un informe PDF de tipo ' + tipoInforme + '!');
    });
    // Agregar evento de clic al botón de Excel
    excelButton.addEventListener('click', function() {
        var tipoInforme = selectTipoInforme.value;
        mostrarMensaje('¡Se generará un informe Excel de tipo ' + tipoInforme + '!');
    });
    // Función para mostrar el mensaje
    function mostrarMensaje(mensaje) {
        alert(mensaje);
    }
</script>

<script>
    var aButton = document.getElementById('aButton');

    aButton.addEventListener('click', function() {
        window.location.href = 'Generar_Excel.php';
    });
</script>


<?php include("../template/pie.php");?>