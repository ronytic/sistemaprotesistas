<?php
session_start();
include_once("../configuracion.php");
include_once("../funciones/url.php");
foreach($_SESSION as $k=>$v){
	unset($_SESSION[$k]);
}
unset($_SESSION["login"]);
unset($_SESSION["CodUsuarioLog"]);
unset($_SESSION["Nivel"]);
unset($_SESSION["LoginSistema"]);
session_destroy();
header("Location:".url_base().$directory);
?>