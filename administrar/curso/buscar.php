<?php
include_once("../../class/cursos.php");
$cursos=new cursos;
extract($_POST);
$cur=$cursos->mostrarTodoRegistro("nombre LIKE '$nombre%' and descripcion LIKE '$descripcion%'",1,"fechainicio");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="50">Nº</th><th>Nombre</th><th>Descripción</th><th>Fecha de Inicio</th><th>Imágen</th><th></th></tr>
</thead>
<?php
foreach($cur as $c){$i++;

?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $c['nombre']?></td>
    <td><?php echo $c['descripcion']?></td>
    <td><?php echo $c['fechainicio']?></td>
    <td><a href="../../imagenes/cursos/<?php echo $c['imagen']?>" target="_blank">
	<img src="../../imagenes/cursos/<?php echo $c['imagen']?>" width="50">
	</a>
    
    </td>
    <td><a href="modificar.php?c=<?php echo $c['codcursos']?>" class="btn btn-success btn-xs" title="Modificar" rel="<?php echo $r['codservicio']?>">M</a></td>
    <td><a href="eliminar.php" class="btn btn-danger btn-xs eliminar" title="Eliminar" rel="<?php echo $c['codcursos']?>">E</a></td>
</tr>
<?php    
}
?>
</table>