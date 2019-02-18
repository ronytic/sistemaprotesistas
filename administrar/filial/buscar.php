<?php
include_once("../../class/filial.php");
$filial=new filial;
extract($_POST);
$fil=$filial->mostrarTodoRegistro("nombre LIKE '$nombre%' and direccion LIKE '$direccion%'",1,"nombre");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="50">Nº</th><th>Nombre</th><th>Dirección</th><th>Presidente</th><th>Teléfono</th><th>Fecha de Fundación</th><th></th></tr>
</thead>
<?php
$i=0;
foreach($fil as $c){$i++;

?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $c['nombre']?></td>
    <td><?php echo $c['direccion']?></td>
    <td><?php echo $c['presidente']?></td>
    <td><?php echo $c['telefono']?></td>
    <td><?php echo $c['fechafundacion']?></td>

    <td><a href="modificar.php?c=<?php echo $c['codfilial']?>" class="btn btn-success btn-xs" title="Modificar" rel="<?php echo $r['codfilial']?>">M</a></td>
    <td><a href="eliminar.php" class="btn btn-danger btn-xs eliminar" title="Eliminar" rel="<?php echo $c['codfilial']?>">E</a></td>
</tr>
<?php    
}
?>
</table>