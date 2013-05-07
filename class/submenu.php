<?php 
include_once("bd.php");
class submenu extends bd{
	var $tabla="submenu";
	function mostrarSubMenu($codNivel,$menu){
		$this->campos=array("*");
		switch ($codNivel) {
			case 1:{return $this->getRecords("superadmin=1 and codmenu=$menu and activo=1","orden");}break;
			case 2:{return $this->getRecords("administrador=1 and codmenu=$menu and activo=1","orden");}break;
			case 3:{return $this->getRecords("secretaria=1 and codmenu=$menu and activo=1","orden");}break;
			case 4:{return $this->getRecords("tecnico=1 and codmenu=$menu and activo=1","orden");}break;
			
		}
	}
}
?>