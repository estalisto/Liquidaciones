<?php

class Session{
    // iniciamos la secion
    static function start()
    {
         if(session_status() == PHP_SESSION_NONE)
	   {
	      session_start();//start session if session not start
	    }
    }
    // obtenemos el valor de uno de los indices de la session
    static function getSession($name){
        return $_SESSION[$name];
    }
    // inicializamos un valor
    static function setSession($name,$data){
        $_SESSION[$name]=$data;
    }    
    // destruye la session
    static function destroy(){
//        @session_destroy();
        session_destroy();

    }
    
    public function Disconnect(){
		$this->datab = NULL;//close connection in PDO
		$this->isConn = FALSE;
	}//endDisconnectFunction


}

?>