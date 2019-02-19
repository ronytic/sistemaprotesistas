<?php
$folder="../../";
include_once("../../login/check.php");

include_once("../../class/cursosinscritos.php");
$cursosinscritos=new cursosinscritos;


include_once("../../class/cursos.php");
$cursos=new cursos;
$cur=$cursos->mostrarTodoRegistro("",1,"nombre");
$datos=array();
$cantidadinscritos=array();
foreach($cur as $c){
    $curins=$cursosinscritos->mostrarTodoRegistro("codcursos=".$c['codcursos'],1,"");
    $cantidad=count($curins);
    array_push($cantidadinscritos,$cantidad);
    array_push($datos,"'".$c['nombre']."'");
}
$todoscursos=implode(",",$datos);
$todoscantidadinscritos=implode(",",$cantidadinscritos);




include_once($folder."cabecerahtml.php");
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<?php include_once($folder."cabecera.php");?>
<section class="">
    <div class="container">
        <div class="row">
            <h2 class="section-title">Seguimiento de Cursos</h2>
            <div class="col-sm-12">
                <div id="container" style="min-width: 310px; height: 600px; margin: 0 auto"></div>
            </div>
        </div>
    </div>
</section>

<script>

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Seguimiento de Cursos'
    },
    subtitle: {
        text: 'Sistema de Laboratoristas Dentales '
    },
    xAxis: {
        categories: [<?php echo $todoscursos;?>],
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
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
        {
            name: 'Cursos',
            data: [<?php echo $todoscantidadinscritos;?>]
        }
        
    ]
});
</script>
<?php include_once($folder."pie.php");?>