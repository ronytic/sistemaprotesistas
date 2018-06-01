<?php
$folder="../../";

include_once("../../class/filial.php");
$filial=new filial;
$fil=$filial->mostrarTodoRegistro("",1,"nombre");
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Nuevo Socio</h2>
            <div class="col-sm-offset-3 col-sm-6">
                <fieldset>
                    <legend>Datos del Nuevo Socio</legend>
                    <form action="guardar.php" method="post" class="formulario" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nombres</td>
                                <td><input type="text" name="nombres" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Apellido Paterno</td>
                                <td><input type="text" name="paterno" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Apellido Materno</td>
                                <td><input type="text" name="materno" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Fecha de Nacimiento</td>
                                <td><input type="date" name="fechanac" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>C.I.</td>
                                <td><input type="text" name="ci" class="form-control" required></td>
                            </tr>
                             <tr>
                                <td>Foto</td>
                                <td><input type="file" name="foto" class="form-control" accept=".jpg,.png"></td>
                            </tr>
                            <tr>
                                <td>Teléfono</td>
                                <td><input type="text" name="telefono" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Correo</td>
                                <td><input type="email" name="correo" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Lugar de Egreso</td>
                                <td><input type="text" name="lugaregreso" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Años de Trabajo</td>
                                <td><input type="number" name="aniotrabajo" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Filial</td>
                                <td><select name="codfilial" class="form-control">
                                    <?php
                                        foreach($fil as $f){
                                            ?>
                                            <option value="<?=$f['codfilial']?>"><?=$f['nombre']?></option>
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