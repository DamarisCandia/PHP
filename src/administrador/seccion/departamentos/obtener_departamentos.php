<?php
include('../../../../conexionBDD.php');

// Obtener la página solicitada desde el parámetro de consulta
$pagina = $_GET['pagina'];

// Definir el número de departamentos por página
$departamentosPorPagina = 10;

// Calcular el desplazamiento para la consulta SQL
$desplazamiento = ($pagina - 1) * $departamentosPorPagina;

// Obtener los departamentos de la página actual
$query = $bdd->query("SELECT d.Dept_Id, d.Dept_Num, e.Edificio_Nombre, d.Dept_Habilitado FROM vf_deptos d INNER JOIN vf_edificios e ON d.Edif_Num_Id = e.Edif_Id LIMIT $desplazamiento, $departamentosPorPagina");

// Construir la tabla HTML con los departamentos
$html = '';
$cont = 0;

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $cont++;
        $html .= '<tr>';
        $html .= '<th scope="row">' . $row["Dept_Id"] . '</th>';
        $html .= '<td>' . $row["Dept_Num"] . '</td>';
        $html .= '<td>' . $row["Edificio_Nombre"] . '</td>';
        $html .= '<td>' . $row["Dept_Habilitado"] . '</td>';
        $html .= '<td>';
        $html .= '<a href="editar.php?id=' . $row['id_perro'] . '" class="btn btn-success"><i class="bi bi-pen"></i></a>';
        $html .= '<a href="eliminar.php?id=' . $row['id_perro'] . '" class="btn btn-danger"><i class="bi bi-trash"></i></a>';
        $html .= '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="5">';
    $html .= '<div class="alert alert-warning" role="alert">';
    $html .= 'No hay departamentos.';
    $html .= '</div>';
    $html .= '</td>';
    $html .= '</tr>';
}

$html .= '<tr>';
$html .= '<td colspan="5">';
$html .= '<div class="alert alert-warning" role="alert">';
$html .= 'Hay ' . $cont . ' departamentos.';
$html .= '</div>';
$html .= '</td>';
$html .= '</tr>';

// Enviar la tabla HTML generada como respuesta
echo $html;
?>
