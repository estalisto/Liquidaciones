<?php

/* * ****************************************************************************************
  Nombre:cls_menu.php
  Copyright de la Empresa: Interagua o IWS
  Fecha de puesta en produccion: 
  Fecha fin de la programacion:
  Autor: Alejandro Zambrano
  Referencia: 
  Descripción General:Construir el menu segun por la configuracion de su Perfil
  Descripción Detallada:Construir el menu segun por la configuracion de su Perfil
  Explicación de variables de entrada y de salida:NO APLICA
 * ***************************************************************************************** */
require_once('database/Database.php');
require_once('interface/iMenu.php');

class Menu extends Database implements iMenu {
    
public function f_obtener_menu($Cod_User) {
    //$Cod_User='RCASTRO';
    $sql = "select distinct a.id_menu, a.descripcion, a.orden
from am_menu a, am_usuarios_roles b, am_roles_menu c
where a.id_menu = c.id_menu
and c.id_rol = b.id_rol
and b.id_usuario = upper(?)
and a.activo = 'S'
and a.id_menu = c.id_menu
and a.id_menu_padre is null
order by a.orden ";
        
return $this->getRows($sql, [$Cod_User]);
//return $this->insertRow($sql, [$type, $price]);
}

    public function f_obtener_submenu($Cod_User, $Cod_Idmenu) {
        //$Cod_User='RCASTRO';
            $sql = "select distinct (c.sub_menu), a.descripcion, a.enlace_url, a.orden
  from am_menu a, am_usuarios_roles b, am_roles_menu c
 where a.id_menu = c.sub_menu
   and c.id_rol = b.id_rol
   and b.id_usuario = upper(?)
   and a.activo = 'S'
   and c.activo = 'S'
   and a.id_menu_padre = ?
 order by a.orden";
 return $this->getRows($sql, [$Cod_User,$Cod_Idmenu]);
            
 }   
          
        
}//end class


$menu = new Menu();


?>