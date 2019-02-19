<?php
$folder="../../";
include_once("../../class/filial.php");
$filial=new filial;
$fil=$filial->mostrarTodoRegistro("",1,"nombre");
include_once($folder."cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="../../js/busqueda.js"></script>
<script language="javascript" type="text/javascript">
$(document).on("ready",function(){
    $(document).on("click",".eliminar",function(e){
        e.preventDefault();    
        if(confirm("¿Esta seguro que desea Eliminar este Curso?")){
            var cod=$(this).attr("rel");
            $.post("eliminar.php",{'codsocio':cod},function(data){
                $(".formulario").submit();
            });
        }
    })
})
</script>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Seguimiento de Pagos</h2>
            <div class="col-sm-12">
                <fieldset>
                    
                    <form action="buscar.php" method="post" class="formulario">
                        <table class="table">
                            <tr>
                                <td>Año<br><select name="anio" class="form-control">
                                    <?php for($anio=2018;$anio<=date("Y");$anio++){
                                        ?>
                                        <option value="<?=$anio;?>" <?=$anio==date("Y")?'selected="selected"':'';?>><?=$anio;?></option>
                                        <?php
                                        }?>
                                </select></td>
                                <td><br><input type="submit" value="Buscar" class="btn btn-primary"></td>
                            </tr>
                            
                                    
                                </tr>
                            </thead>
                        </table>
                    </form>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <h4 class="section-title">Reporte </h4>
            <div class="col-sm-12" id="respuestaformulario">
                
            </div>
        </div>
    </div>
</section>
<?php include_once($folder."pie.php");?>