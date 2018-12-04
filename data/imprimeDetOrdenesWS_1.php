<?php

require_once('../lib/pdf/fpdf.php');
require_once('../configuracion/configuracion.php');
require_once('../class/Liquidacion.php');
require_once('../funcionesWS/funcionesConsulta.php');
require_once('../class/OrdenesWS.php');
require_once('../class/CredencialesWS.php');
require_once('../class/MetodosWS.php'); 
require_once('../class/InstanciaWS.php');

if (isset($_POST['select'])) {
    $ordenes = $_POST['select'];
     class PDF extends FPDF {

        //Page header
        function Header() {
            $this->Image('../dist/img/epam_veo.png', 10, 8, 75);
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(180);
            global $title;
           
            $this->Cell(20, 15, 'MANTENIMIENTO DE REDES DE AGUA POTABLE Y ALCANTARILLADO', 0, 2, 'C');
            $this->Cell(20, 0, utf8_decode($title), 0, 2, 'C');

            $this->Ln(10);
            //$this->Cell(80);
            //$this->SetFillColor(2,157,116);//Fondo verde de celda
            //$this->SetTextColor(240, 255, 240); //Letra color blanco
           
            
            $header = array('No.OT:', 'DIRECCIÓN:', 'TRABAJO/TRÁMITE SOLICITADO:', 'FECHA DE SOLICITUD:');
            $llenar = array($GLOBALS['idOrden'], substr($GLOBALS['direccion'],0,50),$GLOBALS['trabajoSol'], $GLOBALS['fechaSol']);
            $header1 = array('CONTRATISTA:', 'FISCALIZADOR:', 'TRABAJO EJEC. / SOL. TÉCNICA:', 'FECHA DE SOL. TÉCNICA');
            $llenar2 = array($GLOBALS['contratista'], $GLOBALS['fiscalizador'],$GLOBALS['trabajoSolTec'], $GLOBALS['fechaSolTec']);
            $header2 = array('SUPERVISOR VEOLIA:', 'PLANILLA:', 'FECHA DE FINALIZACIÓN:');
            $llenar3 = array($GLOBALS['supervisor'], $GLOBALS['planilla'],$GLOBALS['fechaFinaliza']);

            $this->cabeceraV($header, 10, 36);
            $this->LlenaCabV($llenar, 46, 70);

            $this->cabeceraV($header1, 119, 36);
            $this->LlenaCabV($llenar2, 155, 67);

            $this->cabeceraV($header2, 225, 30);
            $this->LlenaCabV($llenar3, 255, 35);
        }

        //Page footer
        function Footer() {
            $this->SetY(-15);
            //nombreImagen             ,horizontal,vertical,zoom
            //  $this->Image('../IMAGENES/logoVeolia.jpg', 170, 275, 30);
            $this->Cell(0,10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
            $this->Cell(0,10, utf8_decode('Fecha de impresión:').date('d/m/Y H:i:s'), 1, 0, 'R'); 
        }

        //Data
        function cabeceraV($cabecera, $pos1, $pos2) {
            $this->SetXY($pos1, 35); //Seleccionamos posición
            $this->SetFont('Arial', 'B', 6); //Fuente, Negrita, tamaño

            $this->SetFillColor(230, 230, 230);

            foreach ($cabecera as $columna) {
                //Parámetro con valor 2, cabecera vertical
                $this->Cell($pos2, 6, utf8_decode($columna), 1, 2, 'R', '1');
                //$this->MultiCell(40, 7, utf8_decode($columna)."\n", 1, 'J', 1, 2, '' ,'', true);
            }
        }

        //Data
        function LlenaCabV($cabecera, $pos1, $pos2) {
            $this->SetXY($pos1, 35); //Seleccionamos posición
            $this->SetFont('Arial', '', 6); //Fuente, Negrita, tamaño

            $this->SetFillColor(230, 230, 230);

            foreach ($cabecera as $columna) {
                //Parámetro con valor 2, cabecera vertical
                $this->Cell($pos2, 6, utf8_decode($columna), 1, 2, 'C');
            }
        }

        function cabeceraH() {

            $this->SetXY(10, 62);

            $this->SetFont('Times', 'B', 8);

            $this->SetFillColor(230, 230, 230);

            $this->Cell(30, 5, utf8_decode('CODIGO RUBRO'), 1, 0, 'C', '1');
            $this->Cell(150, 5, utf8_decode('DESCRIPCION DEL RUBRO'), 1, 0, 'C', '1');
            $this->Cell(20, 5, 'UNIDAD', 1, 0, 'C', '1');
            $this->Cell(20, 5, 'CANTIDAD', 1, 0, 'C', '1');
            $this->Cell(30, 5, 'PRECIO UNITARIO', 1, 0, 'C', '1');
            $this->Cell(30, 5, 'COSTO TOTAL', 1, 0, 'C', '1');
            $this->Ln();
        }

        function cuerpo($ord,$supervisor, $fiscalizador) {
            (FLOAT) $total = 0;
            $this->SetFont('Times', '', 7);
            
            foreach ($ord as $dato):
                $this->Cell(30, 6, utf8_decode(substr($dato['CODIGO_ITEM'], 0, 42)), 1, 0, 'C');
                $this->Cell(150, 6,utf8_decode($dato['DESCRIPCION_RUBRO']), 1, 0, 'L');
                $this->Cell(20, 6, ($dato['UNIDAD']), 1, 0, 'C');
                $this->Cell(20, 6, number_format($dato['CANTIDAD'], 2,',','.'), 1, 0, 'C');
                $this->Cell(30, 6, number_format($dato['VALOR'], 2,',','.'), 1, 0, 'R');
                $this->Cell(30, 6, number_format($dato['VALOR_TOTAL'], 3,',','.'), 1, 0, 'R');
                $this->Ln();
                $total = $total + $dato['VALOR_TOTAL'];
            endforeach;
            $this->FinCuerpo($supervisor, $fiscalizador,$total);
            
        }

        function FinCuerpo($Superv, $Fiscal, $total) {
            $this->SetXY(10, 172); //Seleccionamos posición
            $this->SetFont('Arial', 'B', 6); //Fuente, Negrita, tamaño

            $this->SetFillColor(230, 230, 230);

            $this->Cell(140, 3, 'OBSERVACIONES:', 1, 2, 'L');
            $this->Cell(140, 3, '', 1, 2, 'L');
            $this->Cell(140, 3, '', 1, 2, 'L');
            $this->Cell(140, 3, '', 1, 2, 'L');
            $this->Cell(140, 3, '', 1, 2, 'L');
            $this->SetXY(150, 172); //Seleccionamos posición
            $this->Cell(40, 9, '', 1, 2, 'L');
            $this->Cell(40, 3, 'SUPERVISOR VEOLIA', 1, 2, 'C');
            $this->Cell(40, 3, $Superv, 1, 2, 'C');
            $this->SetXY(190, 172);
            $this->Cell(40, 9, '', 1, 2, 'L');
            $this->Cell(40, 3, 'FISCALIZADOR EPAM', 1, 2, 'C');
            $this->Cell(40, 3, $Fiscal, 1, 2, 'C');
            $this->SetXY(230, 172);
            $this->Cell(30, 5, 'COSTO TOTAL: ', 1, 0, 'L', '1');
            $this->Cell(30, 5, number_format($total,2,',','.'), 1, 2, 'R');
            $this->Cell(-30);
            $this->Cell(30, 5, 'IVA (12%): ', 1, 0, 'L', '1');
            $iva=0;
            $this->Cell(30, 5, number_format($iva,2,',','.'), 1, 2, 'R');
            $this->Cell(-30);
            $CostoTotal = $total + $iva;
            $this->Cell(30, 5, 'COSTO TOTAL OT: ', 1, 0, 'L', '1');
            $this->Cell(30, 5, number_format($total,2,',','.'), 1, 2, 'R');
        }

        function InsertaImg($pos, $imagenes) {
            $cont = 1;
            $contAux = 1;
            $N2 = count($imagenes);
            $hoja = ($N2 / 8);
	    $band = 0;
          
            foreach ($imagenes as $imagen):
                if ($imagen['NAME_URL']) {
                    $img = str_replace("\\", "/", $imagen['NAME_URL']);
                    $img = str_replace('"', '', $img);
		   
                    if ($contAux % 8 == 0) {
                        $band = 1;
                    }


                    if ($cont > 4) {
                        if ($cont == 5) {
                            if (($N2 - $cont + 1) >= 4) {
                                $ini = 10;
                            }if (($N2 - $cont + 1) == 3) {
                                $ini = 40;
                            }if (($N2 - $cont + 1) == 2) {
                                $ini = 80;
                            }if (($N2 - $cont + 1) == 1) {
                                $ini = 110;
                            }
                        }
                        $this->Image($img, $ini, 115, 63);
                    } else {
                        if ($cont == 1) {
                            if ($N2 - $contAux + 1 >= 4) {
                                $ini = 10;
                            }if ($N2 - $contAux + 1 == 3) {
                                $ini = 40;
                            }if ($N2 - $contAux + 1 == 2) {
                                $ini = 80;
                            }if ($N2 - $contAux + 1 == 1) {
                                $ini = 110;
                            }
                        }
                        $this->Image($img, $ini, $pos, 63);
                    }


                    $ini = $ini + 72;
                    $cont = $cont + 1;
                    $contAux = $contAux + 1;

                    if($band==1){
                        $this->AddPage();
                        $cont = 1;
                        $band = 0;
                    }
                }
            endforeach;

            //$this->AddPage();
        }

        function PiePagina($Superv, $Fiscal) {
            $this->SetXY(10, 172); //Seleccionamos posición
            $this->SetFont('Arial', 'B', 6); //Fuente, Negrita, tamaño
            $this->Cell(200, 3, 'OBSERVACIONES:', 1, 2, 'L');
            $this->Cell(200, 3, '', 1, 2, 'L');
            $this->Cell(200, 3, '', 1, 2, 'L');
            $this->Cell(200, 3, '', 1, 2, 'L');
            $this->Cell(200, 3, '', 1, 2, 'L');
            $this->SetXY(210, 172); //Seleccionamos posición
            $this->Cell(40, 9, '', 1, 2, 'L');
            $this->Cell(40, 3, 'SUPERVISOR VEOLIA', 1, 2, 'C');
            $this->Cell(40, 3, $Superv, 1, 2, 'C');
            $this->SetXY(250, 172);
            $this->Cell(40, 9, '', 1, 2, 'L');
            $this->Cell(40, 3, 'FISCALIZADOR EPAM', 1, 2, 'C');
            $this->Cell(40, 3, $Fiscal, 1, 2, 'C');
        }

    }
    if (empty($ordenes)) {
        echo"<script>alert('No existe la(s) órden(es) a consultar')</script>";
        
    } else {
        $N = count($ordenes);
        //echo(" You selected $N reg(s): ");
	$bandera = 0;	
        for ($i = 0; $i < $N; $i++) {
            //echo($ordenes[$i]);
            $idOrden = ($ordenes[$i]);	    
            $DOCUMENT_ORIGIN = CURSOROR;
            
            /*inicio rcb*/
            if ($i==0){
             $session = new Database();//session is at default constructor.
            }
            $parametros = $session->getSession('Amb');
            $pos = strpos($parametros,'/');

            $idEmpresa = substr($parametros,$pos+1,1);  // bcd   1/1/1

            $parametros = substr($parametros,$pos+1);  // bcd   1/1/1
            $pos = strpos($parametros,'/');

            $idInstancia = substr($parametros,$pos+1,1);  // bcd   1/1

            
            if ($i==0){
             $regCredencialesWS = $credencialesWS->obtieneIdCredencialWS($idEmpresa,$idInstancia);
             $idCredencialWS=$regCredencialesWS['id_credencial'];
             $idUsuarioWS=$regCredencialesWS['usuario'];
             $idContraseniaWS=$regCredencialesWS['contrasenia']; 
             $instanciaWS=$regCredencialesWS['instancia']; 
            }
            
            $serviceName = $metodosWS->obtieneMetodoOrden($idCredencialWS,'DETALLEORDEN');
            $ip = $vinstanciaWS->obtieneIpInstanciaWS($idInstancia,$idEmpresa);
            /*fin rcb*/
    
            //$SERVICE_NAME1 = DETALLEORDEN;
            $params1 = array('INUORDERID' => $idOrden);
            //$resultado1 = execute_ws($SERVICE_NAME1, $params1, $DOCUMENT_ORIGIN);
            $resultado1 = execute_ws($serviceName['metodo'], $params1, $DOCUMENT_ORIGIN,$idUsuarioWS,$idContraseniaWS,$instanciaWS,$ip['ip']);
            
            $ordenWS=$ordenesWS->obtieneOrdenesIdOrdWS($idOrden);
            
            foreach ($ordenWS as $k):
                $direccion=$k['DIRECCION'];
                $trabajoSol=$k['TRABAJO_SOLICITADO'];
                $fechaSol=$k['FECHA_SOLICITUD'];
                $fiscalizador=$k['FISCALIZADOR_EPAM'];
                $contratista = $k['CONTRATISTA'];
                $trabajoSolTec = $k['SOLUCION_TECNICA'];
                $fechaSolTec= $k['FECHA_SOLUCION_TECNICA'];
                $supervisor=$k['SUPERVISOR_VEOLIA'];
                $planilla=$k['PLANILLA'];
                $fechaFinaliza=$k['FECHA_FINALIZACION'];   
            endforeach;
            
            
            $serviceName = $metodosWS->obtieneMetodoOrden($idCredencialWS,'IMAGENES');
            //$SERVICE_NAME2 = IMAGENES;
            $params2 = array('INUCODIGO' => $idOrden,
                'ISOBJECTO' => 'OR_ORDER');
          //  $resultado2 = execute_ws($SERVICE_NAME2, $params2, $DOCUMENT_ORIGIN);
            $resultado2 = execute_ws($serviceName['metodo'], $params2, $DOCUMENT_ORIGIN,$idUsuarioWS,$idContraseniaWS,$instanciaWS,$ip['ip']);
            
            if ($resultado1){

                if ($i == 0){
                $pdf = new PDF('l', 'mm', 'A4');
                $pdf->AliasNbPages();
                }
                          
                $pdf->SetDrawColor(128, 128, 128);



                    $title = 'LIQUIDACION DE ORDEN DE TRABAJO';
                    $pdf->SetTitle($title);
                    $pdf->AddPage();

                    $pdf->cabeceraH();
                    $pdf->cuerpo($resultado1,$supervisor, $fiscalizador);

                     if ($resultado2){
                    $title = 'REGISTRO DE ORDEN DE TRABAJO';
                    $pdf->SetTitle($title);
                    $pdf->AddPage();
                    $pdf->InsertaImg(64, $resultado2);                
                    $pdf->PiePagina($supervisor, $fiscalizador);
                     }

                if($i == $N-1){
                    $pdf->Output();
                }
            }  
           /* else {
                
                  echo "<script>
                               alert('No se encuentra información para la(s) órden(es) seleccionada(s)');
                               window.location= 'http://localhost/liquidaciones/consultaOrdenesWS.php'
                        </script>";
               
            } */           
        }
 	
    }
}else{
    
      echo "<script>
                alert('No ha seleccionado la(s) órden(es) a consultar');
                window.location= 'http://10.150.204.38/Liquidaciones/consultaOrdenesWS.php'
            </script>";
  
}


          