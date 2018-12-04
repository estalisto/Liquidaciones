<?php
require_once('../database/Database.php');
require_once('../interface/iOrdenesWS.php');

class OrdenesWS extends Database implements iOrdenesWS {

    public function insertarOrdenesWS($idEmpresa,$id_orden, $id_secuencia, $idTrabSolicitud ,$planilla, $contratista, 
            $supervisor_veolia,$fiscalizador_epam, $direccion,$trabajo_solicitado,$fecha_solicitud,
            $solucion_tecnica,$fecha_solucion_tecnica,$fecha_finalizacion) {
        
        $sql= "insert into cn_ordenes_ws (
                ID_EMPRESA,
		ID_ORDEN,
                ID_SECUENCIA,
                ID_TRABAJO_SOLICITUD,
                PLANILLA,
                CONTRATISTA,
                SUPERVISOR_VEOLIA,
                FISCALIZADOR_EPAM,
                DIRECCION,
                TRABAJO_SOLICITADO,
                FECHA_SOLICITUD,
                SOLUCION_TECNICA,
                FECHA_SOLUCION_TECNICA,
                FECHA_FINALIZACION)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              
        return $this->insertRow($sql, [$idEmpresa,$id_orden, $id_secuencia, $idTrabSolicitud, $planilla, $contratista, 
            $supervisor_veolia,$fiscalizador_epam, $direccion,$trabajo_solicitado,$fecha_solicitud,
            $solucion_tecnica,$fecha_solucion_tecnica,$fecha_finalizacion]);
        
       
  
    }
	
    public function obtieneOrdenesIdWS($idSecuencia) {
        $sql= "  SELECT ID_ORDEN,
                        ID_SECUENCIA,
                        PLANILLA,
                        CONTRATISTA,
                        SUPERVISOR_VEOLIA,
                        FISCALIZADOR_EPAM,
                        DIRECCION,
                        TRABAJO_SOLICITADO,
                        FECHA_SOLICITUD,
                        SOLUCION_TECNICA,
                        FECHA_SOLUCION_TECNICA,
                        FECHA_FINALIZACION
                  FROM cn_ordenes_ws
                  where ID_SECUENCIA= ?";

        return $this->getRows($sql, [$idSecuencia]);
    }
    
    public function eliminaOrdenesWS($idSecuencia){
        $sql= " delete from cn_ordenes_ws where ID_SECUENCIA = ?";
        return $this->deleteRow($sql, [$idSecuencia]);
    }
    
     public function obtieneOrdenesWS() {
        $sql= "  SELECT ID_ORDEN,
                        ID_SECUENCIA,
                        ID_TRABAJO_SOLICITUD,
                        PLANILLA,
                        CONTRATISTA,
                        SUPERVISOR_VEOLIA,
                        FISCALIZADOR_EPAM,
                        DIRECCION,
                        TRABAJO_SOLICITADO,
                        FECHA_SOLICITUD,
                        SOLUCION_TECNICA,
                        FECHA_SOLUCION_TECNICA,
                        FECHA_FINALIZACION
                  FROM cn_ordenes_ws";

        return $this->getRows($sql);
    }
    
     public function obtieneOrdenesIdOrdWS($idOrden) {
        $sql= "  SELECT ID_ORDEN,
                        ID_SECUENCIA,
                        PLANILLA,
                        CONTRATISTA,
                        SUPERVISOR_VEOLIA,
                        FISCALIZADOR_EPAM,
                        DIRECCION,
                        TRABAJO_SOLICITADO,
                        FECHA_SOLICITUD,
                        SOLUCION_TECNICA,
                        FECHA_SOLUCION_TECNICA,
                        FECHA_FINALIZACION
                  FROM cn_ordenes_ws
                  where ID_ORDEN= ?";

        return $this->getRows($sql, [$idOrden]);
    }

}//end class
$ordenesWS = new OrdenesWS();
/* End of file Laundry.php */
/* Location: .//D/xampp/htdocs/laundry/class/Laundry.php */