<?php
include_once("../../login/check.php");
include_once("../../class/cursosinscritos.php");

$codcursos=$_POST['codcursos'];
$codsocio=$_POST['codsocio'];
$valores=array("codcursos"=>$codcursos,"codsocio"=>$codsocio);
$cursosinscritos=new cursosinscritos;
$curins=$cursosinscritos->insertarRegistro($valores);
?>