<?php
interface iLiquidacion{
   public function obtieneParametros();
   public function obtienePlanilla($idSecuencia);
   public function insertaPlanillas($empresa,$planilla, $fechaInicio, $fechaFin,$contratista,$fiscalizadorEPAM,$supervisorVeolia, $contrato, $Estado);
   public function actualizaPlanilla($planilla, $fechaInicio, $fechaFin, $fiscalizadorEPAM,$supervisorVeolia, $contrato,$contratista,$idSecuencia);
   public function verificaPlanillaRepetida($planilla, $fechaInicio, $fechaFin,$contrato);
   public function obtieneListaPlanillas();
   public function obtieneListaPlanillasId($idSecuencia);
   public function obtieneListaAmbientes();
}