<?php
	session_start(); //crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST
	include_once('../baseDatos/Conectar.php');//para poder usar los métodos que están en este archivo
	// isset(), dicha función comprueba si una variable está definida o no en el script de PHP que se está ejecutando.
	$_SESSION['color']='Rojo'; //para el background del alert de mensaje en el index
	if(isset($_POST['edit'])){
		$database = new Connection();//objeto para hacer uso de los métodos para conectar y cerrar con la base de datos
		$db = $database->conectarBD();//conectarse con la base de datos
		try{
			// Captura de los datos que vienen del formulario de edit_delete_modal.php en variables php
			$id = $_GET['id'];//como el parámetros id viene por la URL, deberás leerlos con $_GET
			$cedula = $_POST['txtCedula'];//txtCedula es el name de la caja de texto de cedula
			$nombreCompleto  = $_POST['txtNombreCompleto'];//txtNombreCompleto es el name de la caja de texto de Nombre Completo
			$direccion  = $_POST['txtDireccion'];//txtDireccion es el name de la caja de texto de Dirección
			$telefono  = $_POST['txtTelefono'];//txtTelefono es el name de la caja de texto de Teléfono

			// hacer uso de una declaración preparada para evitar la inyección de sql
			$sql = $db->prepare("UPDATE cliente SET cedula=?, nombre_completo=?, direccion=?, telefono=? WHERE id=?");
			// $_SESSION['message'] contiene el mensaje de éxito o error cuando se ejecuta el insert en la base de datos
			// declaración if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $sql->execute(array($cedula,$nombreCompleto,$direccion,$telefono,$id)) ) ? 'Modificado correctamente' : 'Ocurrió un error. No se pudo modificar';	
			//Una observación que hay que  hacer es que en el update de la líne 17 la lista de campos ?,?,?,?,? va asi (cedula, nombre_completo, direccion, telefono, id), luego cuando ejecutamos el update en la linea 20 las variables que tiene los valores que vienen del formulario edit_delete_modal.php deben ser colocados exactamente en el mismo orden así ($cedula,$nombreCompleto,$direccion,$telefono,$id)
			if($_SESSION['message'] == 'Modificado correctamente'){ 	
				$_SESSION['color']='Verde';
			}//este condicional sirve para cambiar el color de rojo a verde, si el cliente se modificó el fondo del mensaje es verde, si no se modificó es rojo.

		}
		catch(PDOException $e){//Error si falla de alguna manera
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión 
		$database->cerrarBD();
	}
	else{
		$_SESSION['message'] = 'Primero debe llenar el form';
	}

	header('location: index.php');//Cuando termine la ejecución de todo el código se irá a la página index.php llevando consigo el valor de la variable de session  $_SESSION['message'] 