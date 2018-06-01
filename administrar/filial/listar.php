<?php
$folder="../../";
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
            $.post("eliminar.php",{'codfilial':cod},function(data){
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
            <h2 class="section-title">Administrar Filiales</h2>
            <div class="col-sm-12">
                <fieldset>
                    <legend>Criterio de Búsqueda</legend>
                    <form action="buscar.php" method="post" class="formulario">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th><input type="text" name="nombre" class="form-control"></th>
                                    <th>Dirección</th>
                                    <th><input type="text" name="direccion" class="form-control"></th>
                                    <th>
                                        <input type="submit" value="Buscar" class="btn btn-info">
                                    </th>
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
<?php include_once($folder."pie.php");?>