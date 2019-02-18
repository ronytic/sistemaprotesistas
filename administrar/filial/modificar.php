<?php
$codfilial=$_GET['c'];
include_once("../../class/filial.php");
$filial=new filial;
$fil=$filial->mostrarTodoRegistro(" codfilial='$codfilial'",1,"");
$col=array_shift($fil);
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Modificar Filial</h2>
            <div class="col-sm-offset-3 col-sm-6">
                <fieldset>
                    <legend>Datos de la Filial</legend>
                    <form action="actualizar.php" method="post" class="formulario" enctype="multipart/form-data">
                    <input type="hidden" name="codfilial" value="<?php echo $codfilial?>">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nombre de la Filial</td>
                                <td><input type="text" name="nombre" class="form-control" value="<?php echo $col['nombre']?>"></td>
                            </tr>
                            <tr>
                                <td>Fecha de Fundación</td>
                                <td><input type="date" name="fechafundacion" class="form-control" value="<?php echo $col['fechafundacion']?>"></td>
                            </tr>
                            <tr>
                                <td>Presidente de la Filial</td>
                                <td><input type="text" name="presidente" class="form-control" value="<?php echo $col['presidente']?>"></td>
                            </tr>
                            <tr>
                                <td>Teléfono de la Filial</td>
                                <td><input type="text" name="telefono" class="form-control"  value="<?php echo $col['telefono']?>"></td>
                            </tr>
                            <tr>
                                <td>Dirección</td>
                                <td><textarea name="direccion" class="form-control" rows="5"><?php echo $col['direccion']?></textarea></td>
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