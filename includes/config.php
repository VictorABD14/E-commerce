<?php

class conexion 
{
	
	function conexion(){
		$conexion=new mysqli('localhost','root','','implantacion');
		return $conexion;
	}
}





?>