<?php
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Nuevo Evento</h2>
            <div class="col-sm-offset-3 col-sm-6">
                <fieldset>
                    <legend>Datos del Nuevo Evento</legend>
                    <form action="guardar.php" method="post" class="formulario" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nombre del Evento</td>
                                <td><input type="text" name="nombre" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Fecha del Evento</td>
                                <td><input type="date" name="fechainicio" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Dirección del Curso</td>
                                <td><input type="text" name="direccion" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Imágen del Evento</td>
                                <td><input type="file" name="imagen" class="form-control" accept=".jpg,.png"></td>
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