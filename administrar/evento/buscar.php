<?php
include_once("../../class/eventos.php");
$eventos=new eventos;
extract($_POST);
$eve=$eventos->mostrarTodoRegistro("nombre LIKE '$nombre%' and direccion LIKE  '$direccion%'",1,"fechainicio");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="50">Nº</th><th>Nombre</th><th>Dirección</th><th>Fecha de Evento</th><th>Imágen</th><th></th></tr>
</thead>
<?php
foreach($eve as $e){$i++;

?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $e['nombre']?></td>
    <td><?php echo $e['direccion']?></td>
    <td><?php echo $e['fechainicio']?></td>
    <td><a href="../../imagenes/eventos/<?php echo $e['imagen']?>" target="_blank">
	<img src="../../imagenes/eventos/<?php echo $e['imagen']?>" width="50">
	</a>
    
    </td>
    <td><a href="modificar.php?c=<?php echo $e['codeventos']?>" class="btn btn-success btn-xs" title="Modificar" rel="<?php echo $e['codeventos']?>">M</a></td>
    <td><a href="eliminar.php" class="btn btn-danger btn-xs eliminar" title="Eliminar" rel="<?php echo $e['codeventos']?>">E</a></td>
</tr>
<?php    
}
?>
</table>