<?php
$folder="";
include_once("class/cursos.php");
$cursos=new cursos;
$cur=$cursos->mostrarTodoRegistro("",1,"fechainicio");
?>
<?php include_once("cabecerahtml.php");?>
<?php include_once("cabecera.php");?>
<section class="margin-bottom">
    <div class="container">
        <h2 class="section-title centrar">Cursos</h2>
        <div class="row">
            
            <?php 
            $i=0;
            foreach($cur as $c){$i++;?>
            <div class="col-md-4 col-sm-4 plomo">
                <div class="content-box box-default animated fadeInUp animation-delay-10">
                    <center>
                    <a href="<?php echo $folder?>imagenes/cursos/<?=$c['imagen']?>" target="_blank">
                    <img src="<?php echo $folder?>imagenes/cursos/<?=$c['imagen']?>"  class="img-responsive img-thumbnail" height="100">
                    </a>
                    </center>
                    <h4 class="content-box-title"><?=$c['nombre']?></h4>
                    <b>Fecha de Inicio:</b> <span class="badge badge-primary"><?=$c['fechainicio'];?></span>
                    <p class="text-justify"><?=$c['descripcion']?></p>
                     <div class="alert alert-info"><b>Dirección:</b> <?=$c['direccion'];?></div>
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