<?php
$codeventos=$_GET['c'];
include_once("../../class/eventos.php");
$eventos=new eventos;
$eve=$eventos->mostrarTodoRegistro(" codeventos='$codeventos'",1,"");
$col=array_shift($eve);
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Modificar Evento</h2>
            <div class="col-sm-offset-3 col-sm-6">
                <fieldset>
                    <legend>Datos del Evento</legend>
                    <form action="actualizar.php" method="post" class="formulario" enctype="multipart/form-data">
                    <input type="hidden" name="codeventos" value="<?php echo $codeventos?>">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nombre del Evento</td>
                                <td><input type="text" name="nombre" class="form-control" value="<?php echo $col['nombre']?>"></td>
                            </tr>
                            <tr>
                                <td>Fecha del Evento</td>
                                <td><input type="date" name="fechainicio" class="form-control" value="<?php echo $col['fechainicio']?>"></td>
                            </tr>
                            <tr>
                                <td>Dirección del Evento</td>
                                <td><input type="text" name="direccion" class="form-control" value="<?php echo $col['direccion']?>"></td>
                            </tr>
                            
                            <tr>
                                <td>Imágen del Evento</td>
                                <td><input type="file" name="imagen" class="form-control" accept=".jpg,.png">
                                <br>
                                <?php if($col['imagen']!=""){
                                ?>
                                <a href="../../imagenes/eventos/<?php echo $col['imagen']?>" target="_blank">
                                <img src="../../imagenes/eventos/<?php echo $col['imagen']?>" class="img-thumbnail">
                                </a>
                                <?php
                                }?>
                                </td>
                            </tr>
                            <td colspan="2">
                            <input type="submit" value="Guardar" class="btn btn-info">
                            </td>
                        </table>
                    </form>
                </fieldset>
            </div>
        </div>
        
    </div>
</section>
<?php include_once($folder."pie.php");?>