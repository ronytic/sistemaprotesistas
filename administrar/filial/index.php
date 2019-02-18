<?php
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Nueva Filial</h2>
            <div class="col-sm-offset-3 col-sm-6">
                <fieldset>
                    <legend>Datos de la Filial</legend>
                    <form action="guardar.php" method="post" class="formulario" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nombre de la Filial</td>
                                <td><input type="text" name="nombre" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Fecha de Fundación</td>
                                <td><input type="date" name="fechafundacion" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Presidente de la Filial</td>
                                <td><input type="text" name="presidente" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Teléfono de la Filial</td>
                                <td><input type="text" name="telefono" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Dirección de la Filial</td>
                                <td><textarea name="direccion" class="form-control" rows="5"></textarea></td>
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