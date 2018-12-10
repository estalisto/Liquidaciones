<?php
/******************************************************************************************
Nombre: exportExcelDetOT.php
Copyright de la Empresa: Veolia Ecuador
Fecha de puesta en produccion:
Fecha fin de la programacion: 06-12-2018
Autor: Stalyn Granda
Referencia: PORTAL DE LIQUIDACIONES PARA SUBCONTRATISTAS MANTA
Descripción General: página para realizar el export en excel
 ******************************************************************************************/
require_once '../lib/excel/Classes/PHPExcel.php';

require_once '../class/Liquidacion.php';
require_once '../configuracion/configuracion.php';
require_once '../funcionesWS/funcionesConsulta.php';
require_once '../class/OrdenesWS.php';
require_once '../class/CredencialesWS.php';
require_once '../class/MetodosWS.php';
require_once '../class/InstanciaWS.php';




/*
 *
 * ID_ORDEN=<?= $valor['ID_ORDEN']; ?>
&PLANILLA=<?= $valor['PLANILLA']; ?>
&ID_TRABAJO_SOLICITUD=<?= $valor['ID_TRABAJO_SOLICITUD']; ?>
&DIRECCION=<?= $valor['DIRECCION']; ?>
&TRABAJO_SOLICITADO=<?= $valor['TRABAJO_SOLICITADO']; ?>
&FECHA_SOLICITUD=<?= $valor['FECHA_SOLICITUD']; ?>
&SOLUCION_TECNICA=<?= $valor['SOLUCION_TECNICA']; ?>
&FECHA_SOLUCION_TECNICA=<?= $valor['FECHA_SOLUCION_TECNICA']; ?>
&FECHA_FINALIZACION
 *
 * */

$ID_ORDEN=$_GET['ID_ORDEN'];
$PLANILLA=$_GET['PLANILLA'];
$ID_TRABAJO_SOLICITUD=utf8_decode($_GET['ID_TRABAJO_SOLICITUD']);
$DIRECCION=utf8_decode($_GET['DIRECCION']);
$TRABAJO_SOLICITADO=utf8_decode($_GET['TRABAJO_SOLICITADO']);
$FECHA_SOLICITUD=$_GET['FECHA_SOLICITUD'];
$SOLUCION_TECNICA=utf8_decode($_GET['SOLUCION_TECNICA']);
$FECHA_SOLUCION_TECNICA=$_GET['FECHA_SOLUCION_TECNICA'];
$FECHA_FINALIZACION=$_GET['FECHA_FINALIZACION'];


// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("Veolia")
->setLastModifiedBy("Veolia")
->setTitle("Planilla de Liquidaciones")
->setSubject("Documento Excel")
->setDescription(utf8_encode("Liquidación de OT por Contratista"))
->setKeywords("Excel Office 2007 openxml php")
->setCategory(utf8_encode("Generación de Detalle de Liquidación de OT"));


//TAMAÑO 18
$styleArray18 = array(
    'font'  => array(
        'bold'  => true,
       // 'color' => array('rgb' => 'FF0000'),
        'size'  => 18,
        'name'  => 'Calibri'
    ));
//TAMAÑO 11
$styleArray11 = array(
    'font'  => array(
     //   'bold'  => true,
       // 'color' => array('rgb' => 'FF0000'),
        'size'  => 11,
        'name'  => 'Calibri'
    ));
//orientacion y formato de página A4
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

//margenes
/*$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(1);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(1);*/







//tamaño de letra
$objPHPExcel->getActiveSheet()->getStyle('C1:F2')->applyFromArray($styleArray18);
$objPHPExcel->getActiveSheet()->getStyle('A3:F26')->applyFromArray($styleArray11);

//NEGRITA

$objPHPExcel->getActiveSheet()->getStyle('C1:F1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C2:F2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A3:A6')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C3:C6')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E3:E6')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E24:E26')->getFont()->setBold(true);



// Agregar Informacion
$objPHPExcel->getActiveSheet()->mergeCells('C1:F1');// add some text
$objPHPExcel->getActiveSheet()->setCellValue('C1','MANTENIMIENTO DE REDES DE AGUA POTABLE Y ALCANTARILLADO');
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
//=====ALTO
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('4')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('7')->setRowHeight(11);
$objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(14);
$objPHPExcel->getActiveSheet()->getRowDimension('9')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('11')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('12')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('13')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('14')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('15')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('16')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('17')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('18')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('19')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('20')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('21')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('22')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('23')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('24')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('25')->setRowHeight(39);
$objPHPExcel->getActiveSheet()->getRowDimension('26')->setRowHeight(39);
//$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
//==== ANCHO
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(60);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(28);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(27);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(29);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(23);
//=====IMAGEN


/*
 * allborders
 * diagonal
 * inside
 * outline
 * horizontal
 * top
 * left
 * vertical
 * botton
 * right
 */
$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '063DFA')
    )
  )
);
$objPHPExcel->getActiveSheet()->getStyle('A1:F26')->applyFromArray($BStyle);

//=================
//=================
$objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
$objPHPExcel->getActiveSheet()->getStyle('C2')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
$objPHPExcel->getActiveSheet()->getStyle('A1:F8')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
$objPHPExcel->getActiveSheet()->mergeCells('A1:B2');// add some text
$objPHPExcel->getActiveSheet()->setCellValue('A1',utf8_encode(''));// Agregar Informacion
$objPHPExcel->getActiveSheet()->mergeCells('C2:F2');// add some text
$objPHPExcel->getActiveSheet()->setCellValue('C2','LIQUIDACIÓN DE ORDEN DE TRABAJO');
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('A3','N°');
$objPHPExcel->getActiveSheet()->getStyle('A3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('B3',utf8_encode($ID_ORDEN));
$objPHPExcel->getActiveSheet()->setCellValue('C3',utf8_encode('CONTRATISTA:'));
$objPHPExcel->getActiveSheet()->getStyle('C3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('D3',utf8_encode('CONSORCIO VEOLIA PROACTIVA'));
$objPHPExcel->getActiveSheet()->getStyle('D3')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->setCellValue('E3',utf8_encode('SUPERVISOR VEOLIA:'));
$objPHPExcel->getActiveSheet()->getStyle('E3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('F3',utf8_encode('KEVIN SANTANA'));
$objPHPExcel->getActiveSheet()->getStyle('F3')->getAlignment()->setWrapText(true);

//=========================
$objPHPExcel->getActiveSheet()->setCellValue('A4','DIRECCIÓN:');
$objPHPExcel->getActiveSheet()->getStyle('A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('B4',utf8_encode($DIRECCION));
$objPHPExcel->getActiveSheet()->setCellValue('C4',utf8_encode('FISCALIZADOR EPAM:'));
$objPHPExcel->getActiveSheet()->getStyle('C4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('D4',utf8_encode('MARCELO FLORES'));
$objPHPExcel->getActiveSheet()->setCellValue('E4',utf8_encode('PLANILLA:'));
$objPHPExcel->getActiveSheet()->getStyle('E4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('F4',utf8_encode($PLANILLA));
//=========================
$objPHPExcel->getActiveSheet()->setCellValue('A5','TRABAJO TRÁMITE SOLICITADO:');
$objPHPExcel->getActiveSheet()->getStyle('A5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->getStyle('A5')->getAlignment()->setWrapText(true);
//$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setCellValue('B5',utf8_encode($TRABAJO_SOLICITADO));
$objPHPExcel->getActiveSheet()->setCellValue('C5','TRABAJO EJECUTADO SOLUCIÓN TÉCNICA:');
$objPHPExcel->getActiveSheet()->getStyle('C5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->getStyle('C5')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('D5:F5');
// add some text
$objPHPExcel->getActiveSheet()->setCellValue('D5',utf8_encode('FUGA EN LA RED DE DISTRIBUCION'));
//=========================
$objPHPExcel->getActiveSheet()->setCellValue('A6',utf8_encode('FECHA SOLICITUD:'));
$objPHPExcel->getActiveSheet()->getStyle('A6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('B6',utf8_encode($FECHA_SOLICITUD));

$objPHPExcel->getActiveSheet()->setCellValue('C6','FECHA SOLUCIÓN TECNICA:');
$objPHPExcel->getActiveSheet()->getStyle('C6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('D6',utf8_encode($FECHA_SOLUCION_TECNICA));

$objPHPExcel->getActiveSheet()->setCellValue('E6','FECHA DE FINALIZACIÓN:');
$objPHPExcel->getActiveSheet()->getStyle('E6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('F6',utf8_encode($FECHA_FINALIZACION));

//=========================ALINEACIÓN
$objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT));
$objPHPExcel->getActiveSheet()->getStyle('C6')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT));
$objPHPExcel->getActiveSheet()->getStyle('E6')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT));
$objPHPExcel->getActiveSheet()->getStyle('B6')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));
$objPHPExcel->getActiveSheet()->getStyle('D6')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));
$objPHPExcel->getActiveSheet()->getStyle('F6')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));

//=========================
$objPHPExcel->getActiveSheet()->mergeCells('A7:F7');
$objPHPExcel->getActiveSheet()->setCellValue('A7','');

//=========================
$objPHPExcel->getActiveSheet()->getStyle('A8:F8')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A8')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
$objPHPExcel->getActiveSheet()->getStyle('B8')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
$objPHPExcel->getActiveSheet()->getStyle('C8')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
$objPHPExcel->getActiveSheet()->getStyle('D8')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
$objPHPExcel->getActiveSheet()->getStyle('E8')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
$objPHPExcel->getActiveSheet()->getStyle('F8')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
// alineación detalle
$objPHPExcel->getActiveSheet()->getStyle('C9:F23')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));
$objPHPExcel->getActiveSheet()->getStyle('F1:F26')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT));

$objPHPExcel->getActiveSheet()->setCellValue('A8','CÓDIGO');
$objPHPExcel->getActiveSheet()->setCellValue('B8','DESCRIPCIÓN DEL RUBRO');
$objPHPExcel->getActiveSheet()->setCellValue('C8',utf8_encode('UNIDAD'));
$objPHPExcel->getActiveSheet()->setCellValue('D8',utf8_encode('CANTIDAD'));
$objPHPExcel->getActiveSheet()->setCellValue('E8',utf8_encode('PRECIO UNITARIO'));
$objPHPExcel->getActiveSheet()->setCellValue('F8',utf8_encode('COSTO TOTAL'));
//COLOR GRIS DE LAS CELDAS
$objPHPExcel->getActiveSheet()->getStyle('A8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->getStyle('B8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->getStyle('C8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->getStyle('D8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->getStyle('E8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->getStyle('F8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');

//DETALLE DEL FORMATO

$objPHPExcel->getActiveSheet()->setCellValue('A8','CÓDIGO');
$objPHPExcel->getActiveSheet()->setCellValue('B8','DESCRIPCIÓN DEL RUBRO');
$objPHPExcel->getActiveSheet()->setCellValue('C8','UNIDAD');
$objPHPExcel->getActiveSheet()->setCellValue('D8','CANTIDAD');
$objPHPExcel->getActiveSheet()->setCellValue('E8','PRECIO UNITARIO');
$objPHPExcel->getActiveSheet()->setCellValue('F8','COSTO TOTAL');
/*
HORIZONTAL_CENTER
HORIZONTAL_CENTER_CONTINUOUS
HORIZONTAL_GENERAL
HORIZONTAL_JUSTIFY
HORIZONTAL_LEFT
HORIZONTAL_RIGHT
VERTICAL_BOTTOM
VERTICAL_CENTER
VERTICAL_JUSTIFY
VERTICAL_TOP
 * */
//PIE DEL FORMATO
$objPHPExcel->getActiveSheet()->getStyle('A24')->getAlignment()->applyFromArray(
		array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_TOP,
			'rotation'   => 0,
			'wrap'       => true
		)
);
$objPHPExcel->getActiveSheet()->getStyle('C24')->getAlignment()->applyFromArray(
		array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_BOTTOM,
			'rotation'   => 0,
			'wrap'       => true
		)
);
$objPHPExcel->getActiveSheet()->getStyle('D24')->getAlignment()->applyFromArray(
		array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_BOTTOM,
			'rotation'   => 0,
			'wrap'       => true
		)
);



if(isset($ID_ORDEN)){
    $idOrden = $ID_ORDEN;
	//$idOrden=146291;
    // print_r($idOrden);
    $DOCUMENT_ORIGIN = CURSOROR;


    $session = new Database();//session is at default constructor.
    $parametros = $session->getSession('Amb');
    $pos = strpos($parametros,'/');

    $idEmpresa = substr($parametros,$pos+1,1);  // bcd   1/1/1

    $parametros = substr($parametros,$pos+1);  // bcd   1/1/1
    $pos = strpos($parametros,'/');

    $idInstancia = substr($parametros,$pos+1,1);  // bcd   1/1

    $regCredencialesWS = $credencialesWS->obtieneIdCredencialWS($idEmpresa,$idInstancia);

    $idCredencialWS=$regCredencialesWS['id_credencial'];
    $idUsuarioWS=$regCredencialesWS['usuario'];
    $idContraseniaWS=$regCredencialesWS['contrasenia'];
    $instanciaWS=$regCredencialesWS['instancia'];
    $serviceName = $metodosWS->obtieneMetodoOrden($idCredencialWS,'DETALLEORDEN');
    $ip = $vinstanciaWS->obtieneIpInstanciaWS($idInstancia,$idEmpresa);

    //$SERVICE_NAME1 = DETALLEORDEN;
    $params1 = array('INUORDERID' => $idOrden);
    //$resultado1 = execute_ws($SERVICE_NAME1, $params1, $DOCUMENT_ORIGIN);
    $resultado1 = execute_ws($serviceName['metodo'], $params1, $DOCUMENT_ORIGIN,$idUsuarioWS,$idContraseniaWS,$instanciaWS,$ip['ip']);





    /*
    $SERVICE_NAME2 = IMAGENES;
    $params2 = array('INUCODIGO' => $idOrden,
	'ISOBJECTO' => 'OR_ORDER');
    $resultado2 = execute_ws($SERVICE_NAME2, $params2, $DOCUMENT_ORIGIN);*/


	if ($resultado1){
		/***************/
		$CONT=8;
		$SUMATORIA=0;
		$IVA=0;
		$TOTAL=0;
		foreach($resultado1 as $valor):
			if($idOrden== $valor['ORDER_ID']){
				$CONT=$CONT+1;
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$CONT,$valor['CODIGO_ITEM']);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$CONT,$valor['DESCRIPCION_RUBRO']);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$CONT,utf8_encode($valor['UNIDAD']));
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$CONT,utf8_encode(number_format($valor['CANTIDAD'], 2, '.', ',')));
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$CONT,utf8_encode(number_format($valor['VALOR'], 2, '.', ',')));
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$CONT,utf8_encode(number_format($valor['VALOR_TOTAL'], 2, '.', ',')));
				$SUMATORIA=$SUMATORIA+$valor['VALOR_TOTAL'];


			}



			/* $valor['ORDEN_ORIGEN'];
			$valor['ORDER_ID'];
			$valor['ID_ITEM']
			$valor['CODIGO_ITEM']
			$valor['ASSIGNED_DATE'];*/


		endforeach;
		//$IVA=$SUMATORIA*0.12;
		$TOTAL=$SUMATORIA+$IVA;



		/*****************/

	}

}


$objPHPExcel->getActiveSheet()->getStyle('B9')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B10')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B11')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B13')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B14')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B15')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B16')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B17')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B18')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B19')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B19')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B20')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B21')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B22')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B23')->getAlignment()->setWrapText(true);



$objPHPExcel->getActiveSheet()->mergeCells('A24:B26');
$objPHPExcel->getActiveSheet()->setCellValue('A24','OBSERVACIÓN');
$objPHPExcel->getActiveSheet()->mergeCells('C24:C26');
$objPHPExcel->getActiveSheet()->setCellValue('C24',utf8_encode("SUPERVISOR VEOLIA ".PHP_EOL."KEVIN SANTANA"));//".PHP_EOL."
$objPHPExcel->getActiveSheet()->getStyle('C5')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('D24:D26');
$objPHPExcel->getActiveSheet()->setCellValue('D24',utf8_encode("FISCALIZADOR EPAM ".PHP_EOL."MARCELO FLORES"));
$objPHPExcel->getActiveSheet()->getStyle('C5')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->setCellValue('E24',utf8_encode('COSTO TOTAL:'));
$objPHPExcel->getActiveSheet()->getStyle('E24')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('F24',utf8_encode(number_format($SUMATORIA, 2, '.', ',')));
//======

$objPHPExcel->getActiveSheet()->setCellValue('E25',utf8_encode('I.V.A.(12%):'));
$objPHPExcel->getActiveSheet()->getStyle('E25')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('F25',utf8_encode(number_format($IVA, 2, '.', ',')));
//======
$objPHPExcel->getActiveSheet()->setCellValue('E26',utf8_encode('COSTO TOTAL OT:'));
$objPHPExcel->getActiveSheet()->getStyle('E26')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7B7B1');
$objPHPExcel->getActiveSheet()->setCellValue('F26',utf8_encode(number_format($TOTAL, 2, '.', ',')));
$objPHPExcel->getActiveSheet()->getStyle('F26')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('E2EA2A');
$objPHPExcel->getActiveSheet()->getStyle('F9:F26')->getNumberFormat()->setFormatCode('$#,##0.00');
$objPHPExcel->getActiveSheet()->getStyle('E9:E23')->getNumberFormat()->setFormatCode('$#,##0.00');
$objPHPExcel->getActiveSheet()->getStyle('D9:D23')->getNumberFormat()->setFormatCode('$#,##0.00');




if(file_exists('../dist/img/epam_veo.png'))
{
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath('../dist/img/epam_veo.png');
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
   // $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(25);
	$objDrawing->setHeight(100);
}
else
{
    $objPHPExcel->getActiveSheet()->setCellValue('A1','Problemas al cargar la imagen, verificar la ruta.');
}




//Configurar de Area debug_backtrace impresion  $objPHPExcel->getActiveSheet()->getPageSetup()->setPrintArea('A1:E5,G4:M20');
//$objPHPExcel->getActiveSheet()->getPageSetup()->setPrintArea('A1:F26');
$objPHPExcel->getActiveSheet() ->getPageSetup() ->setPrintArea('A1:F26');

/// margenes
$objPHPExcel->getActiveSheet() ->getPageMargins()->setTop(0.787402);
$objPHPExcel->getActiveSheet() ->getPageMargins()->setRight(0);
$objPHPExcel->getActiveSheet() ->getPageMargins()->setLeft(0);
$objPHPExcel->getActiveSheet() ->getPageMargins()->setBottom(0.590551);






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
$objPHPExcel->getActiveSheet()->setTitle('CONSULTA LIQUIDACIÓN');
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;image/jpeg; charset=UTF-8');
header('Content-Disposition: attachment;filename="Planilla #'.$PLANILLA.'.xlsx"');
header('Cache-Control: max-age=0');

// Add a drawing to the worksheetecho date('H:i:s') . " Add a drawing to the worksheet\n";
/*
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('test_img');
$objDrawing->setDescription('test_img');
$objDrawing->setPath('http://modelofm.com/wp-content/uploads/2018/03/epam-veolia.jpg');
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('PHPExcel image');
$objDrawing->setDescription('PHPExcel image');
$objDrawing->setPath("");
$objDrawing->setHeight(100);
$objDrawing->setCoordinates('A1');
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setOffsetX(100);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());*/

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
