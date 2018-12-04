<?php
/** Incluir la libreria PHPExcel */
require_once 'lib/excel/Classes/PHPExcel.php';

// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();
 
// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("Veolia")
->setLastModifiedBy("Veolia")
->setTitle("Generación de Detalle de Liquidación de OT")
->setSubject("Detalle de Liquidación de OT")
->setDescription("Generación de Detalle de Liquidación de OT")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Generación de Detalle de Liquidación de OT");

// Agregar Informacion
$objPHPExcel->getActiveSheet()->mergeCells('C1:F1');
// add some text
$objPHPExcel->getActiveSheet()->setCellValue('C1','MANTENIMIENTO DE REDES DE AGUA POTABLE Y ALCANTARILLADO');
// Agregar Informacion
$objPHPExcel->getActiveSheet()->mergeCells('C2:F2');
// add some text
$objPHPExcel->getActiveSheet()->setCellValue('C2','LIQUIDACIÓN DE ORDEN DE TRABAJO');

$objPHPExcel->getActiveSheet()->setCellValue('A3','N°');
$objPHPExcel->getActiveSheet()->setCellValue('B3','688149');
$objPHPExcel->getActiveSheet()->setCellValue('C3','CONTRATISTA:');
$objPHPExcel->getActiveSheet()->setCellValue('D3','CONSORCIO VEOLIA PROACTIVA');
$objPHPExcel->getActiveSheet()->setCellValue('E3','SUPERVISOR VEOLIA:');
$objPHPExcel->getActiveSheet()->setCellValue('F3','KEVIN SANTANA');

$objPHPExcel->getActiveSheet()->setCellValue('A4','DIRECCIÓN:');
$objPHPExcel->getActiveSheet()->setCellValue('B4','LA FABRIL POR EL SEMAFORO');
$objPHPExcel->getActiveSheet()->setCellValue('C4','FISCALIZADOR EPAM:');
$objPHPExcel->getActiveSheet()->setCellValue('D4','MARCELO FLORES');
$objPHPExcel->getActiveSheet()->setCellValue('E4','PLANILLA:');
$objPHPExcel->getActiveSheet()->setCellValue('F4','9');

$objPHPExcel->getActiveSheet()->setCellValue('A5','Trabajo \r\nTrámite Solicitado:');
$objPHPExcel->getActiveSheet()->setCellValue('B5','FUGA EN LA RED DE DISTRIBUCION');
$objPHPExcel->getActiveSheet()->setCellValue('C5','Trabajo Ejecutado \r\nSolución Técnica:');
$objPHPExcel->getActiveSheet()->getStyle('C5')->getAlignment()->setWrapText(true);


$objPHPExcel->getActiveSheet()->mergeCells('D5:F5');
// add some text
$objPHPExcel->getActiveSheet()->setCellValue('D5','FUGA EN LA RED DE DISTRIBUCION');


/*
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', ' ')
->setCellValue('B1', 'Valor 2')
->setCellValue('C1', 'Total')
->setCellValue('A2', '10')
->setCellValue('C2', '=sum(A2:B2)');*/

/*

					
Fecha de Solicitud:	23/05/2018 03:05	Fecha de Solución Técnica:	23/05/2018 02:50	Fecha de Finalización :	21/06/2018 15:00
					
CODIGO RUBRO	DESCRIPCION DEL RUBRO	UNIDAD	CANTIDAD	PRECIO UNITARIO	COSTO TOTAL

*/

// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Tecnologia Simple');

// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);

// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="pruebaReal.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>