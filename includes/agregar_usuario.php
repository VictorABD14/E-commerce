<?php


//$conexion=new mysqli('localhost','root','','implantacion');
include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();

$primer_nombre=$_POST['p_nombre'];
$segundo_nombre=$_POST['s_nombre'];
$primer_apellido=$_POST['p_apellido'];
$segundo_apellido=$_POST['s_apellido'];
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$tipo_c=$_POST['tipo_c'];
$cedula=$_POST['cedula'];
$estado=$_POST['cbx_estado'];
$municipio=$_POST['cbx_municipio'];
$parroquia=$_POST['cbx_parroquia'];
$ciudad=$_POST['cbx_ciudad'];
$imagen=$_FILES['imagen']['name'];
$genero=$_POST['genero'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$estatus=$_POST['estatus'];
$perfil=$_POST['perfil'];
$direccion=$_POST['direccion'];
$md5=md5($password);


if ((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']== UPLOAD_ERR_OK))) {

        $destino_de_ruta="../vistas/images/";

        move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta.$_FILES['imagen']['name']);
        echo "El archivo ".$_FILES['imagen']['name']."se ha copiado en el directorio de imagenes";
        
    }else{
        echo "el archivo no se ha copiado en el directorio de imagenes";
    }


    $sql="INSERT INTO `usuarios`(`Imagen_usuario`,`Primer_nombre`, `Segundo_Nombre`, `Primer_apellido`, `Segundo_Apellido`, `Usuario`, `Password`,`Tipo_C`,`cedula`,`Direccion`, `id_estado`, `id_municipio`, `id_parroquia`, `id_ciudad`,`genero`,`email`,`telefono`,`Id_status_b`,`Id_perfil`) VALUES ('$imagen','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$usuario','$md5','$tipo_c','$cedula','$direccion','$estado','$municipio','$parroquia','$ciudad','$genero','$email','$telefono','$estatus','$perfil')";
$resultado=$conexion->prepare($sql);
$resultado->execute();
//$resultado=mysqli_query($conexion,$sql);
if ($resultado==true) {
   

 

  header('location:../vistas/agregar_usuario.php');
}else{
    echo "no exitoso";
}












?>