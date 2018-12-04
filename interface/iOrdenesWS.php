<?php 
interface iOrdenesWS{
   /* public function insertarOrdenes($idActa);
    public function obtieneOrdenes($idActa);*/
    public function insertarOrdenesWS($idEmpresa,$id_orden, $id_secuencia, $idTrabSolicitud, $planilla, $contratista, 
            $supervisor_veolia,$fiscalizador_epam, $direccion,$trabajo_solicitado,$fecha_solicitud,
            $solucion_tecnica,$fecha_solucion_tecnica,$fecha_finalizacion);
   public function obtieneOrdenesIdWS($idSecuencia);
   public function obtieneOrdenesWS();
   public function eliminaOrdenesWS($idSecuencia);
   public function obtieneOrdenesIdOrdWS($idOrden);
}//end i