<?php 
include_once("bd.php");
class menu extends bd{
	var $tabla="menu";
	function mostrarMenu($codNivel){
		$this->campos=array("*");
		switch ($codNivel) {
			case 1:{return $this->getRecords("superadmin=1 and activo=1");}break;
			case 2:{return $this->getRecords("administrador=1 and activo=1");}break;
			case 3:{return $this->getRecords("secretaria=1 and activo=1");}break;
			case 4:{return $this->getRecords("tenico=1 and activo=1");}break;
		}
	}
}
?>