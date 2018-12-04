<?php 
interface iUser{
	public function login($username, $password);
	public function change_pass($pwd,$usu/*, $uid*/);
        public function email($email/*, $uid*/);
        public function inserta_am_recupera_pass($idUsuario,$nombre,$token);
        public function obtieneCredenciales($token);
        public function obtieneUsuarios();
        public function validaCamposUsuarios($identificacion,$idEmpleado,$usuario,$correo);
}//end iUser