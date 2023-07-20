<?php
include '../../../vendor/autoload.php'; // Include the PhpSpreadsheet autoloader
include('../../../conexionBDD.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

$query = $bdd->query("SELECT vf_users.User_Perfil_Id, vf_users.User_Nombre, g.Gasto_Nombre, g.Gasto_Valor, vf_pago_gastos.mes, vf_pago_gastos.year , e.Tipo_Estado
FROM vf_users
INNER JOIN vf_pago_gastos ON vf_users.User_Id = vf_pago_gastos.User_id
INNER JOIN vf_gastos g ON vf_pago_gastos.Gasto_id = g.Gasto_Id
INNER JOIN vf_estado_gasto e ON g.Gasto_Estado_Id = e.Estado_Id
WHERE vf_users.User_Perfil_Id = 2
ORDER BY vf_users.User_Nombre");
// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// Set the column headers
$sheet->setCellValue('A1', 'Nombre de Usuario');
$sheet->setCellValue('B1', 'Nombre del Gasto');
$sheet->setCellValue('C1', 'Valor del Gasto');
$sheet->setCellValue('D1', 'Mes');
$sheet->setCellValue('E1', 'Año');
$sheet->setCellValue('F1', 'Estado del Gasto');
// Set the data rows
$row = 2;
if ($query->num_rows > 0) {
while ($row_data = $query->fetch_assoc()) {
$sheet->setCellValue('A' . $row, $row_data["User_Nombre"]);
$sheet->setCellValue('B' . $row, $row_data["Gasto_Nombre"]);
$sheet->setCellValue('C' . $row, $row_data["Gasto_Valor"]);
$sheet->setCellValue('D' . $row, $row_data["mes"]);
$sheet->setCellValue('E' . $row, $row_data["year"]);
$sheet->setCellValue('F' . $row, $row_data["Tipo_Estado"]);
$row++;
}
} else {
$sheet->setCellValue('A2', 'No se encontraron resultados.');
$sheet->mergeCells('A2:F2');
}
// Create a new Xls object and save the spreadsheet to a file
$writer = new Xls($spreadsheet);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="ReporteExcelAnual.xls"');
$writer->save('php://output');

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>