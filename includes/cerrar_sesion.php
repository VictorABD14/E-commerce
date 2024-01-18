<?php

session_start();
session_unset();
   	  session_destroy();

   	  header('location:../vistas/login_modo_privilegiado.php');





?>