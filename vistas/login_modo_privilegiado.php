<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../main.css">
     <link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
     <link rel="shortcut icon" href="./images/fondo.jfif" type="image/x-icon">
     <link rel="stylesheet" href="../extra.css">

     <style type="text/css">
          body{
          }
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
</head>
<body >
     
     <div class="banner-bg"  style="width: 100%; height: 100%; padding-top: 40px">
	<form action="../includes/login_privilegiado.php" method="POST">

     <h2>Iniciar Sesion</h2>
     

     <p>Nombre de usuario: <br>

     <input type="text" name="username"></p>

     <pa>Password:<br>
     	<input type="Password" name="password">
          <br>
          <br>
     	<p class="center"><input type="submit" value="Iniciar Sesion" name="login" style="cursor: pointer; "></p>


     </form>

     <div class="row mt-4 d-flex justify-content-center align-items-center">
  <a href="../pagina-principal.php" class="btn">Regresar</a>

  </div>
     </div>
    

</body>
</html>