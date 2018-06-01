<?php
$anio=$_POST['anio'];
$codsocio=$_POST['codsocio'];
include_once("../../class/pago.php");
$pago=new pago;


for($mes=1;$mes<=12;$mes++){
    $p=$pago->mostrarTodoRegistro("anio=$anio and mes=$mes and codsocio=$codsocio",1,"");
    if(count($p)>0){
        $estadofila="u";
        $p=array_shift($p);
    }else{
        $estadofila="n";
    }
?>
<tr>
    <td><?php echo $mes?></td>
    <td><?php echo mb_strtoupper(strftime("%B",strtotime($anio."-".$mes."-01")))?></td>
    <td><input type="checkbox" name="p[<?=$mes?>][estado]" class="form-control" value="1" <?php echo $p['estado']?'checked="checked"':''?>></td>
    <td><input type="number" name="p[<?=$mes?>][monto]" value="<?php echo $p['monto']?>" min="0" step="0.1" class="form-control text-right"></td>
    <td><input type="date" name="p[<?=$mes?>][fechapago]" value="<?php echo $p['fechapago']?>" min="0" class="form-control"></td>
    <td><input type="text" name="p[<?=$mes?>][observacion]" value="<?php echo $p['observacion']?>" class="form-control">
    <input type="hidden" name="anio" value="<?php echo $anio?>">
    <input type="hidden" name="codsocio" value="<?php echo $codsocio?>">
    <input type="hidden" name="p[<?=$mes?>][estadofila]" value="<?php echo $estadofila?>">
    <input type="hidden" name="p[<?=$mes?>][codpago]" value="<?php echo $p['codpago']?>">
    </td>
</tr>
<?php
}?>