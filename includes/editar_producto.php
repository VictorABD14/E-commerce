<?php
include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();

session_start();

$id=$_GET['id'];

$Nombre_producto=$_POST['Nombre_producto'];
$Descripcion_producto=$_POST['Descripcion_producto'];
$Precio=$_POST['Precio'];
$Precio_dolares=$_POST['Precio_dolares'];
$cantidad_total=$_POST['cantidad_total'];



$sql="UPDATE producto SET Nombre_producto = '$Nombre_producto', Descripcion_producto= '$Descripcion_producto', Precio='$Precio', Precio_dolares = '$Precio_dolares', cantidad_total = '$cantidad_total' WHERE id_producto='$id'";



$query=$conexion->query($sql);

if ($query) {

	echo "<script>alert('Actualizado con exito')
	              window.location.href='../vistas/ver_productos.php'</script>";
}

?>