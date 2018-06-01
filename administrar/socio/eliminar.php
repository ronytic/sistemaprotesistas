<?php
include_once("../../login/check.php");
$folder="../../";

$codsocio=$_POST['codsocio'];
include_once("../../class/socio.php");
$socio=new socio;
$col=$socio->eliminarRegistro("codsocio=".$codsocio);

?>