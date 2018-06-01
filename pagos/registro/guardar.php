<?php
include_once("../../login/check.php");
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
$anio=$_POST['anio'];
$codsocio=$_POST['codsocio'];
$p=$_POST['p'];
include_once("../../class/pago.php");
$pago=new pago;

foreach($p as $mes=>$v){
    if($v['estado']==1){
        
        if($v['estadofila']=="n"){
            //echo "esn";
            $valores=array("codsocio"=>"'$codsocio'",
                            "anio"=>"'$anio'",
                            "mes"=>"'$mes'",
                            "estado"=>"'".$v['estado']."'",
                            "monto"=>"'".$v['monto']."'",
                            "fechapago"=>"'".$v['fechapago']."'",
                            "observacion"=>"'".$v['observacion']."'",
            );  
            $pago->insertarRegistro($valores);
        }elseif($v['estadofila']=="u"){
            $valores=array("codsocio"=>"'$codsocio'",
                            "anio"=>"'$anio'",
                            "mes"=>"'$mes'",
                            "estado"=>"'".$v['estado']."'",
                            "monto"=>"'".$v['monto']."'",
                            "fechapago"=>"'".$v['fechapago']."'",
                            "observacion"=>"'".$v['observacion']."'",
            );  
            $pago->actualizarRegistro($valores,"codpago=".$v['codpago']);
        }
          
    }
    
}
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Mensaje de Confirmación</h2>
            <div class="col-sm-offset-3 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <h5>Su pago se Registro Correctamente</h5>
                        <a href="pagar.php?c=<?php echo $codsocio?>" class="btn btn-warning">Volver a Pagos</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php include_once($folder."pie.php");?>