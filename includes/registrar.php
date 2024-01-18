<?php


$imagen=$_FILES['imagen']['name'];
$p_nombre=$_POST['p_nombre'];
$s_nombre=$_POST['s_nombre'];
$p_apellido=$_POST['p_apellido'];
$s_apellido=$_POST['s_apellido'];
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$estado=$_POST['cbx_estado'];
$municipio=$_POST['cbx_municipio'];
$parroquia=$_POST['cbx_parroquia'];
$ciudad=$_POST['cbx_ciudad'];
$direccion=$_POST['direccion'];
$tipo_c=$_POST['tipo_c'];
$cedula=$_POST['cedula'];
$genero=$_POST['genero'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$md5=md5($password);
$fecha=date('d/m/Y h:i:s', time());

//$conexion=new mysqli("localhost","root","","implantacion");
include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();

//$sql="SELECT * FROM usuarios where id_usuario='0'";
//$sql="INSERT INTO 'usuarios'(PrimerNombre,SegundoNombre,PrimerApellido,SegundoApellido,usuario,password,Tipo_c,cedula,genero,email,telefono,Id_status_b,fecha) VALUES('$pnombre','$snombre','$papellido','$sapellido','$usuario','$md5','$tipo_c','$cedula','$genero','$telefono',1,'$fecha')";

/*$query="INSERT INTO usuarios (Primer_nombre) values (?)";
$resultado=$conexion->prepare($query);
$resultado->bind_param("s",$pnombre);
$resultado->execute();
*/

if ((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']== UPLOAD_ERR_OK))) {

        $destino_de_ruta="../vistas/images/";

        move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta.$_FILES['imagen']['name']);
        echo "El archivo ".$_FILES['imagen']['name']."se ha copiado en el directorio de imagenes";
        
    }else{
        echo "el archivo no se ha copiado en el directorio de imagenes";
    }


   




//$sql="INSERT INTO 'usuarios'('Primer_nombre') values('$p_nombre')";
$sql="INSERT INTO `usuarios`(`Imagen_usuario`,`Primer_nombre`, `Segundo_Nombre`, `Primer_apellido`, `Segundo_Apellido`, `Usuario`, `Password`,`Tipo_C`,`cedula`,`direccion`, `id_estado`, `id_municipio`, `id_parroquia`, `id_ciudad`,`genero`,`email`,`telefono`,`Id_status_b`,`Id_perfil`) VALUES ('$imagen','$p_nombre','$s_nombre','$p_apellido','$s_apellido','$usuario','$md5','$tipo_c','$cedula','$direccion','$estado','$municipio','$parroquia','$ciudad','$genero','$email','$telefono',1,2)";
$resultado=$conexion->prepare($sql);
$resultado->execute();
//$resultado=mysqli_query($conexion,$sql);
if ($resultado==true) {
   
  echo "completo exitoso";


  header('location:../index.php');
}else{
    echo "no exitoso";
}





/*    echo $row['Primer_nombre'];
    echo $row['cedula'];
}
*/


/*$campos=array();

    		if ($p_nombre=="") {
    			array_push($campos, "el campo nombre no puede estar vacio");
    		}
    		if ($usuario=="") {
    			array_push($campos, "el campo usuario no puede estar vacio");
    		}

    		if ($password=="" || strlen($password)< 6) {
    			array_push($campos, "el campo password no puede estar vacio ni tener menos de 6 caracteres");
    		}

    		if ($genero=="") {
	       array_push($campos, "selecciona un genero");
               }

    		if ($email=="" || strpos($email, "@")===false) {
    			array_push($campos, "el campo email no puede estar vacio y debe tener @");
    		}

    		if(count($campos)>0){
    			echo "<div class='error'>";
    			for ($i=0; $i < count($campos) ; $i++) { 
    				echo "<li>".$campos[$i]."</i>";
    			}
    		}else{
    			$insertar=new registro();

           //$insertar->registrar($p_nombre,$s_nombre,$p_apellido,$s_apellido,$usuario,$password,$genero,$tipo_c,$cedula,$email,$telefono);

    		}


*/


















?>