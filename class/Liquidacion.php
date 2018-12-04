<?php

require_once('../database/Database.php');
require_once('../interface/iLiquidacion.php');

class Liquidacion extends Database implements iLiquidacion {

    public $usuario = '';
    public $fecha = '';
    public $sessions = '';

    public function obtiAuditorias() {
        $session = new Database(); //session is at default   
        $this->usuario = $session->getSession('User');
        date_default_timezone_set('America/Lima');
        $this->fecha = date("Y-m-d H:i:s"); //aqui la fecha actual 
        $this->sessions = $session;
    }

    public function obtieneParametros() {
        $Sql = "select a.SECUENCIA, 
                     a.PLANILLA, 
                     a.FECHA_INICIO, 
                     a.FECHA_FIN,
                     a.CONTRATISTA,
                     a.FISCALIZADOR_EPAM, 
                     a.SUPERVSOR_VEOLIA,
                     a.CONTRATO,
                     a.ESTADO,
                     IF (a.ESTADO='A','ACTIVO','INACTIVO') ESTADO_L,
                     a.FECHA_CREA,
                     a.USUARIO_CREA,
                     a.FECHA_ACTUALIZA,
                     a.USUARIO_ACTUALIZA
                from cn_parametros_liquidacion a
                     where a.estado ='A'";
        return $this->getRows($Sql);
    }

    public function obtienePlanilla($idSecuencia) {
        $Sql = "select a.SECUENCIA, 
                     a.PLANILLA, 
                     a.FECHA_INICIO, 
                     a.FECHA_FIN, 
                     a.CONTRATISTA,
                     a.FISCALIZADOR_EPAM, 
                     a.SUPERVSOR_VEOLIA,
                     a.CONTRATO,
                     a.ESTADO,
                     IF (a.ESTADO='A','ACTIVO','INACTIVO') ESTADO_L,
                     a.FECHA_CREA,
                     a.USUARIO_CREA,
                     a.FECHA_ACTUALIZA,
                     a.USUARIO_ACTUALIZA
                from cn_parametros_liquidacion a
                 where a.SECUENCIA = ?";
        return $this->getRow($Sql, [$idSecuencia]);
    }

    public function insertaPlanillas($empresa,$planilla, $fechaInicio, $fechaFin,$contratista,$fiscalizadorEPAM, $supervisorVeolia, $contrato, $Estado) {
        $this->obtiAuditorias();
        $sql = "INSERT INTO cn_parametros_liquidacion (ID_EMPRESA,
						       PLANILLA,
                                                       FECHA_INICIO,
                                                       FECHA_FIN,
                                                       CONTRATISTA,
                                                       FISCALIZADOR_EPAM,
                                                       SUPERVSOR_VEOLIA,
                                                       CONTRATO,
                                                       ESTADO,
                                                       FECHA_CREA,
                                                       USUARIO_CREA)
                                           VALUES(?,?,?,?,?,?,?,?,?,?,?)";

        return $this->insertRow($sql, [$empresa,$planilla, $fechaInicio, $fechaFin,$contratista, $fiscalizadorEPAM, $supervisorVeolia, $contrato, $Estado, $this->fecha, $this->usuario]);
    }

    public function actualizaPlanilla($planilla, $fechaInicio, $fechaFin, $fiscalizadorEPAM, $supervisorVeolia, $contrato,$contratista, $idSecuencia) {
        $this->obtiAuditorias();

        $sql = "update cn_parametros_liquidacion
                        set PLANILLA=?,
                            FECHA_INICIO=?,
                            FECHA_FIN=?,
                            FISCALIZADOR_EPAM=?,
                            SUPERVSOR_VEOLIA=?,
                            CONTRATO=?,
                            CONTRATISTA=?,
                            FECHA_ACTUALIZA =?,
                            USUARIO_ACTUALIZA = ?                            
                      where secuencia = ?";

        return $this->updateRow($sql, [$planilla, $fechaInicio, $fechaFin, $fiscalizadorEPAM, $supervisorVeolia, $contrato,$contratista, $this->fecha, $this->usuario, $idSecuencia]);
    }

    public function verificaPlanillaRepetida($planilla, $fechaInicio, $fechaFin, $contrato) {

        $Sql = "select count(*) cantidad
                from cn_parametros_liquidacion a 
               where a.PLANILLA =  ?
                /* and a.FECHA_INICIO = ?
                 and a.FECHA_FIN = ?*/
		 and ( ? between a.FECHA_INICIO and a.FECHA_FIN)
                 and a.CONTRATO = ? ";

        return $this->getRow($Sql, [$planilla, $fechaInicio, $contrato]);
    }

    public function obtieneListaPlanillas() {
        $Sql = "select a.SECUENCIA,
                         a.PLANILLA, 
                         DATE_FORMAT(a.FECHA_INICIO,'%Y%m%d') FECHA_INICIO, 
                         DATE_FORMAT(a.FECHA_FIN,'%Y%m%d') FECHA_FIN,  
                         a.CONTRATO
                    from cn_parametros_liquidacion a 
                   where a.ESTADO = 'A'";
        return $this->getRows($Sql);
    }
    
    public function obtieneListaPlanillasId($idSecuencia) {
        $Sql = "select a.PLANILLA, 
                       a.FECHA_INICIO, 
                       a.FECHA_FIN,  
                       a.CONTRATO
                  from cn_parametros_liquidacion a 
                 where a.SECUENCIA = ?
                   and a.ESTADO = 'A'";
    return $this->getRow($Sql, [$idSecuencia]);
    }

    public function obtieneListaAmbientes(){
        $Sql = "select CONCAT(a.id_pais,'/', b.id_empresa,'/',c.id_instancia) ID ,
		 CONCAT(a.Descripcion,'/',  b.nombre,'/',c.codigo) DESCRIPCION 
                from am_pais a, am_empresa b, am_instancia c 
               where a.id_pais = b.id_pais 
                 and c.id_empresa = b.id_empresa
                 and a.estado= 'A' and b.estado = 'A'";
        return $this->getRows($Sql);
    }

}

$liquidacion = new Liquidacion();
