<?php
include_once("../../login/check.php");
$folder="../";
include_once("../../class/usuario.php");
$usuario=new usuario;

extract($_POST);
  $usu=$usuario->mostrarTodoRegistro("nombre LIKE '$nombre%' and paterno LIKE '$paterno%' and nivel LIKE '$nivel'","1","paterno,materno,nombre");
?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>N</th>
            <th>Paterno</th>
            <th>Materno</th>
            <th>Nombres</th>
            <th>C.I.</th>
            <th>Celular</th>
            <th>Nivel</th>
            <th>Cargo</th>
        </tr>
    </thead>
<?php foreach($usu as $u){$i++;
//$nivel=array("2"=>"Presidente","3"=>"Presidente Filial","4"=>"Secretaria");
switch($u['nivel']){
    case 2:{$nivel="Presidente";}break;    
    case 3:{$nivel="Presidente Filial";}break;    
    case 4:{$nivel="Secretaria";}break;    
}
  ?>
  <tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $u['paterno']?></td>
    <td><?php echo $u['materno']?></td>
    <td><?php echo $u['nombre']?></td>
    <td><?php echo $u['ci']?></td>
    <td><?php echo $u['celular']?></td>
    <td><?php echo $nivel?></td>
    <td><?php echo $u['cargo'];?></td>
    <td><a href="modificar.php?codusuarios=<?php echo $u['codusuarios']?>" class="btn btn-xs btn-success modificar">M</a>
    <a href="eliminar.php" rel="<?php echo $u['codusuarios']?>" class="btn btn-xs btn-danger eliminar">E</a></td>
  </tr>
  <?php  
    }
?>    
</table>
