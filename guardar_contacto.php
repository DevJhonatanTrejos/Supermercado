<?php

	// Conexión a la base de datos
	$conexion = new mysqli("localhost","root","","facturacion_bd");

	if ($conexion->connect_error) {
		die("Error de conexión: " . $conexion->connect_error);
	}

	// Recibir datos del formulario
	$nombre 	= 	$_POST['name'];
	$email 		= 	$_POST['email'];
	$asunto		= 	$_POST['asunto'];
	$telefono	=	$_POST['phone'];
	$mensaje	=	$_POST['mensaje'];


	// Insertar en la base de datos
	$sql = "INSERT INTO contacs (name, email, asunto, phone, mensaje) VALUES (?, ?, ?, ?, ?)";
	$stmt = $conexion->prepare($sql);
	$stmt->bind_param("sssss", $nombre, $email, $asunto, $telefono, $mensaje);


	if ($stmt->execute()) {
    	echo "✅ Mensaje enviado correctamente";
    	echo "<br><a href='contactenos.php'>Volver</a>";
	} else {
	    echo "❌ Error: " . $stmt->error;
	}

	$stmt->close();
	$conexion->close();


?>