<?php
$nombres=$_POST['nombres'];
$paterno=$_POST['paterno'];
$materno=$_POST['materno'];
$ci=$_POST['ci'];
$codfilial=$_POST['codfilial'];
$anio=$_POST['anio'];
$url="reporte.php?nombres=$nombres&paterno=$paterno&materno=$materno&ci=$ci&codfilial=$codfilial&anio=$anio";
?>
<iframe src="<?php echo $url?>" frameborder="0" width="100%" height="700"></iframe>