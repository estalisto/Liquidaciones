<?php

require_once('../database/Database.php');
require_once('../interface/iCredencialesWS.php');

class CredencialesWS extends Database implements iCredencialesWS {

    public $usuario = '';
    public $fecha = '';

    public function obtiAuditorias() {
        $session = new Database(); //session is at default   
        $this->usuario = $session->getSession('User');
        date_default_timezone_set('America/Lima');
        $this->fecha = date("Y-m-d H:i:s"); //aqui la fecha actual 
    }

    
    public function obtieneIdCredencialWS($idEmpresa,$idInstancia) {
        
        $sql = "select c.id_credencial,
                       c.usuario,
                       c.contrasenia,
                       c.instancia 
                    from am_credenciales c 
                   where c.id_empresa = ? 
                     and c.id_instancia = ?
                     and c.estado ='A' ;";
        
        return $this->getRow($sql, [$idEmpresa,$idInstancia]);
    }

}

//end class
$credencialesWS = new CredencialesWS();
/* End of file User.php */
/* Location: .//D/xampp/htdocs/laundry/class/User.php */