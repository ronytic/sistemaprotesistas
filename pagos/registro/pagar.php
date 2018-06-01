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
<script language="javascript" type="text/javascript">
$(document).on("ready",function(){
    $(document).on("submit",".formulario",function(e){
        e.preventDefault();    
        var codsocio=$("[name=codsocio]").val();
        var anio=$("[name=anio]").val();
        $.post("verpagos.php",{'codsocio':codsocio,'anio':anio},function(data){
            $("#pagos").html(data)
        });
    })
})
</script>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Registrar Pago -  Socio</h2>
            <div class="col-sm-offset-0 col-sm-12">
                <fieldset>
                    <legend>Datos del Socio</legend>
                    <form action="actualizar.php" method="post" class="formulario" enctype="multipart/form-data">
                    <input type="hidden" name="codsocio" value="<?php echo $codsocio?>">    
                        <table class="table table-bordered">
                            <tr>
                                <td>Nombres<br><input type="text" name="nombres" class="form-control" required value="<?=$col['nombres']?>" readonly></td>

                                <td>Apellido Paterno<br><input type="text" name="paterno" class="form-control" required value="<?=$col['paterno']?>" readonly></td>
                                <td>Apellido Materno<br>
                                <input type="text" name="materno" class="form-control" required value="<?=$col['materno']?>" readonly></td>
                            
                                <td>Fecha de Nacimiento<br><input type="date" name="fechanac" class="form-control" required value="<?=$col['fechanac']?>" readonly></td>
                            
                                <td>C.I.<br><input type="text" name="ci" class="form-control" required value="<?=$col['ci']?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Foto del Socio
                                <br>
                                <?php if($col['foto']!=""){
                                ?>
                                <a href="../../imagenes/socios/<?php echo $col['foto']?>" target="_blank">
                                <img src="../../imagenes/socios/<?php echo $col['foto']?>" class="img-thumbnail" width="100">
                                </a>
                                <?php
                                }?>
                                </td>
                            
                                <td>Correo<br><input type="email" name="correo" class="form-control" value="<?=$col['correo']?>" readonly></td>
                            
                                <td>Lugar de Egreso<br><input type="text" name="lugaregreso" class="form-control" value="<?=$col['lugaregreso']?>" readonly></td>
                           
                                <td>Años de Trabajo<br><input type="number" name="aniotrabajo" class="form-control" value="<?=$col['aniotrabajo']?>" readonly></td>
                                <td>Filial<br><select name="codfilial" class="form-control" disabled>
                                    <?php
                                        foreach($fil as $f){
                                            ?>
                                            <option value="<?=$f['codfilial']?>" <?=$f['codfilial']==$col['codfilial']?'selected="selected"':''?>><?=$f['nombre']?></option>
                                            <?php
                                        }
                                    ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Año<br><select name="anio" class="form-control">
                                    <?php for($anio=2017;$anio<=date("Y");$anio++){
                                        ?>
                                        <option value="<?=$anio;?>"><?=$anio;?></option>
                                        <?php
                                        }?>
                                </select></td>
                                
                            <td colspan="1"><br>
                            <input type="submit" value="Buscar" class="btn btn-info">
                            </td>
                            </tr>
                        </table>
                    </form>
                    <form action="guardar.php" method="post">
                    <table class="table table-bordered">
                        <thead >
                            <tr>
                                <th width="50">N</th>
                                <th width="100">Mes</th>
                                <th width="100">Cancelado</th>
                                <th width="200">Monto</th>
                                <th width="200">Fecha de Pago</th>
                                <th>Observación</th>
                            </tr>
                        </thead>
                        <tbody id="pagos">
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4"><input type="submit" value="Guardar" class="btn btn-primary"></th>
                            </tr>
                        </tfoot>
                    </table>
                    </form>
                </fieldset>
            </div>
        </div>
        
    </div>
</section>
<?php include_once($folder."pie.php");?>