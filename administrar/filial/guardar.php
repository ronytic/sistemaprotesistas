<?php
include_once("../../login/check.php");
$nombre=$_POST['nombre'];
$fechafundacion=$_POST['fechafundacion'];
$presidente=$_POST['presidente'];
$direccion=$_POST['direccion'];




include_once("../../class/filial.php");
$filial=new filial;
$valores=array("nombre"=>"'$nombre'",
                "fechafundacion"=>"'$fechafundacion'",
                "presidente"=>"'$presidente'",
				"direccion"=>"'$direccion'",
            );
$filial->insertarRegistro($valores);
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
                        <h5>Su Filial se Registro Correctamente</h5>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php include_once($folder."pie.php");?>