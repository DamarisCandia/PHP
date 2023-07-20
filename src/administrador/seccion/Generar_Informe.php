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
    </div>
</div>
<script>
    var formato = '';
    var select = document.getElementById('disabledSelect');
    select.addEventListener('change', function() {
        formato = select.value;
    });


    var excelButton = document.getElementById('excel_button');
    excelButton.addEventListener('click', function() {
        if (formato === 'Anual') {
            window.location.href = 'Generar_Excel.php';
        } else
            window.location.href = 'Generar_Excel_Mensual.php';
        }
    );
    
    var pdfButton = document.getElementById('pdf_button');
    pdfButton.addEventListener('click', function() {
        if (formato === 'Anual') {
            window.location.href = 'Generar_PDF.php';
        } else
            window.location.href = 'Generar_PDF_Mensual.php';
        }
    );
</script>
<?php include("../template/pie.php");?>