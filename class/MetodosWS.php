<?php

require_once('../database/Database.php');
require_once('../interface/iMetodosWS.php');

class MetodosWS extends Database implements iMetodosWS {

    public $usuario = '';
    public $fecha = '';

    public function obtiAuditorias() {
        $session = new Database(); //session is at default   
        $this->usuario = $session->getSession('User');
        date_default_timezone_set('America/Lima');
        $this->fecha = date("Y-m-d H:i:s"); //aqui la fecha actual 
    }

    
    public function obtieneMetodoOrden($idCredencial,$variable){
        
        $sql = "select m.metodo
		 from am_metodos_ws m 
		where m.id_credenciales = ?
                 and  m.variable = ?
		  and m.estado = 'A' ";
        
        return $this->getRow($sql, [$idCredencial,$variable]);
    }

}

//end class
$metodosWS = new MetodosWS();
/* End of file User.php */
/* Location: .//D/xampp/htdocs/laundry/class/User.php */