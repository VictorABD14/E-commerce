<?php



//$mysqli=new mysqli('localhost','root','','implantacion');

include("../includes/db.php");

$connect=new db();
$mysqli=$connect->conexion();


/*$id_municipio=$_POST['id_municipio'];

$query="SELECT * FROM parroquias where id_municipio='$id_municipio'";
$resultado=$mysqli->query($query);

while ($row=$resultado->fetch_assoc()) {
	$html.="<option value='".$row['id_parroquia']."'>".$row['parroquia']."</option>";
}

echo $html;*/


$id_municipio = $_POST['id_municipio'];
	
	$query = "SELECT * FROM parroquias WHERE id_municipio = '$id_municipio'";
	$resultado=$mysqli->query($query);
	$html="<option value='0'>seleccionar parroquia</option>";
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['id_parroquia']."'>".$row['parroquia']."</option>";
	}
	echo $html;


?>