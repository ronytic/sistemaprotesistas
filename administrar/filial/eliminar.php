<?php
include_once("../../login/check.php");
$folder="../../";

$codfilial=$_POST['codfilial'];
include_once("../../class/filial.php");
$filial=new filial;
$col=$filial->eliminarRegistro("codfilial=".$codfilial);

?>