<?php

	DEFINE ('DB_USER', 'root');
	DEFINE ('DB_PASSWORD', '');
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_NAME', 'dbfoda');
	
	$dbcon = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) ;
	if(!$dbcon)
		die('Error en la Conexion: '.mysqli_connect_errno());

	mysqli_set_charset($dbcon, 'utf8');
		
?>