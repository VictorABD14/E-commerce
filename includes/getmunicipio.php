<?php


//$mysqli=new mysqli('localhost','root','','implantacion');

include("../includes/db.php");

$connect=new db();
$mysqli=$connect->conexion();

$id_estado=$_POST['id_estado'];

$query="SELECT * FROM municipios where id_estado='$id_estado'";
$resultado=$mysqli->query($query);

$html="<option value='0'>seleccionar municipio</option>";
while ($row=$resultado->fetch_assoc()) {
	$html.="<option value='".$row['id_municipio']."'>".$row['municipio']."</option>";
}

echo $html;



?>