<?php
include_once("../../login/check.php");
extract($_POST);
$codusuarios=$_POST['codusuarios'];

include_once("../../class/usuario.php");
$usu=new usuario;
$valores=array("usuario"=>"'$usuario'",
                
                "nombre"=>"'$nombre'",
                "paterno"=>"'$paterno'",
                "materno"=>"'$materno'",
                "ci"=>"'$ci'",
                "direccion"=>"'$direccion'",
                "telefono"=>"'$telefono'",
                "email"=>"'$email'",
                "celular"=>"'$celular'",
                "cargo"=>"'$cargo'",
                
                "nivel"=>"'$nivel'",
                "obs"=>"'$obs'",
                );
if($password!=""){
    $valores["password"]="MD5('$password')";
}
$usu->actualizarRegistro($valores,"codusuarios=".$codusuarios);

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
                        <h5>Su Usuario se Registro Correctamente</h5>
                        <a href="listar.php" class="btn btn-success">Listar testimonios</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php include_once($folder."pie.php");?>