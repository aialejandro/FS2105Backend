<?php

	include('conexion.php');

	//verificamos la conexion
	if ($conex) {
		echo "Conexión exitosa...";
	}
	else {
		echo "Error de conexión con base de datos" ;			
	}

	//recuperar las variables
	$asunto = trim($_POST['asunto']);
	$email = trim($_POST['email']);
	$mensaje = trim($_POST['mensaje']);

	//hacemos la sentencia de sql
	$sql = "INSERT INTO consultas_visitantes(email, asunto, mensaje) VALUES ('$asunto','$email','$mensaje')";
	
	//ejecutamos la sentencia de sql
	
	$ejecutar = mysqli_query($conex,$sql);
	
	//verificamos la ejecucion
	if ($ejecutar) {
		echo "Datos Guardados Correctamente<br><a href='index.html'>Volver</a>";
	} else {
		echo "Los datos no fueron guardados...";
	}
?>