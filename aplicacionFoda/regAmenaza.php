<?php 
	include("datos/conexion.php");
	session_start();
	$descAmenaza=$_POST['txtAmenaza'];

	$sqlInserAmenaza="INSERT INTO amenaza VALUES(null,'".$descAmenaza."',".$_SESSION['emprCodigo'].")";
	$resInserAmenaza=mysqli_query($dbcon,$sqlInserAmenaza);
	if($resInserAmenaza){
		header("Location:registrarDatos.php");
	}else{
		echo "Erro al guardar la amenaza";
		echo '<br><br>';
		echo("Error description: " . mysqli_error($dbcon));
		echo '<br><a href="registrarDatos.php">Volver al Registro de F,O,D,A</a>';

	}

 ?>