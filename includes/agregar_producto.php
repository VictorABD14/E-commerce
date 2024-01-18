<?php 

//$conexion=new mysqli('localhost','root','','implantacion');
include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();


$codigo=$_POST['barcode'];
$imagen=$_FILES['imagen']['name'];
$nombre_producto=$_POST['name'];
$descripcion=$_POST['description'];
$precio=$_POST['price'];
$cantidad_total=$_POST['cantidad_total'];
$cantidad_inicial=$_POST['cantidad_inicial'];
$precio_dolares=$_POST['price_dolares'];



if ((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']== UPLOAD_ERR_OK))) {

		$destino_de_ruta="../vistas/images/";

		move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta.$_FILES['imagen']['name']);
		echo "El archivo ".$_FILES['imagen']['name']."se ha copiado en el directorio de imagenes";
		
	}else{
		echo "el archivo no se ha copiado en el directorio de imagenes";
	}





$sql="INSERT INTO `producto`( `codigo_producto`,`imagen_producto`, `Nombre_producto`, `Descripcion_producto`, `Precio`,`Precio_dolares`, `Cantidad_total`) VALUES ('$codigo','$imagen','$nombre_producto','$descripcion','$precio','$precio_dolares','$cantidad_total')";
$query=$conexion->prepare($sql);
$query->execute();

if ($query) {
	echo "<script>alert('Producto ingresado correctament a la base d datos')</script>";
header('location:../vistas/agregar_producto.php');
} else {
	echo "error: " . $query->$php_errormsg;
}


?>


