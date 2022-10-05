<?php

require 'vendor_autoload.php';
require 'conexion.php';

use PhpOffice\PhpSpreadSheet\SpreadSheet;
use PhpOffice\PhpSpreadSheet\IOFactory;

$sql = "SELECT Patente_Auto, Cliente_Agen,Hora_Agen,Tipo_Servicio, FROM agendamiento";
$resultado = $mysqli->query($sql);

$excel = new SpreadSheet();

$HojaActiva = $excel->GetActiveSheet();
$HojaActiva ->setTitle("Agendamiento");

$HojaActiva->setCellValue('A1','Patente_Auto');
$HojaActiva->setCellValue('B1','Cliente_Agen');
$HojaActiva->setCellValue('C1','Hora_Agen');
$HojaActiva->setCellValue('D1','Tipo_Servicio');

$fila = 2;

while($rows = $resultado->fetch_assoc())
{
	$HojaActiva->setCellValue('A'.$fila,$rows['Patente_Auto']);
	$HojaActiva->setCellValue('B'.$fila,$rows['Cliente_Agen']);
	$HojaActiva->setCellValue('C'.$fila,$rows['Hora_Agen']);
	$HojaActiva->setCellValue('D'.$fila,$rows['Tipo_Servicio']);
	$fila++;
}

ob_end_clean();

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="agendamiento.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;