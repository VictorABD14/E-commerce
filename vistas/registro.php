<?php 
// $mysqli=new mysqli('localhost','root','','implantacion');
include("../includes/db.php");

$connect=new db();
$mysqli=$connect->conexion();
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
	<!--<link rel="stylesheet" type="text/css" href="../estilo.css">-->
	<link rel="stylesheet" type="text/css" href="main.css">
	<style>
		form{
	background-color: #eee;
	margin: 0 auto;
	width: 400px;
	padding: 20px;


}
		input[type=text]{
	padding: 10px;
	font-size: 15px;
	outline: none;
	width: 370px;
}
input[type=email]{
	padding: 10px;
	font-size: 15px;
	outline: none;
	width: 370px;
}
input[type=phone]{
	padding: 10px;
	font-size: 15px;
	outline: none;
	width: 370px;
}
input[type=password]{
	padding: 10px;
	font-size: 15px;
	outline: none;
	width: 370px;
}
	</style>
	<script language="javascript" src="jquery-3.1.1.min.js"></script>
	<script>
	
    $(document).ready(function(){
    	$("#cbx_estado").change(function(){
    		$('#cbx_ciudad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
    		$("#cbx_estado option:selected").each(function(){
    			id_estado=$(this).val();
    			$.post("../includes/getmunicipio.php",{id_estado:id_estado},function(data){
                $("#cbx_municipio").html(data);
    			});
    		});
    	});
    });


    $(document).ready(function(){
    	$("#cbx_municipio").change(function(){
    		
    		$("#cbx_municipio option:selected").each(function(){
            id_municipio=$(this).val();
            $.post("../includes/getlocalidad.php",{id_municipio:id_municipio},function(data){
            	$("#cbx_parroquia").html(data);
            });
    		});
    	});
    });


    $(document).ready(function(){
    	$("#cbx_estado").change(function(){
    		
    		$("#cbx_estado option:selected").each(function(){
            id_municipio=$(this).val();
            $.post("../includes/getciudad.php",{id_estado:id_estado},function(data){
            	$("#cbx_ciudad").html(data);
            });
    		});
    	});
    });


	</script>
</head>
<body>
	<div class="" style="text-align: center;">

	<h1 style="padding: 10px 350px; font-size: 1.8em;">Registrate en el Sistema</h1>

   </div>

       <div class="formulario ">
       	<div class="">
	
		<form action="../includes/registrar.php " method="POST"  enctype="multipart/form-data">
			<table>

				

                    <label >Primer Nombre</label>
					
					<td><input type="text" placeholder="Ingresa tu primer nombre " name="p_nombre" required>
					</td>
					

					</tr>

				<tr>

					
					<td><label >Segundo Nombre</label><input type="text" placeholder="Ingresa tu segundo nombre " name="s_nombre" required >
					</td>
					

					</tr>

					

				<tr>
					
					<td><label>Primer apellido</label><input type="text" placeholder="Ingresa tu primer apellido " name="p_apellido" required >
					</td>
					

					</tr>


				<tr>
					
					<td><label >Segundo apellido</label><input type="text" placeholder="Ingresa tu segundo apellido " name="s_apellido" required>
					</td>
					

					</tr>




					<tr>
					
					<td><label >Nombre de usuario</label><input type="text" placeholder="Ingresa tu nombre de usuario " name="usuario" required>
					</td>
					

					</tr>
					

					<tr>
					
					<td><label >Contraseña</label><input type="password" placeholder="Ingresa tu Contraseña " name="password" required>

					</td>
					</tr>

					

					<tr>
                   	
                   	<td></td>
                   </tr>
                   <tr>
                   	
                   	<td></td>
                   </tr>
                    <tr>
                   	
                   	<td></td>
                   </tr>




                  <tr>
					
					<td><div>Selecciona estado: <select name="cbx_estado" id="cbx_estado" class="form-control">
			<option value="0">Seleccionar estado</option>
			<?php
			$query="SELECT * FROM estados";
            $resultado=$mysqli->query($query);

            while($row=$resultado->fetch_assoc()){?>
            	<option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
            <?php }?>
			

		</select>
			
		</div>
					</td>
					

					</tr>


					<tr>
                   	
                   	<td></td>
                   </tr>
                   <tr>
                   	
                   	<td></td>
                   </tr>
                    <tr>
                   	
                   	<td></td>
                   </tr>



					<tr>
					
					<td><div>Selecciona municipio<select name="cbx_municipio" id="cbx_municipio" class="form-control"></select></div>
					</td>
					

					</tr>
                   
                   <tr>
                   	
                   	<td></td>
                   </tr>
                   <tr>
                   	
                   	<td></td>
                   </tr>
                    <tr>
                   	
                   	<td></td>
                   </tr>


					<tr>
					
					<td><div>Selecciona parroquia <select name="cbx_parroquia" id="cbx_parroquia" class="form-control"></select></div>
					</td>
					

					</tr>

					<tr>
                   	
                   	<td></td>
                   </tr>
                   <tr>
                   	
                   	<td></td>
                   </tr>
                    <tr>
                   	
                   	<td></td>
                   </tr>


					<tr>
					
					<td><div>Selecciona ciudad <select style="height: 50px;border-radius: 5px;" name="cbx_ciudad" id="cbx_ciudad" class="form-control"></select></div>
					</td>
					

					</tr>
					<tr>
                   	
                   	<td></td>
                   </tr>

					<tr>
                   	
                   	<td></td>
                   </tr>
                    <tr>
                   	
                   	<td></td>
                   </tr>


                   <tr>
					
					<td><label >Direccion</label><input type="text" placeholder="Ingresa tu Direccion " name="direccion" required>

					</td>
					</tr>

						<td></td>
                   </tr>
                    <tr>
                   	
                   	<td></td>
                   </tr>

                   


				<tr>
					
					<td><select name="tipo_c" class="form-control" style="width: 60%;" required>
						<option>Tipo cedula</option>
						<option value="V">V</option>
						<option value="E">E</option>
					</select>
					</td>
					

					</tr>


					<tr>
                   	
                   	<td></td>
                   </tr>
                   <tr>
                   	
                   	<td></td>
                   </tr>
                    <tr>
                   	
                   	<td></td>
                   </tr>



				<tr>
					
					<td><input type="text" placeholder="Ingresa su cedula "  name="cedula" required>
					</td>
					

					</tr>



					<tr>

						
						<td>

							<input type="radio" name="genero" value="M"  >Masculino
							<input type="radio" name="genero" value ="F">Femenino
						</td>
					</tr>
					<tr>
						
						<td><label >Correo electronico</label><input type="email" placeholder="Ingresa tu correo electronico" name="email" required ></td>
						
					</tr>
					
					<tr>

						
						<td>
							<label >Telefono</label>
                          <input type="text" placeholder="Ingresa tu telefono" name="telefono"   style="padding:10px;" required>
                      </td>
                  </tr>

                   <tr>
                   	<td></td>

                   </tr>
                   <tr>
                   	<td></td>
                   </tr>

                   <tr>

					
					<td><label >Ingrese una imagen de usuario</label> <input type="file" name="imagen" id="image" placeholder="">
					</td>
					

					</tr>



                  <tr>
                  	<tr>
                     <td></td>
                     <br>
                  	</tr>
                  	<tr>
                  		<td></td>

                  	</tr>

                  	
                  	<td>

                  		<input type="submit" class="btn btn-success" value="Registrar" name="enviar">
                  		
                  	</td>
                  	
                  </tr>
				
              </table>
          </form>
          <button class="btn btn-info" style="color: white;"><a href="../index.php">Volver</a></button>
      </div>

      </div>
     
</body>
</html>