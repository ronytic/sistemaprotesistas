<?php
$codfilial=$_POST['codfilial'];
$anio=$_POST['anio'];
include_once("../../class/pago.php");
$pago=new pago;

$arraymeses=array();
for($ij=1;$ij<=12;$ij++){
    $mesliteral=ucwords(strftime("%b",strtotime("2012-".$ij."-01")));
    array_push($arraymeses,"'".$mesliteral."'");
   
}  
$meses=implode(",",$arraymeses);

if($anio=="%"){
    $anioinicio=2017;
    $aniofinal=date("Y");
}else{
    $anioinicio=$anio;
    $aniofinal=$anio;
}

for($anio=$anioinicio;$anio<=$aniofinal;$anio++){

    ${'array'.$anio}=array();
    for($ij=1;$ij<=12;$ij++){
        $p=$pago->mostrarTodoRegistro("codsocio IN(SELECT codsocio FROM socio WHERE codfilial LIKE '$codfilial') and anio='$anio' and mes='$ij'",1,"");
        $can=count($p);
        array_push(${'array'.$anio},$can);
    }
    ${'cantidad'.$anio}=implode(",",${'array'.$anio});
}
if($codfilial=="%"){
    $subtitulo="Filial: TODOS";
}else{
    include_once("../../class/filial.php");
    $filial=new filial;
    $fil=$filial->mostrarTodoRegistro("codfilial =$codfilial",1,"");
    $fil=array_shift($fil);
    $subtitulo="Filial: ".$fil['nombre'];
}

?>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script>

Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Estadistica de Pagos'
    },
    subtitle: {
        text: 'Sistema de Laboratoristas Dentales <b><?php echo $subtitulo;?></b>'
    },
    xAxis: {
        categories: [<?php echo $meses;?>]
    },
    yAxis: {
        title: {
            text: 'Cantidad de Pagos'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [
        <?php for($anio=$anioinicio;$anio<=$aniofinal;$anio++){?>
            {
            name: '<?php echo $anio;?>',
            data: [<?php echo ${'cantidad'.($anio)};?>]
            },
        <?php }?>
    ]
});
</script>