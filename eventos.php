<?php
$folder="";
include_once("class/eventos.php");
$eventos=new eventos;
$even=$eventos->mostrarTodoRegistro("",1,"fechainicio");
?>
<?php include_once("cabecerahtml.php");?>
<?php include_once("cabecera.php");?>
<section class="margin-bottom">
    <div class="container">
        <h2 class="section-title centrar">Eventos</h2>
        <div class="row">
            
            <?php 
            $i=0;
            foreach($even as $e){$i++;?>
            <div class="col-md-4 col-sm-4 plomo crecer">
                <div class="content-box box-default animated fadeInUp animation-delay-10">
                    <center>
                    <a href="<?php echo $folder?>imagenes/eventos/<?=$e['imagen']?>" target="_blank">
                    <img src="<?php echo $folder?>imagenes/eventos/<?=$e['imagen']?>"  class="img-responsive img-thumbnail " height="100" style="height:350px;">
                    </a>
                    </center>
                    <h4 class="content-box-title"><?=$e['nombre']?></h4>
                    <b>Fecha de Inicio:</b> <span class="badge badge-primary"><?=$e['fechainicio'];?></span>
                    
                     <div class="alert alert-info"><b>Dirección:</b> <?=$e['direccion'];?></div>
                </div>
            </div>
            <?php 
            if($i==3){
                $i=0;
                ?>
                </div>
                <div class="row">
                <?php
            }
            }?>

        </div>
    </div>
</section>


<?php include_once("pie.php");?>