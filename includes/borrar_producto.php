<?php
include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();

session_start();

$id=$_GET['id'];


$sql="DELETE FROM producto  WHERE id_producto='$id'";



$query=$conexion->query($sql);

if ($query) {

	echo "<script>alert('Borrado con exito')
	              window.location.href='../vistas/ver_productos.php'</script>";
}

?>