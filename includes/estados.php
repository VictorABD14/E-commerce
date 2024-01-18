<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDedatos="implantacion";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDedatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}

	$consulta = "SELECT * FROM estados";
	$ejecutarConsulta = mysqli_query($enlace, $consulta);

	while($fila = mysqli_fetch_array($ejecutarConsulta)){
		echo"<option value='".$fila['id_estado']."'>".$fila['estado']."</option>";
	}

	mysqli_close($enlace);
?>