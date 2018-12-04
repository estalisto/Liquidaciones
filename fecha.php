<?php

Class fecha{
    
    public function __construct() {
        
    }
    
    public function obtieneFecha(){
      date_default_timezone_set('America/Lima');
      return  date("Y/m/d H:i:s"); //aqui la fecha actual 
    }
}

?>