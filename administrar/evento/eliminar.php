<?php
include_once("../../login/check.php");
$folder="../../";

$codeventos=$_POST['codeventos'];
include_once("../../class/eventos.php");
$eventos=new eventos;
$eve=$eventos->eliminarRegistro("codeventos=".$codeventos);

?>