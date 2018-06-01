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
            <h2 class="section-title">Reporte de Socios</h2>
            <div class="col-sm-12">
                <fieldset>
                    <legend>Criterio de Búsqueda</legend>
                    <form action="buscar.php" method="post" class="formulario">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Filial</th>
                                    <th>
                                        
                                    </th>
                                </tr>
                                <tr>
                                    <th><select name="codfilial" class="form-control">
                                    <option value="%">Todos</option>
                                    <?php
                                        foreach($fil as $f){
                                            ?>
                                            <option value="<?=$f['codfilial']?>"><?=$f['nombre']?></option>
                                            <?php
                                        }
                                    ?>
                                </select></th>
                                   
                                    <th><input type="submit" value="Buscar" class="btn btn-info"></th>
                                </tr>
                            </thead>
                        </table>
                    </form>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <h4 class="section-title">Datos </h4>
            <div class="col-sm-12" id="respuestaformulario">
                
            </div>
        </div>
    </div>
</section>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<?php include_once($folder."pie.php");?>