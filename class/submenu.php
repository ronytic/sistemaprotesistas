<?php
include_once("bd.php");
class submenu extends bd{
	var $tabla="submenu";
	function mostrar($Nivel,$Menu){
		$this->campos=array('nombre','url');
		switch($Nivel){
			case "1":{return $this->getRecords(" superadmin=1 and codmenu=$Menu and activo=1","orden");}break;
			case "2":{return $this->getRecords(" presidente=1 and codmenu=$Menu and activo=1","orden");}break;
			case "3":{return $this->getRecords(" presidentefilial=1 and codmenu=$Menu and activo=1","orden");}break;
			case "4":{return $this->getRecords(" secretaria=1 and codmenu=$Menu and activo=1","orden");}break;
        }
	}
}
?>