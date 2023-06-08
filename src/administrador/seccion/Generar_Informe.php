<?php include("../template/cabecera.php");?>

<div class="container text-center">
    <div id="img_logo">
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
    // Obtener los elementos de botón
    var pdfButton = document.getElementById('pdf_button');
    var excelButton = document.getElementById('excel_button');

    // Agregar evento de clic al botón de PDF
    pdfButton.addEventListener('click', function() {
        mostrarMensaje('¡Se generará un informe PDF!');
    });

    // Agregar evento de clic al botón de Excel
    excelButton.addEventListener('click', function() {
        mostrarMensaje('¡Se generará un informe Excel!');
    });

    // Función para mostrar el mensaje
    function mostrarMensaje(mensaje) {
        alert(mensaje);
    }
</script>

<?php include("../template/pie.php");?>
