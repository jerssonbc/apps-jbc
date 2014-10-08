<?php
	include('datos/conexion.php');
	$user=$_POST['userID'];
	$pw=$_POST['pass'];
	$res=mysqli_query($dbcon,"SELECT USU_codigo,USU_apellidos,USU_nombre 
								FROM usuario WHERE USU_login='".$user."' AND USU_password='".$pw."'");
	$fil=mysqli_fetch_row($res);
	if($fil){
		$codeUser=$fil[0];
		$secondName=$fil[1];
		$name=$fil[2];

		$sqlIdEmpres="SELECT EMP_codigo,EMP_nombre FROM EMPRESA WHERE USU_codigo=".$codeUser;
		$resIdEmpres=mysqli_query($dbcon,$sqlIdEmpres);
		$filaIdEmpre=mysqli_fetch_row($resIdEmpres);

		//Asignando variables session
		session_start();
		$_SESSION['userCodigo']=$codeUser;
		$_SESSION['apellido']=$secondName;
		$_SESSION['nombre']=$name;
		$_SESSION['emprCodigo']=$filaIdEmpre[0];
		$_SESSION['emprNombre']=$filaIdEmpre[1];
		
		//echo "Si ingrese"." y soy".$_SESSION['apellido']." ".$_SESSION['nombre'];
		header("Location:registrarDatos.php");

	}else{
		echo "Usuario o Constraseña incorrecta";
		echo '<a href="index.php">Volver</a>';
	}

?>