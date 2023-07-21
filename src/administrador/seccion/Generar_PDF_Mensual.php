<?php
require '../../../vendor/autoload.php'; // Include the PhpSpreadsheet autoloader
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
include('../../../conexionBDD.php');
$query = $bdd->query("SELECT vf_users.User_Perfil_Id, vf_users.User_Nombre, g.Gasto_Nombre, g.Gasto_Valor, vf_pago_gastos.mes, e.Tipo_Estado
FROM vf_users
INNER JOIN vf_pago_gastos ON vf_users.User_Id = vf_pago_gastos.User_id
INNER JOIN vf_gastos g ON vf_pago_gastos.Gasto_id = g.Gasto_Id
INNER JOIN vf_estado_gasto e ON g.Gasto_Estado_Id = e.Estado_Id
WHERE vf_users.User_Perfil_Id = 2 AND vf_pago_gastos.mes= 7 AND vf_users.User_Habilitado=1
ORDER BY vf_pago_gastos.year, vf_users.User_Nombre, vf_pago_gastos.mes");
// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// Set the column headers
$sheet->setCellValue('A1', 'Nombre de Usuario');
$sheet->setCellValue('B1', 'Nombre del Gasto');
$sheet->setCellValue('C1', 'Valor del Gasto');
$sheet->setCellValue('D1', 'Mes');
$sheet->setCellValue('E1', 'Estado del Gasto');
// Set the data rows
$row = 2;
if ($query->num_rows > 0) {
    while ($row_data = $query->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $row_data["User_Nombre"]);
        $sheet->setCellValue('B' . $row, $row_data["Gasto_Nombre"]);
        $sheet->setCellValue('C' . $row, $row_data["Gasto_Valor"]);
        $sheet->setCellValue('D' . $row, $row_data["mes"]);
        $sheet->setCellValue('E' . $row, $row_data["Tipo_Estado"]);
        $row++;
    }
} else {
    $sheet->setCellValue('A2', 'No se encontraron resultados.');
    $sheet->mergeCells('A2:E2');
}
// Create a new Xls object and save the spreadsheet to a file
$writer = new Dompdf($spreadsheet);
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="ReportePDFMensual.pdf"');
$writer->save('php://output');

?>