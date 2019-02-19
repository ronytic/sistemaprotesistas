<?php
include_once("../../login/check.php");

$anio=$_GET['anio'];
$codfilial=$_GET['codfilial'];

include_once("../../class/socio.php");
$socio=new socio();
$soc=$socio->mostrarTodoRegistro("codfilial LIKE '$codfilial'",1,"paterno,materno,nombres");

include_once("../../class/pago.php");
$pago=new pago();



include_once("../../impresion/pdf.php");
class PDF extends PPDF{
    function Cabecera(){
        $this->TituloCabecera(10,"N");
        $this->TituloCabecera(60,"Socio");

        for($i=1;$i<=12;$i++){
            //$this->TituloCabecera(14,str_pad($i,2,"0",STR_PAD_LEFT));
            $this->TituloCabecera(14,capitalizar(strftime(" %b ",strtotime("2018-$i-01"))));
            
        }
    }
}

$titulo="Seguimiento de Pagos";
$pdf=new PDF("L","mm","letter");
$pdf->AddPage();


$j=0;
foreach($soc as $s){$j++;
    
    
    
    $pdf->CuadroCuerpo(10,$j,0,"R","1");
    $pdf->CuadroCuerpo(60,$s['paterno']." ".$s['materno']." ".$s['nombres'],0,"L","1");
    for($i=1;$i<=12;$i++){
        $p=$pago->mostrarTodoRegistro("codsocio={$s['codsocio']} and anio=$anio and mes=$i",1,"");
        $c=count($p);
        $pdf->CuadroCuerpo(14,($c==0)?'Pendiente':'',0,"L",1,8);
    }
    $pdf->ln();

}

$pdf->Output();
?>