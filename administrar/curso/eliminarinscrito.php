<?php
include_once("../../login/check.php");
$folder="../../";

$codcursosinscritos=$_POST['codcursosinscritos'];
include_once("../../class/cursosinscritos.php");
$cursosinscritos=new cursosinscritos;
$col=$cursosinscritos->eliminarRegistro("codcursosinscritos=".$codcursosinscritos);

?>