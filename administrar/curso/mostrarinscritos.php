<?php
include_once("../../login/check.php");
$codcursos=$_POST['codcursos'];

include_once("../../class/cursosinscritos.php");
$cursosinscritos=new cursosinscritos;

include_once("../../class/socio.php");
$socio=new socio;
$curins=$cursosinscritos->mostrarTodoRegistro(" codcursos='$codcursos'",1,"");
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th width="50">N</th>
            <th>Socio</th>
            <th width="50"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=0;
        foreach ($curins as $ci) {$i++;
            $soc=$socio->mostrarTodoRegistro("codsocio=".$ci['codsocio']);
            $soc=array_shift($soc);

            ?>
            <tr>
                <td class="text-right"><?=$i;?></td>
                <td><?=$soc['paterno'];?> <?=$soc['materno'];?> <?=$soc['nombres'];?></td>
                <td><a href="eliminar.php" class="btn btn-danger btn-xs eliminar" title="Eliminar" rel="<?=$ci['codcursosinscritos'];?>">E</a></td>
            </tr>
            <?php
        }
        ?>
        
    </tbody>
</table>