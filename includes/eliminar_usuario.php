<?php

include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();
session_start();
$id_usuario=$_GET['id'];

$sql="DELETE  FROM usuarios WHERE Id_usuario='$id_usuario'";

$query=$conexion->query($sql);
if ($query) {
	echo "<script>alert('Actualizado con exito')
	              window.location.href='../vistas/gestionar_usuarios.php'</script>";
}




?>