<?php
$folder="";

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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3825.2973582328323!2d-68.12834618305348!3d-16.511078947344984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sbo!4v1524399622432" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
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