<?php
include_once("../../login/check.php");
$nombre=$_POST['nombre'];
$fechainicio=$_POST['fechainicio'];
$direccion=$_POST['direccion'];
$descripcion=$_POST['descripcion'];


if($_FILES['imagen']['name']!=""){

    $nombrearchivo=str_ireplace(" ","_",$_FILES['imagen']['name']);
    @copy($_FILES['imagen']['tmp_name'],"../../imagenes/cursos/".$nombrearchivo);    
    $imagen=$nombrearchivo;
}


include_once("../../class/cursos.php");
$cursos=new cursos;
$valores=array("nombre"=>"'$nombre'",
                "fechainicio"=>"'$fechainicio'",
                "direccion"=>"'$direccion'",
				"descripcion"=>"'$descripcion'",
                "imagen"=>"'$imagen'",
				
				
            );
$cursos->insertarRegistro($valores);
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
                        <h5>Su Curso se Registro Correctamente</h5>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php include_once($folder."pie.php");?>