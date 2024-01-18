<?php

//$conexion=new mysqli('localhost','root','','implantacion');
include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();

session_start();

$id=$_GET['id'];

$Primer_nombre=$_POST['Primer_nombre'];
$Segundo_nombre=$_POST['Segundo_Nombre'];
$Primer_apellido=$_POST['Primer_apellido'];
$Segundo_apellido=$_POST['Segundo_Apellido'];
$Usuario=$_POST['Usuario'];
$tipo_c=$_POST['Tipo_C'];
$cedula=$_POST['Cedula'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$estado=$_POST['cbx_estado'];
$municipio=$_POST['cbx_municipio'];
$parroquia=$_POST['cbx_parroquia'];
$ciudad=$_POST['cbx_ciudad'];
$status=$_POST['id_status_B'];
$perfil=$_POST['perfil'];


$sql="UPDATE usuarios SET Primer_nombre='$Primer_nombre',Segundo_Nombre='$Segundo_nombre',Primer_apellido='$Primer_apellido',Segundo_Apellido='$Segundo_apellido',Usuario='$Usuario',Tipo_C='$tipo_c',Cedula='$cedula',email='$email',telefono='$telefono',id_estado='$estado',id_municipio='$municipio',id_parroquia='$parroquia',id_ciudad='$ciudad',Id_status_B='$status',Id_perfil='$perfil' where Id_usuario='$id'";



$query=$conexion->query($sql);

if ($query) {

	echo "<script>alert('Actualizado con exito')
	              window.location.href='../vistas/editar_perfil.php'</script>";
}













?>