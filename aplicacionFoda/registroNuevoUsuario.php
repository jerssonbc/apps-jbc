<?php
	include('datos/conexion.php');
	$name=$_POST['nombre'];
	$apell=$_POST['apellido'];
	$empresa=$_POST['empresa'];
	$user=$_POST['usuario'];
	$cont=$_POST['password'];
	//-- Constula par insertar un usuario
	$conSql="INSERT INTO usuario values(null,'".$apell."','".$name."','".$user."','".$cont."')";
	$resInsertarU=mysqli_query($dbcon,$conSql); //ejecucion de la consulta
	//verificar si se inserto
	if($resInsertarU){
		//consulta par obtener el ID del 
		$conSqluser="SELECT USU_codigo FROM usuario WHERE USU_apellidos='".$apell."' and USU_nombre='".$name."' and USU_login='".$user."' and USU_password='".$cont."'";

		$resRegis=mysqli_query($dbcon,$conSqluser);


		$numRegistro=mysqli_num_rows($resRegis);

		if($numRegistro>0){
			$filaUser=mysqli_fetch_row($resRegis);
			$idUser=$filaUser[0];
			$conSqlempresa="INSERT INTO empresa values(null,'".$empresa."',$idUser)";

			$resInsertEmpresa=mysqli_query($dbcon,$conSqlempresa);

			if($resInsertEmpresa){
				echo "Se ha registrado correctamente";
				//consulta para extrar el codigo de la empresa registrada
				$sqlIdEmpres="SELECT EMP_codigo FROM EMPRESA WHERE USU_codigo=".$idUser." AND EMP_nombre='".$empresa."'";
				$resIdEmpres=mysqli_query($dbcon,$sqlIdEmpres);
				$filaIdEmpre=mysqli_fetch_row($resIdEmpres);

				session_start();
				$_SESSION['userCodigo']=$idUser;
				$_SESSION['apellido']=$apell;
				$_SESSION['nombre']=$name;
				$_SESSION['emprCodigo']=$filaIdEmpre[0];
				$_SESSION['emprNombre']=$empresa;

				header("Location:registrarDatos.php");
			}

		}else{
			echo "no exite usuario";
		}
	}else{
		echo "el usuario no se ha registrado";
	}


?>