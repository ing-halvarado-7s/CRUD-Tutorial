<!-- En este archivo se encuentra el código del formulario que se muestra en una ventana modal cuando el usuario hace clic en el boton editar si el id comienza por: edit_, o eliminar si id=delete_id de index.php -->

<!-- Editar. Si hace clic en el botón editar  de una de las filas de la tabla de index.php se viene por esta modal -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><!-- Encabezado de la modal-->
            	 <center><h4 class="modal-title" id="myModalLabel">Editar Cliente</h4></center><!-- Título de la modal-->
				 <!--Botón X. para cerrar la modal. Si hace clic aqui se cierra la modal y no se edita el cliente -->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div><!-- Fin del encabezado -->

            <div class="modal-body"><!-- Contenido de la modal -->
			<div class="container-fluid">
			<!-- Formulario que envia los datos al archivo edit.php, en este archivo se encuentra el código para editar la información del cliente en la tabla cliente en la base de datos bdcliente. El formulario envia los datos cuando el usuario hace clic en el botón de tipo submit, en el action envia el id del cliente a trav+es del parámetro id 	 -->
			<form method="POST" action="edit.php?id=<?php echo $row['id']; ?>">
				<div class="row form-group"><!-- Inicio del row para cédula  -->
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Cédula:</label>
					</div>
					<div class="col-sm-10">

						<input type="text" class="form-control" name="txtCedula" value="<?php echo $row['cedula']; ?>">
						<!-- El name txtCedula es el que se va a usar para pasar el valor que escriba el usuario en la cajita de texto al archivo add.php. Y el value es el valor que se va a mostrar en la caja de texto antes de que se edite, ese es el valor que tiene el campo cedula en la tabla cliente en la base de datos-->
					</div>
				</div><!-- Fin del row para  cédula -->
				<div class="row form-group"><!-- Inicio del row para nombre completo  -->
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombre Completo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="txtNombreCompleto" value="<?php echo $row['nombre_completo']; ?>">
						<!-- El name txtNombreCompleto es el que se va a usar para pasar el valor que escriba el usuario en la cajita de texto al archivo add.php. Y el value es el valor que se va a mostrar en la caja de texto antes de que se edite, ese es el valor que tiene el campo nombre_completo en la tabla cliente en la base de datos-->
					</div>
				</div><!-- Fin del row para  -->
				<div class="row form-group"><!-- Inicio del row para nombre completo  -->
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Dirección:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="txtDireccion" value="<?php echo $row['direccion']; ?>">
						<!-- El name txtdireccion la es el que se va a usar para pasar el valor que escriba el usuario en la cajita de texto al archivo add.php. Y el value es el valor que se va a mostrar en la caja de texto antes de que se edite, ese es el valor que tiene el campo direccion la en la tabla cliente en la base de datos-->
					</div>
				</div><!-- Fin del row para teléfono  -->
				<div class="row form-group"><!-- Inicio del row para nombre completo  -->
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Teléfono:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="txtTelefono" value="<?php echo $row['telefono']; ?>">
						<!-- El name txtTelefono es el que se va a usar para pasar el valor que escriba el usuario en la cajita de texto al archivo add.php. Y el value es el valor que se va a mostrar en la caja de texto antes de que se edite, ese es el valor que tiene el campo telefono en la tabla cliente en la base de datos-->
					</div>
				</div><!-- Fin del row para teléfono -->
            </div> 
			</div>
            <div class="modal-footer"><!-- Pie de la modal -->
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button><!-- Botón para cancelar la modal, cierra la modal. Si hace clic aqui se cierra la modal y no se edita el cliente -->
                <button type="submit" name="edit" class="btn btn-success">
					<span class="fa fa-check"></span> Actualizar</button><!-- Cuando el usuario hace clic en este botón los datos son enviados a edit.php-->
			</form>
            </div>

        </div>
    </div>
</div><!-- Fin de la modal de editar -->

<!-- Eliminar. Si hace clic en el botón eliminar  de una de las filas de la tabla de index.php se viene por esta modal -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><!-- Inicio del encabezado de la modal -->
				<center><h4 class="modal-title" id="myModalLabel">Borrar cliente</h4></center><!-- Título de la modal -->
				<!--Botón X. para cerrar la modal. Si hace clic aqui se cierra la modal y no se elimina el cliente-->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div><!--Fin del encabezado de la modal -->
			
            <div class="modal-body">	<!-- Inicio del cuerpo de la modal -->
            	<p class="text-center">¿Estas seguro en borrar los datos de?</p>
				<h2 class="text-center"><?php echo $row['nombre_completo']; ?></h2><!-- Nombre del cliente -->
			</div><!--Fin del cuerpo de la modal -->

            <div class="modal-footer"><!-- -->
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button><!--Botón para cancelar.Si hace clic aqui se cierra la modal y no se eliminael cliente -->
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a><!--Botón para eliminar. Si hace clic aqui se elimina al cliente de la la tabla cliente de la base de datos -->
            </div>

        </div>
    </div>
</div><!--Fin de la modal de eliminar -->
