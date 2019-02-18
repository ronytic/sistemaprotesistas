<?php
$folder="";
include_once("class/filial.php");
$filial=new filial;
$fil=$filial->mostrarTodoRegistro('',1,"nombre");
?>
<?php include_once("cabecerahtml.php");?>
<?php include_once("cabecera.php");?>
<section class="margin-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
            	<h2 class="section-title centrar">Contactos</h2>
                <div class="content-box box-default animated fadeInUp animation-delay-10">
                   <div class="col-md-6">
				   <h4 class="content-box-title text-left">Nuestras Filiales</h4>	
						<?php
						foreach($fil as $f){
							?>
							<div class="text-left">
							<h5><?=$f['nombre'];?></h5>
							<strong> Presidente: </strong><?=$f['presidente'];?><br>
							<strong> Dirección: </strong><?=$f['direccion'];?><br>
							<strong> Teléfono: </strong><?=$f['telefono'];?><br>
							</div>
							<?php
						}
						?>
                    
                    
					</div>
                    <div class="col-md-6">
                    <h4 class="content-box-title">Datos de Contacto</h4>
                    
                    	<form action="mailto:contacto@fbld.com">
                    		<tr>
                    			<td><p class="pull-left"><b>Nombres:</b></p>
                    				<br>
                    				<input type="text" class="form-control" name="nombres">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td><p class="pull-left"><b>Apellidos:</b></p>
                    				<br>
                    				<input type="text" class="form-control" name="apellidos">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td><p class="pull-left"><b>Correo:</b></p>
                    				<br>
                    				<input type="email" class="form-control" name="correo">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td><p class="pull-left"><b>Teléfono o Celular:</b></p>
                    				<br>
                    				<input type="tel" class="form-control" name="telefono">
                    			</td>
                    		</tr>
                    		<tr>
                    			<td><p class="pull-left"><b>Comentario:</b></p>
                    				<br>
                    				<textarea class="form-control" name="comentario" rows="6"></textarea>
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>
                    				<br>
                    				<input type="submit" value="Enviar Comentario" class="btn btn-success">
                    			</td>
                    		</tr>
                    	</form>

                    
                    </div>
                </div>
            </div>
                     
        </div>
    </div>
</section>


<?php include_once("pie.php");?>