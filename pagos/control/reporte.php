<?php
include_once("../../login/check.php");
include_once("../../class/pago.php");
$pago=new pago;
include_once("../../class/socio.php");
$socio=new socio;
include_once("../../class/filial.php");
$filial=new filial;
$nombres=$_GET['nombres'];
$paterno=$_GET['paterno'];
$materno=$_GET['materno'];
$ci=$_GET['ci'];
$codfilial=$_GET['codfilial'];
$anio=$_GET['anio'];

require_once("../../impresion/pdf.php");
$titulo="CONTROL GENERAL";
if($codfilial!="%"){
    $fil=$filial->mostrarTodoRegistro("codfilial LIKE '$codfilial'",1,"nombre");
    $fil=array_shift($fil);
    $nombreFilial=$fil['nombre'];
}else{
    $nombreFilial="Todos";
}
if($anio=="%"){
    $nombreAnio="Todos";
}else{
    $nombreAnio=$anio;
}
$soc=$socio->mostrarTodoRegistro("nombres LIKE '$nombres%' and paterno LIKE '$paterno%' and materno LIKE '$materno%' and ci LIKE '$ci%' and codfilial LIKE '$codfilial'",1,"paterno,materno,nombres");

class PPPDF extends PPDF{
    function Cabecera(){
        global $anio,$nombreFilial,$nombreAnio;
        $this->cuadroCabecera(20,"Filial:",30,"$nombreFilial");
        $this->cuadroCabecera(20,"Año:",30,"$nombreAnio");
        $this->ln();
        $this->tituloCabecera(8,"N");
        $this->tituloCabecera(20,"CI");
        $this->tituloCabecera(20,"Paterno");
        $this->tituloCabecera(20,"Materno");
        $this->tituloCabecera(30,"Nombres");
        $this->tituloCabecera(10,"Anio");
        
        for($ij=1;$ij<=12;$ij++){
            //echo $anio."-".$ij."-01";
            $mesliteral=ucwords(strftime("%b",strtotime("2012-".$ij."-01")));
            $this->tituloCabecera(12,$mesliteral);
        }
    }
}

for($mes=1;$mes<=12;$mes++){
    ${"t".$mes}=0;
}
$pdf=new PPPDF("L","mm","letter");
$pdf->AddPage();
$i=0;
foreach($soc as $s){
    $i++;
    $pdf->CuadroCuerpo(8,$i,0,"R",1);
    $pdf->CuadroCuerpo(20,$s['ci'],0,"",1);
    $pdf->CuadroCuerpo(20,$s['paterno'],0,"",1);
    $pdf->CuadroCuerpo(20,$s['materno'],0,"",1);
    $pdf->CuadroCuerpo(30,$s['nombres'],0,"",1);
    $pdf->CuadroCuerpo(10,$anio,0,"R",1);
    
    
    for($mes=1;$mes<=12;$mes++){
        $p=$pago->mostrarTodoRegistro("codsocio=".$s['codsocio']." and anio='$anio' and mes='$mes'",1,"");
        $p=array_shift($p);
        if($p['estado']){
            $pdf->CuadroCuerpo(12,number_format($p['monto'],2),0,"R",1);    
        }else{
            $pdf->CuadroCuerpo(12,"",0,"R",1);
        }
        ${"t".$mes}=${"t".$mes}+number_format($p['monto'],2);
    }
    
    
    $pdf->ln();
}
$pdf->CuadroCuerpo(108,"Total",0,"R",1,9,"B");
for($mes=1;$mes<=12;$mes++){
    $pdf->CuadroCuerpo(12,number_format(${"t".$mes},2),0,"R",1);
}
$pdf->Output();
?>