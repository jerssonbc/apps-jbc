<?php 
	session_start();
	if ($_SESSION != NULL) {
		header("Location:registrarDatos.php");
	}
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>AppFoda</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">

</head>
<body>
	<div class="container">
		<div class="row-fluid">
			<div class="span6">
				
			</div>
			<div class="span6">
				<form action="autentificarse.php" method="POST" class="">
					<label for="userID">Usuario:</label>
					<input type="text" name="userID" placeholder="Ingrese su usuario" required>
					<label for="pass">Contraseña:</label>
					<input type="password" name="pass" placeholder="Ingrese su contraseña" required>
					<br>
					<input type="submit" class="btn" value="Iniciar Sesión">
				</form>
				<br>
				¿No dispones de una cuenta? <a href="formRegistroUsuario.php"><strong>Registrate Ahora</strong></a>
			</div>
		</div>
	</div>
	<script src="js/jquery-2.1.0.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        $().ready(function (){
            $("a").tooltip({
                placement: "bottom",
            });
        });
       </script>
	
</body>
</html>