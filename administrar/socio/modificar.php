<?php
$codsocio=$_GET['c'];
include_once("../../class/socio.php");
$socio=new socio;
$soc=$socio->mostrarTodoRegistro(" codsocio='$codsocio'",1,"");
$col=array_shift($soc);

include_once("../../class/filial.php");
$filial=new filial;
$fil=$filial->mostrarTodoRegistro("",1,"nombre");

$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Modificar Socio</h2>
            <div class="col-sm-offset-3 col-sm-6">
                <fieldset>
                    <legend>Datos del Socio</legend>
                    <form action="actualizar.php" method="post" class="formulario" enctype="multipart/form-data">
                    <input type="hidden" name="codsocio" value="<?php echo $codsocio?>">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nombres</td>
                                <td><input type="text" name="nombres" class="form-control" required value="<?=$col['nombres']?>"></td>
                            </tr>
                            <tr>
                                <td>Apellido Paterno</td>
                                <td><input type="text" name="paterno" class="form-control" required value="<?=$col['paterno']?>"></td>
                            </tr>
                            <tr>
                                <td>Apellido Materno</td>
                                <td><input type="text" name="materno" class="form-control" required value="<?=$col['materno']?>"></td>
                            </tr>
                            <tr>
                                <td>Fecha de Nacimiento</td>
                                <td><input type="date" name="fechanac" class="form-control" required value="<?=$col['fechanac']?>"></td>
                            </tr>
                            <tr>
                                <td>C.I.</td>
                                <td><input type="text" name="ci" class="form-control" required value="<?=$col['ci']?>"></td>
                            </tr>
                            <tr>
                                <td>Imágen del Socio</td>
                                <td><input type="file" name="foto" class="form-control" accept=".jpg,.png">
                                <br>
                                <?php if($col['foto']!=""){
                                ?>
                                <a href="../../imagenes/socios/<?php echo $col['foto']?>" target="_blank">
                                <img src="../../imagenes/socios/<?php echo $col['foto']?>" class="img-thumbnail">
                                </a>
                                <?php
                                }?>
                                </td>
                            </tr>
                            <tr>
                                <td>Correo</td>
                                <td><input type="email" name="correo" class="form-control" value="<?=$col['correo']?>"></td>
                            </tr>
                            <tr>
                                <td>Lugar de Egreso</td>
                                <td><input type="text" name="lugaregreso" class="form-control" value="<?=$col['lugaregreso']?>"></td>
                            </tr>
                            <tr>
                                <td>Años de Trabajo</td>
                                <td><input type="number" name="aniotrabajo" class="form-control" value="<?=$col['aniotrabajo']?>"></td>
                            </tr>
                            <tr>
                                <td>Filial</td>
                                <td><select name="codfilial" class="form-control">
                                    <?php
                                        foreach($fil as $f){
                                            ?>
                                            <option value="<?=$f['codfilial']?>" <?=$f['codfilial']==$col['codfilial']?'selected="selected"':''?>><?=$f['nombre']?></option>
                                            <?php
                                        }
                                    ?>
                                </select></td>
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