<?php
//session_start();

include("./includes/db.php");


if (isset($_SESSION['user'])) {

	include_once('pagina-principal.php');
}

$connect=new db();
$conexion=$connect->conexion();
session_start();


$query=$conexion->query("SELECT * FROM producto");


$productos = array();
$n=0;
while($r=$query->fetch_object()){ $productos[]=$r; $n++;}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>PC SYSTEM</title>
  <link rel="shortcut icon" href="vistas/images/fondo.jfif" type="image/x-icon">
 <link rel="stylesheet" href="style.css"> 
  <link rel="stylesheet" type="text/css" href="assets/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="all.min.css">
  <link rel="stylesheet" href="extra.css">
</head>
<body>
  <header class="full-width NavBarP" >
    <div class="full-width NavBarP-Logo" style="background-color: #3c8dbc"> PC SYSTEM
  </div>
    <nav class="full-width NavBarP-Nav">
      <ul class="full-width list-unstyled" style="background-color: #3c8dbc">
        <li><a href="index.php">Inicio</a></li>
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

  <section class="banner" >
    <div class="banner-content banner-bg">
    </div>
  </section>
  
  <section class="full-width formated-section">
    <h2 class="text-center font-oswald">NUESTROS PRODUCTOS</h2><br>
    <div class="container">
      <div class="row">
      <?php 
        $sql="SELECT * FROM producto";
        $query=$conexion->query($sql);
       while($row = $query->fetch_assoc()) { ?>
        <div class="col-md-4">
          <div class="card">
          <img class="card-img-top" src="<?php echo "vistas/images/" . $row['imagen_producto']; ?>" alt="Product Image">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['Nombre_producto']; ?></h5>
              <p class="card-text"><?php echo $row['Descripcion_producto']; ?></p>
              <p class="card-text">Price: <?php echo $row['Precio']; ?></p>
            </div>
          </div>
        </div>
      <?php }; ?>
      </div>
    </div>
  </section>
  <script src="js/jquery-3.1.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>