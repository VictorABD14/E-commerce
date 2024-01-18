<?php

include_once("usersession.php");


$usersession= new usersession();

$usersession->closesession();


header("location:../index.php");




?>