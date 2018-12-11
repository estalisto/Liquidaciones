<?php

class Minstancias extends CI_Model
{

    
     public function consultar(){

        $query = $this->db->get('am_instancia');
		return $query->result();
      
        
    }
public function getInstancias(){
                 $this->db->select('codigo, descripcion');
        $query = $this->db->get('am_instancia');
		return $query->result();
	}

}

/*

CREATE TABLE `persona` (
  `id` INT(11) NOT NULL,
  `nombres_completos` VARCHAR(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` VARCHAR(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` VARCHAR(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

*/
?>