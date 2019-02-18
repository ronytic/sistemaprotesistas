<?php
include_once("../../login/check.php");
$nombre=$_POST['nombre'];
$fechafundacion=$_POST['fechafundacion'];
$presidente=$_POST['presidente'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$codfilial=$_POST['codfilial'];

include_once("../../class/filial.php");
$filial=new filial;
$valores=array("nombre"=>"'$nombre'",
                "fechafundacion"=>"'$fechafundacion'",
                "presidente"=>"'$presidente'",
                "telefono"=>"'$telefono'",
				"direccion"=>"'$direccion'",
            );

$filial->actualizarRegistro($valores,"codfilial=".$codfilial);

$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Mensaje de Confirmación</h2>
            <div class="col-sm-offset-3 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <h5>Su FIlial se Actualizo Correctamente</h5>
                        <a href="listar.php" class="btn btn-success">Listar Filiales</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php include_once($folder."pie.php");?>