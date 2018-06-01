<?php
$folder="../../";
$nivel=array("2"=>"Presidente","3"=>"Presidente Filial","4"=>"Secretaria");
include_once($folder."cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="../../js/busqueda.js"></script>
<script language="javascript" type="text/javascript">
$(document).on("ready",function(){
    $(document).on("click",".eliminar",function(e){
        e.preventDefault();    
        if(confirm("¿Esta seguro que desea Eliminar este Usuario?")){
            var cod=$(this).attr("rel");
            $.post("eliminar.php",{'codusuarios':cod},function(data){
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
            <h2 class="section-title">Administrar Testimonios</h2>
            <div class="col-sm-12">
                <fieldset>
                    <legend>Criterio de Búsqueda</legend>
                    <form action="buscar.php" method="post" class="formulario">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Nivel</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
                            <label>
            
                                <input type="text" class="form-control input-ls" name="nombre" autofocus size="20">
                            </label>
                            </td>
                            <td>
                            <label>
            
                                <input type="text" class="form-control input-ls" name="paterno" autofocus size="20">
                            </label>
                            </td>
                            <td>
                            <select name="nivel"  class="form-control">
                            <option value="%">Todos</option>
                           <?php foreach($nivel as $k=>$v){?>
                            <option value="<?php echo $k?>"><?php echo $v?></option>   
                           <?php }?>
                           </select>
                            </td>
                            <td>
                                <input type="submit" value="Buscar" class="btn btn-info">
                            </td>
                        </tr>
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