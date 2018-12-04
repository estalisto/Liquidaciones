<?php 
interface iMenu{
	public function f_obtener_menu($Cod_User);
        public function f_obtener_submenu($Cod_User, $Cod_Idmenu);
}//end iSales