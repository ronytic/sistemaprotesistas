<?php
include_once("../../class/socio.php");
$socio=new socio;
extract($_POST);
$cur=$socio->mostrarTodoRegistro("nombres LIKE '$nombres%' and paterno LIKE '$paterno%' and materno LIKE '$materno%' and ci LIKE '$ci%' and codfilial LIKE '$codfilial'",1,"paterno,materno,nombres");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="50">Nº</th><th>Nombre</th><th>Paterno</th><th>Materno</th><th>CI</th><th></th></tr>
</thead>
<?php
foreach($cur as $c){$i++;

?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $c['nombres']?></td>
    <td><?php echo $c['paterno']?></td>
    <td><?php echo $c['materno']?></td>
    <td><?php echo $c['ci']?></td>
    <td><a href="../../imagenes/socios/<?php echo $c['foto']?>" target="_blank">
	<img src="../../imagenes/socios/<?php echo $c['foto']?>" width="30">
	</a>
    
    </td>
    <td><a href="modificar.php?c=<?php echo $c['codsocio']?>" class="btn btn-success btn-xs" title="Modificar" rel="<?php echo $r['codsocio']?>">M</a></td>
    <td><a href="eliminar.php" class="btn btn-danger btn-xs eliminar" title="Eliminar" rel="<?php echo $c['codsocio']?>">E</a></td>
</tr>
<?php    
}
?>
</table>