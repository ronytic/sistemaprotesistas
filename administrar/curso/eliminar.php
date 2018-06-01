<?php
include_once("../../login/check.php");
$folder="../../";

$codcursos=$_POST['codcursos'];
include_once("../../class/cursos.php");
$cursos=new cursos;
$col=$cursos->eliminarRegistro("codcursos=".$codcursos);

?>