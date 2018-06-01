<?php
include_once("../../login/check.php");
$codsocio=$_POST['codsocio'];
$nombres=$_POST['nombres'];
$paterno=$_POST['paterno'];
$materno=$_POST['materno'];
$fechanac=$_POST['fechanac'];
$ci=$_POST['ci'];
$correo=$_POST['correo'];
$lugaregreso=$_POST['lugaregreso'];
$aniotrabajo=$_POST['aniotrabajo'];
$codfilial=$_POST['codfilial'];

include_once("../../class/socio.php");
$socio=new socio;
$valores=array("nombres"=>"'$nombres'",
                "paterno"=>"'$paterno'",
                "materno"=>"'$materno'",
				"fechanac"=>"'$fechanac'",
               "ci"=>"'$ci'",
               "correo"=>"'$correo'",
               "lugaregreso"=>"'$lugaregreso'",
               "aniotrabajo"=>"'$aniotrabajo'",
               "codfilial"=>"'$codfilial'",
            );
if($_FILES['foto']['name']!=""){

    $nombrearchivo=str_ireplace(" ","_",$_FILES['foto']['name']);
    @copy($_FILES['foto']['tmp_name'],"../../imagenes/socios/".$nombrearchivo);    
    $imagen=$nombrearchivo;
    $valores['foto']="'$imagen'";
}
$socio->actualizarRegistro($valores,"codsocio=".$codsocio);

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
                        <h5>Su Socio se Actualizo Correctamente</h5>
                        <a href="listar.php" class="btn btn-success">Listar Socios</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php include_once($folder."pie.php");?>