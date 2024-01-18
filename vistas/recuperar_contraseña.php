<?php

 include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();
session_start();

 if (isset($_POST['cambiar'])) {
  
 

if (isset($_SESSION['email'])) {

  $nombre=$_SESSION['usuario'];
  $email=$_SESSION['email'];

  $contraseña=md5($_POST['password']);

  $sql="UPDATE usuarios set Password='$contraseña' where Usuario='$nombre' and email='$email'";

  $query=$conexion->query($sql);
  if ($query) {
   echo "<script>alert('Contraseña cambiada correctamente');</script>";
echo "<script>window.location.href ='../pagina-principal.php'</script>";
  }
  
}
}

/*if (isset($_POST['recuperar'])) {
 $nombre=$_POST['username'];
 $email=$_POST['email'];

 $sql="SELECT * FROM usuarios where Usuario='$nombre' and email='$email' ";
 $query=$conexion->query($sql);
 $numero=$query->num_rows;
 if ($numero>0) {
   header('location:recuperar_contraseña.php');
 }else{
  echo "<script>alert('Datos invalidos. Por favor intente de nuevo');</script>";
echo "<script>window.location.href ='olvidar_contraseña.php'</script>";
 }
}
*/

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cambio de contraseña</title>
  <meta name="viewport" content="width=device-width ,initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="../main.css">
     <link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
     <style type="text/css">
          .ana{
               background-color: red;
               color: white;
               border-radius: 3px;
               padding: 10px;
               width: 60%;
               font-size: 0.9em;
          }
         input[type=email]{
  padding: 10px;
  font-size: 18px;
  outline: none;
  width: 370px;
}

     </style>
     <script type="text/javascript">
function valid()
{
 if(document.passwordreset.password.value!= document.passwordreset.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.passwordreset.password_again.focus();
return false;
}
return true;
}
</script>
</head>
<body>
  <div class="" style="margin-top: 25px;">
     
   <div class="container">
    <div class="row">
      <div class="col-sm-10 col-lg-12">
        <div class="col-lg-12 col-sm-12">
  <form action="" method="POST" name="passwordreset" onSubmit="return valid();">

  <?php

     if (isset($errorlogin)) {
      echo"<div class='ana'> ".$errorlogin."</div>";
     }
   ?>

     <h2>Recupera contraseña</h2>

     <p>Ingrese su nueva contraseña<br>

     <input type="password" id="password" name="password" placeholder="Contraseña" required></p>

     <pa>Ingrese de nuevo su contraseña<br>
     <input type="password"  id="password_again" name="password_again" placeholder="Contraseña de nuevo" required>
          <br>
          <br>
      <p class="center"><input type="submit" value="cambiar" name="cambiar" style="cursor: pointer; "></p>


     </form>
   
   
   
    
    </div>
  </div>
  </div>
   </div>
  </div>
</div>

</body>
</html>