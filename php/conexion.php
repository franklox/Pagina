<?php
	$servidor="localhost";
	$nombreBd="fyelectronica";
	$usuario="root";
	$pass="Castillo2507";
	$conexion = new mysqli($servidor,$usuario,$pass,$nombreBd);
	if($conexion-> connect_error)
	{
		die("No se pudo conectar");
	}
?>