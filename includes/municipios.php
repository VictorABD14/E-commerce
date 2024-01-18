<script>
	function obtener_parroquia(val){
$.ajax({
type: "POST",
url: "parroquia.php",
data:'d='+val,
success: function(data){
//alert(data);
$('#parroquia').val(data);
}
});
}
</script>


<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDedatos="implantacion";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDedatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}

	$consulta = "SELECT * FROM municipios";
	$ejecutarConsulta = mysqli_query($enlace, $consulta);
	
	echo'<select name="municipio"  style="width: 60%;" id="select" onChange="obtener_parroquia(this.value);" class="col-4 form-control">';
		while($fila=mysqli_fetch_array($ejecutarConsulta)){
			if($fila['id_estado']==$_GET['c']){
				
				echo "<option value='".$fila['id_municipio']."'>".$fila['municipio']." </option>";
				

			}
		}

	echo'</select>';
?>