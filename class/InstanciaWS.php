<?php

require_once('../database/Database.php');
require_once('../interface/iInstanciaWS.php');

class InstanciaWS extends Database implements iInstanciaWS {

    public $usuario = '';
    public $fecha = '';

    public function obtiAuditorias() {
        $session = new Database(); //session is at default   
        $this->usuario = $session->getSession('User');
        date_default_timezone_set('America/Lima');
        $this->fecha = date("Y-m-d H:i:s"); //aqui la fecha actual 
    }

    
    public function obtieneIpInstanciaWS($idInstancia,$idEmpresa) {
        
        $sql = "select i.ip
                    from am_instancia i
                   where i.id_instancia = ?
                     and i.id_empresa = ?
                     and i.estado = 'A'";
        
        return $this->getRow($sql, [$idInstancia,$idEmpresa]);
    }

}

//end class
$vinstanciaWS= new InstanciaWS();
/* End of file User.php */
/* Location: .//D/xampp/htdocs/laundry/class/User.php  */ 