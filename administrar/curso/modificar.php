<?php
$codcursos=$_GET['c'];
include_once("../../class/cursos.php");
$cursos=new cursos;
$cur=$cursos->mostrarTodoRegistro(" codcursos='$codcursos'",1,"");
$col=array_shift($cur);
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Modificar Cursos</h2>
            <div class="col-sm-offset-3 col-sm-6">
                <fieldset>
                    <legend>Datos del Curso</legend>
                    <form action="actualizar.php" method="post" class="formulario" enctype="multipart/form-data">
                    <input type="hidden" name="codcursos" value="<?php echo $codcursos?>">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nombre del Curso</td>
                                <td><input type="text" name="nombre" class="form-control" value="<?php echo $col['nombre']?>"></td>
                            </tr>
                            <tr>
                                <td>Fecha de Inicio</td>
                                <td><input type="date" name="fechainicio" class="form-control" value="<?php echo $col['fechainicio']?>"></td>
                            </tr>
                            <tr>
                                <td>Dirección del Curso</td>
                                <td><input type="text" name="direccion" class="form-control" value="<?php echo $col['direccion']?>"></td>
                            </tr>
                            <tr>
                                <td>Descripción</td>
                                <td><textarea name="descripcion" class="form-control"><?php echo $col['descripcion']?></textarea></td>
                            </tr>
                            <tr>
                                <td>Imágen del Curso</td>
                                <td><input type="file" name="imagen" class="form-control" accept=".jpg,.png">
                                <br>
                                <?php if($col['imagen']!=""){
                                ?>
                                <a href="../../imagenes/cursos/<?php echo $col['imagen']?>" target="_blank">
                                <img src="../../imagenes/cursos/<?php echo $col['imagen']?>" class="img-thumbnail">
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