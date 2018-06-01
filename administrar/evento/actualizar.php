<?php
include_once("../../login/check.php");
$nombre=$_POST['nombre'];
$fechainicio=$_POST['fechainicio'];
$direccion=$_POST['direccion'];

$codeventos=$_POST['codeventos'];

include_once("../../class/eventos.php");
$eventos=new eventos;
$valores=array("nombre"=>"'$nombre'",
                "fechainicio"=>"'$fechainicio'",
                "direccion"=>"'$direccion'",
            );
if($_FILES['imagen']['name']!=""){

    $nombrearchivo=str_ireplace(" ","_",$_FILES['imagen']['name']);
    @copy($_FILES['imagen']['tmp_name'],"../../imagenes/eventos/".$nombrearchivo);    
    $imagen=$nombrearchivo;
    $valores['imagen']="'$imagen'";
}
$eventos->actualizarRegistro($valores,"codeventos=".$codeventos);

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
                        <h5>Su Evento se Actualizo Correctamente</h5>
                        <a href="listar.php" class="btn btn-success">Listar Eventos</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php include_once($folder."pie.php");?>