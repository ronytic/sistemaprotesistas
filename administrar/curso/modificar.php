<?php
$codcursos=$_GET['c'];
include_once("../../class/cursos.php");
$cursos=new cursos;
$cur=$cursos->mostrarTodoRegistro(" codcursos='$codcursos'",1,"");
$col=array_shift($cur);


include_once("../../class/socio.php");
$socio=new socio;
$soc=$socio->mostrarTodoRegistro("",1,"paterno,materno,nombres");


$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<script type="text/javascript">
$(document).ready(function(){
    mostrarInscritos();
    $("#formularioregistro").submit(function (e) {
        e.preventDefault();

        var codcursos=$("#codcursos").val();
        var codsocio=$("#codsocio").val();
        $.post("agregarinscrito.php",{"codcursos":codcursos,"codsocio":codsocio},function(){
            mostrarInscritos();
        });
    });
    $(document).on("click",".eliminar",function (e) {
        e.preventDefault();
        if(confirm("¿Deseas Eliminar este Socio?")){
            var codcursosinscritos=$(this).attr("rel");
            $.post("eliminarinscrito.php",{"codcursosinscritos":codcursosinscritos},function(data){
                mostrarInscritos();
            });  
        }
    });
});
function mostrarInscritos(){
    var codcursos=$("#codcursos").val();
    $.post("mostrarinscritos.php",{codcursos:codcursos},function(data){
        $("#listadodeinscritos").html(data);
    });
}
</script>
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
        <div class="row">
            
            <div class="col-sm-6">
                <h2 class="section-title">Inscribir Socio</h2>
                <fieldset>
                   <form action="actualizar.php" method="post" id="formularioregistro" enctype="multipart/form-data">
                    <input type="hidden" name="codcursos" value="<?php echo $codcursos?>" id="codcursos">
                        <table class="table">
                            <tr>
                                <td>Socio <br>
                                    <select name="codsocio" id="codsocio" class="form-control">
                                    <?php
                                    foreach ($soc as $s) {
                                        ?>
                                        <option value="<?=$s['codsocio'];?>"><?=$s['paterno'];?> <?=$s['materno'];?> <?=$s['nombres'];?></option>
                                        <?php
                                        
                                    }
                                    ?>
                                    </select>
                                    <br>
                                    <input type="submit" value="Agregar" class="btn btn-primary">
                                </td>
                                <td>
                                </td>
                            </tr>
                        </table>
                    </form>
                </fieldset>
            </div>
            

            <div class="col-sm-6">
                <h2 class="section-title">Socios Inscritos</h2>
                <fieldset id="listadodeinscritos">

                </fieldset>
            </div>
        </div>
    </div>
</section>
<?php include_once($folder."pie.php");?>