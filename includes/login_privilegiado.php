<?php



//$conexion=new mysqli('localhost','root','','implantacion');

include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();

$usuario=$_POST['username'];
$password=$_POST['password'];
$md5=md5($password);

$sql="SELECT * FROM usuarios where Usuario='$usuario' and Password='$md5'";

$query=$conexion->query($sql);
$numero=$query->num_rows;
$resultado=$query->fetch_assoc();
if ($numero>0) {

	if($resultado['Id_status_B']==1){

	if ($resultado['Id_perfil']==1) {
		session_start();
		$_SESSION['administrador']=$usuario;
		header('location:../vistas/home_admin.php');
		//echo "<h1> Hola administrador </h1>";
	}elseif($resultado['Id_perfil']==3){
		echo "<h1>Hola vendedor </h1>";
	}elseif ($resultado['Id_perfil']==4) {
		session_start();
		$_SESSION['inventario']=$usuario;
		header('location:../vistas/home_inventario.php');
	}elseif ($resultado['Id_perfil']==5) {
		echo " <h1>Hola contador </h1>";
	 }elseif ($resultado['Id_perfil']==6) {
	 	echo " <h1> Hola alamcenista </h1>";
	 }

	}else{
		echo "error";
	}

	
}else{
	header('location:../vistas/login_modo_privilegiado.php');
	
	//echo "sesion  invalida ";
}


?>