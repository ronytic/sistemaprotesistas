<?php
include_once("../../login/check.php");

include_once("../../class/socio.php");
$socio=new socio;
include_once("../../class/filial.php");
$filial=new filial;


$codfilial=$_GET['codfilial'];


require_once("../../impresion/pdf.php");
$titulo="Reporte de Socios";
if($codfilial!="%"){
    $fil=$filial->mostrarTodoRegistro("codfilial LIKE '$codfilial'",1,"nombre");
    $fil=array_shift($fil);
    $nombreFilial=$fil['nombre'];
}else{
    $nombreFilial="Todos";
}

$soc=$socio->mostrarTodoRegistro("codfilial LIKE '$codfilial'",1,"paterno,materno,nombres");

class PPPDF extends PPDF{
    function Cabecera(){
        global $anio,$nombreFilial;
        $this->cuadroCabecera(20,"Filial:",30,"$nombreFilial");
        $this->ln();
        $this->tituloCabecera(8,"N");
        $this->tituloCabecera(20,"CI");
        $this->tituloCabecera(20,"Paterno");
        $this->tituloCabecera(20,"Materno");
        $this->tituloCabecera(30,"Nombres");
        
        $this->tituloCabecera(50,"Teléfono");
        $this->tituloCabecera(35,"Filial");
      
    }
}

for($mes=1;$mes<=12;$mes++){
    ${"t".$mes}=0;
}
$pdf=new PPPDF("p","mm","letter");
$pdf->AddPage();
$i=0;
foreach($soc as $s){
    $fil=$filial->mostrarTodoRegistro("codfilial LIKE '".$s['codfilial']."'",1,"nombre");
    $fil=array_shift($fil);
    $nombreFilial=$fil['nombre'];
    
    $i++;
    $pdf->CuadroCuerpo(8,$i,0,"R",1);
    $pdf->CuadroCuerpo(20,$s['ci'],0,"",1);
    $pdf->CuadroCuerpo(20,$s['paterno'],0,"",1);
    $pdf->CuadroCuerpo(20,$s['materno'],0,"",1);
    $pdf->CuadroCuerpo(30,$s['nombres'],0,"",1);
    $pdf->CuadroCuerpo(50,$s['telefono'],0,"",1);
   $pdf->CuadroCuerpo(35,$nombreFilial,0,"",1);
    
    $pdf->ln();
}
    
$pdf->Output();
?>