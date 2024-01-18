<?php 

//$conexion=new mysqli('localhost','root','','implantacion');
include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();

if (!empty($_POST['oldpassword'])) {
	$pass=md5($_POST['oldpassword']);
	$resultado="SELECT Password FROM usuarios where Password=? ";
    $stmt=$conexion->prepare($resultado);
    $stmt->bind_param("s",$pass);
    $stmt->execute();
    $stmt->bind_result($resultado);
    $stmt->fetch();
    $opass=$resultado;
    if($opass==$pass)
    	echo "<span style='color:green'>Contraseña coincide.</span>";
    else
    	echo "<span style='color:red'>Contraseña no coincide";
}



?>