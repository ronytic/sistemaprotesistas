<?php
include_once("../../login/check.php");
extract($_POST);

include_once("../../class/usuario.php");
$usu=new usuario;
$valores=array("usuario"=>"'$usuario'",
                "password"=>"MD5('$password')",
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
$usu->insertarRegistro($valores);
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
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php include_once($folder."pie.php");?>