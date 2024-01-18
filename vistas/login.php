<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
  <meta name="viewport" content="width=device-width ,initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="shortcut icon" href="vistas/images/fondo.jfif" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="main.css">
     <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
     <style type="text/css">
          .ana{
               background-color: red;
               color: white;
               border-radius: 3px;
               padding: 10px;
               width: 60%;
               font-size: 0.9em;
          }
         .btn{
          background-color: #1E69E3 ;
	color: white;
	padding: 8px;
	border:5px;
	width: 200px;
         }

     </style>
     <link rel="stylesheet" href="extra.css">
</head>
<body>
  <div class="banner-bg" style="width: 100%; height: 100%">
     <div style="padding: 10px;">
         <button class="btn btn-primary"> <a href="vistas/login_modo_privilegiado.php" style="color: white; align-content: right;text-decoration: none;">Ingresar en modo Administrador</a></button>
     </div>
   <div class="container">
    <div class="row">
      <div class="col-sm-10 col-lg-12">
        <div class="col-lg-12 col-sm-12">
	<form action="" method="POST">

	<?php

     if (isset($errorlogin)) {
     	echo"<div class='ana'> ".$errorlogin."</div>";
     }
	 ?>

     <h2>Iniciar Sesion</h2>

     <p>Nombre de usuario: <br>

     <input type="text" name="username"></p>

     <pa>Password:<br>
     	<input type="Password" name="password">
          <br>
          <br>
     	<p class="center"><input type="submit" value="Iniciar Sesion" name="login" style="cursor: pointer; "></p>


     </form>
   
   
   
    <div class="container">
      
        No tienes una cuenta?<a href="vistas/registro.php"> Registrate</a>
    </div>
    </div>
  </div>
  </div>

   </div>
  </div>
</div>

</body>
</html>