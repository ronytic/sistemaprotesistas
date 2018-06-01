<?php
$folder="../../";
$nivel=array("2"=>"Presidente","3"=>"Presidente Filial","4"=>"Secretaria");
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Nuevo Usuario</h2>
            <form action="guardar.php" method="post" class="formulario" enctype="multipart/form-data">
            <div class="col-sm-6">
                <fieldset>
                    <legend>Datos del Usuario</legend>
                    
                        <table class="table table-bordered">
                            <tr>
                                <td>Nombres</td>
                                <td><input type="text" name="nombre" class="form-control"></td>
                            </tr>
                             <tr>
                                <td>Apellido Paterno</td>
                                <td><input type="text" name="paterno" class="form-control"></td>
                            </tr>
                             <tr>
                                <td>Apellido Materno</td>
                                <td><input type="text" name="materno" class="form-control"></td>
                            </tr>
                             <tr>
                                <td>Carnet de Identidad</td>
                                <td><input type="text" name="ci" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Dirección</td>
                                <td><input type="text" name="direccion" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Teléfono</td>
                                <td><input type="text" name="telefono" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Celular</td>
                                <td><input type="text" name="celular" class="form-control"></td>
                            </tr>
                        </table>
                    
                </fieldset>
            </div>
            <div class="col-sm-6">
                <fieldset>
                    <legend>_</legend>
                    
                        <table class="table table-bordered">
                            <tr>
                                <td>Usuario</td>
                                <td><input type="text" name="usuario" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Contraseña</td>
                                <td><input type="password" name="password" class="form-control" required></td>
                            </tr>
                           
                            
                            <tr>
                                <td>Cargo</td>
                                <td><input type="text" name="cargo" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Observación</td>
                                <td><textarea name="obs" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <td>Nivel de Usuario</td>
                                <td><select name="nivel" class="form-control">
                                    <?php foreach($nivel as $k=>$v){
                                    ?>
                                    <option value="<?php echo $k?>"><?php echo $v?></option>
                                    <?php    
                                    }?>
                                </select></td>
                            </tr>
                            <td colspan="2">
                            <input type="submit" value="Guardar" class="btn btn-info">
                            </td>
                        </table>
                    
                </fieldset>
            </div>
            </form>
        </div>
        
    </div>
</section>
<?php include_once($folder."pie.php");?>