<?php
// $conexion=new mysqli('localhost','root','','implantacion');



 //session_start();
 //$sesion=$_SESSION['user'];
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
   <link href="../plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
</head>

  <body class="  skin-blue-light sidebar-mini ">
    <header class="full-width NavBarP" >
    <div class="full-width NavBarP-Logo" style="background-color: #3c8dbc"> Tienda Online</div>
    <nav class="full-width NavBarP-Nav">
      <ul class="full-width list-unstyled" style="background-color: #3c8dbc">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="#!">Productos</a></li>
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
    
    <div class="content-wrapper" style="min-height: 502px;">
      <div class="content">
            <div class="row">
  <div class="col-lg-12">

    <h1>Producto</h1>
   
   <?php 
    
   include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();
   $id=$_GET['id'];

    $sql="SELECT * FROM producto where Id_producto='$id'";
      $query=$conexion->query($sql);

      while ($row=$query->fetch_assoc()) { ?>
    <table class="table table-bordered form-group col-md-6 ">
      
      <tr>
        <td><label style="font-size: 2.5rem;">Imagen</label><br>
       <img src="images/<?php echo $row['imagen_producto']  ?>" style="width: 40%; height: 10%;">
        </td>
      </tr>
      
      <tr>
        <td>
          <label style="font-size: 2.5rem;"> Nombre del producto :</label>
          <h3><?php echo $row['Nombre_producto'];  ?></h3>
          <!--<input type="text" name="" value="<?php echo $row['Primer_nombre'];  ?>" disabled class="form-control">-->
        </td>
      </tr>
      <tr>
        <td>
          <label style="font-size: 2.5rem;">Descripcion del producto</label>
          <h3><?php echo  $row['Descripcion_producto']; ?></h3>
        </td>
      </tr>

      <tr>
        <td>
          <label style="font-size: 2.5rem;"> Precio</label>
          <h3><?php echo  $row['Precio']; ?></h3>
        </td>
      </tr>

      <tr>
        <td>
           <label style="font-size: 2.5rem;"> Precio en dolares</label>
         <h3><?php echo  $row['Precio_dolares']; ?></h3>
        </td>
      </tr>
      


    </table>
  <?php } ?>
  </div>
</div>
</div>
</div>

</body>
</html>