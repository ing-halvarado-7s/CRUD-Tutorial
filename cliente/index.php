<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
	<title>CRUD Clientes</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/custom.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/font-awesome.css">
</head>
<body>
<div class="container">
	
	<h1 class="page-header text-center">Gestionar Clientes</h1>
	<div class="row"> <!-- Fila  | Bootsrap -->
		<div class="col-sm-12"> <!-- Bootstrap divide las filas en 12 columnas - col, acá estamos indicando que ocupará el 100% del espacio de la pantalla  -->

			<!-- botónn para agregar un nuevo cliente | Hace un llamado href="#addnew", ese id se encuentra en add_modal.php, este código se encarga de mostrar una formulario modal para incluir los datos. Para que esto funcione se agrega el arhivo add_modal.php casi al final de este archivo -->
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="fa fa-plus"></span> Nuevo</a>
			<!-- El código que está entre la línea 20 y la 32 sirve para mostrar los mensajes de éxito o error cuando se guarda, se edita o se elimina. Se muestra un alert con el contenido de $_SESSION['message'] -->
			<?php 
                session_start();
                if(isset($_SESSION['message'])){
					if($_SESSION['color']=='Verde')
						echo '<div class="alert alert-dismissible alert-success" style="margin-top:20px;">';
					else
						echo '<div class="alert alert-dismissible alert-danger" style="margin-top:20px;">';
					?>
					
                    
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
			?>
			<!-- creación de la tabla donde se mostrarán los datos -->
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead> <!-- encabezados de la tabla -->
					<th>Cédula</th>
					<th>Nombre Completo</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Acción</th>
				</thead>
				<tbody>
					<?php
						// incluye la conexión
						include_once('../baseDatos/Conectar.php');

						$database = new Connection(); //Clase para usar los métodos de conectar y cerrar la conexión a la base de datos
    					$db = $database->conectarBD(); //Método para conectarse a la base de datos
						try{	
						    $sql = 'SELECT * FROM cliente'; //Consulta de todos los datos a la tabla cliente
						    foreach ($db->query($sql) as $row) { //Ciclo para reccorrer todos los datos de la consulta anterior
						    	?>
						    	<tr>
									<!-- Con el echo $row[''] estamos asignando el valor a esa celda de la tabla en el index.php, lo que va entre las comillas simples de row es en nombre exacto del campo de la tabla cliente de la base de datos que queremos mostrar en ese espacio de la tabla. Cuando haga clic en editar/eliminar enviará al formulario que está en edit_delete_modal los datos del row-->
                                    <td><?php echo $row['cedula']; ?></td> 
						    		<td><?php echo $row['nombre_completo']; ?></td>
						    		<td><?php echo $row['direccion']; ?></td>
						    		<td><?php echo $row['telefono']; ?></td>
						    		<td>
										<!-- Botón para editar-->
										<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
										<!--Botón para eliminar -->
						    			<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
						    		</td>
						    		<?php include('edit_delete_modal.php'); ?><!-- Esta inclusión permite hacer el llamado a las pantallas modales para modificar y eliminar el cliente cuando el usuario le hace clic a los botones Editar y Eliminar respectivamente -->
						    	</tr>
						    	<?php 
						    }
						}
						catch(PDOException $e){
							echo "Este es un problema con la conexión de la base de datos: " . $e->getMessage();
						}

						//cerrar conexión
						$database->cerrarBD();

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('add_modal.php'); ?> <!-- Esta inclusión permite hacer el llamado a la pantalla modal para incluir el cliente uando el usuario le hace clic al botón nuevo -->
<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>

</body>
</html>