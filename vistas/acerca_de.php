<?php
//session_start();

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Tienda virtual</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" type="text/css" href="../assets/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="../all.min.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap.css">
</head>
<body style="background-color: #ecf0f5;">
  <header class="full-width NavBarP" >
    <div class="full-width NavBarP-Logo" style="background-color: #3c8dbc"> Tienda Online</div>
    <nav class="full-width NavBarP-Nav">
      <ul class="full-width list-unstyled" style="background-color: #3c8dbc">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="#!">Busqueda</a></li>
        <li><a href="#!">Acerca de</a></li>
        <li>
          <a href="pagina-principal.php" class="btn-login"><i class="fa fa-user" aria-hidden="true"></i> Log In</a>
          <div class="full-width Login">
            <p class="text-center">
              <form action="">
                <div class="form-group">
                  <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> E-mail</label>
                  <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                  <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> Contraseña</label>
                  <input type="text" class="form-control" name="password" id="password">
                </div>
                <a href="#!">No recuerdo mi contraseña</a>
                <br>
                <p class="text-center">
                  <a href="#!" class="btn btn-danger btn-login" style="display:inline-block !important;">CANCELAR</a>
                  <button type="submit" class="btn btn-primary">INICIAR SESIÓN</button>
                </p>
              </form>
              <hr>
              <p class="text-center">¿Aún no tienes cuenta?</p>
              <a href="#!">CRÉATE UNA GRATIS</a>
            </p>
          </div>
        </li>
      </ul>
    </nav>
    <i class="fa fa-bars visible-xs btn-menuMobile ShowMenuMobile" aria-hidden="true"></i>
  </header>

  
 
  <section >

<h1 style="text-align: center;">¿Quienes somos?</h1>

<p style="text-align: center;font-size: 3em;">Somos una empresa dedicada XXXXXXXXXX XXXXXXXXX XXXXXXXX XXXXXXX XXXXXX XXXXXXXXXXXXXXXX XXXXXXXXXXXXXXXXXXX   XXXXXXXXXXXXXXX XXXXXXXXXX</p>



  <p style="margin-left: 10px;"><strong> Contacto : </strong></p>
  
  <i class="fa-brands fa-whatsapp" style="margin-left: 10px;size: 10em;"> +58 XXXX-XXXXXX</i>
  <br>

   <i class="fa-brands fa-instagram" style="margin-left: 10px;">   XXXX-XXXXXX</i>
   <br>

   <i> <strong> Correo:xxxxxxx@gmail.com </strong> </i>

   <div style="margin-top: 50px;text-align: center;">
     Direccion:<strong> XXXXXXXX XXXXXXXX XXXXXXX XXXXXXX </strong>
   </div>

  
  

    
  </section>
  <script src="../js/jquery-3.1.0.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>
</body>
</html>