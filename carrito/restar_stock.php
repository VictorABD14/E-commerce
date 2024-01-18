<?php
session_start();
//$conexion=new mysqli('localhost','root','','implantacion');
include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();
$id_usuario=$_SESSION['id'];
$factura=$_SESSION['factura'];


/*$query_sentencia=$conexion->query("SELECT count(id_venta) + 1 as suma_venta  from ventas");
$row=$query_sentencia->fetch_assoc();

	
//echo $row['suma_venta'];


$suma_venta=$row['suma_venta'];
define('suma_venta', $suma_venta);
$constante=suma_venta;


define('factura', $_SESSION['factura']);
$factura=factura;*/



foreach ($_SESSION['cart'] as $key => $value) {
	$cantidad=$value['item_quantity'];
	$id=$value['id_producto'];
	$precio=$value['precio'];
	$Precio_dolares=$value['Precio_dolares'];
	$Nombre_producto=$value['nombre_producto'];


	$sql="UPDATE producto SET cantidad_total=cantidad_total-'$cantidad' where id_producto='$id'";
	$query=$conexion->query($sql);


	if ($query){


     $sql1="INSERT INTO ventas(Id_producto,Nombre_producto,cantidad,Precio,Precio_dolares,Id_usuario) VALUES ('$id','$Nombre_producto','$cantidad','$precio','$Precio_dolares','$id_usuario')";
		$query1=$conexion->prepare($sql1);
		$query1->execute();
		
		
        if ($query1){
        	

        	echo "<script>alert('Compra exitosa')

        	    window.location.href='cart.php'</script>";

        	    unset($_SESSION['cart']); 
        	    unset($_SESSION['factura']); 
        }else{
        	echo "ha dado error";
        }
   

	}else{
		echo "nos ha dado error";
	}



   
		


}








?>