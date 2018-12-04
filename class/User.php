<?php

require_once('../database/Database.php');
require_once('../interface/iUser.php');

class User extends Database implements iUser {

    public $usuario = '';
    public $fecha = '';

    public function obtiAuditorias() {
        $session = new Database(); //session is at default   
        $this->usuario = $session->getSession('User');
        date_default_timezone_set('America/Lima');
        $this->fecha = date("Y-m-d H:i:s"); //aqui la fecha actual 
    }

    public function login($username, $password) {
        $sql = "SELECT * 
				FROM am_usuarios
				WHERE id_usuario = ?
				AND palabra_clave = ?
				LIMIT 1";
        return $this->getRow($sql, [$username, $password]);
    }

//end login

    public function change_pass($pwd, $usu/* , $uid */) {
        $usuario = $usu;
        if ($usuario == '') {
            $this->obtiAuditorias();
            $usuario = $this->usuario;
        }

        $sql = "UPDATE am_usuarios 
				SET palabra_clave = ?
				WHERE id_usuario = ?";
        return $this->updateRow($sql, [$pwd, $usuario]);
    }

//end change_pass

    public function email($email/* , $uid */) {
        $sql = " select id_usuario,
                           nombre_usuario,
                           e_mail 
                      from am_usuarios 
                     where e_mail = ? ";
        return $this->getRow($sql, [$email]);
    }

    public function inserta_am_recupera_pass($idUsuario, $nombre, $token) {
        date_default_timezone_set('America/Lima');
        $this->fecha = date("Y-m-d H:i:s"); //aqui la fecha actual 
        $sql = "INSERT INTO am_recupera_pass (idUsuario,
                                                  nombre,
                                                  token,
                                                  creado)
                                    VALUES(?,?,?,?)";

        return $this->insertRow($sql, [$idUsuario, $nombre, $token, $this->fecha]);
    }

    public function obtieneCredenciales($token) {
        $sql = " select idUsuario, 
                           token  
                      from am_recupera_pass 
                     where token = ? ";
        return $this->getRow($sql, [$token]);
    }

    public function obtieneUsuarios() {
        $sql = " select id_usuario,
		 nombre_usuario,
		 palabra_clave,
		 estado,
		 estatus,
		 departamento,
		 orden_precedencia,
		 id_tipo_identificacion,
		 id_identificacion,
		 id_codigo_empleado,
		 e_mail		 
            from am_usuarios";
        return $this->getRows($sql);
    }

    public function validaCamposUsuarios($identificacion, $idEmpleado, $usuario, $correo) {
        
        $sql = " SELECT id_usuario
                   FROM AM_USUARIOS 
                  WHERE id_codigo_empleado = ?
                  union 
                 SELECT id_usuario
                   FROM AM_USUARIOS 
                  WHERE id_usuario = ?
                 union 
                 SELECT id_usuario
                   FROM AM_USUARIOS 
                  WHERE e_mail = ? 
                  union 
                 SELECT id_usuario
                   FROM AM_USUARIOS 
                  WHERE id_identificacion = ? ";
        
        return $this->getRows($sql, [$idEmpleado, $usuario, $correo, $identificacion]);
    }

}

//end class
$user = new User();
/* End of file User.php */
/* Location: .//D/xampp/htdocs/laundry/class/User.php */