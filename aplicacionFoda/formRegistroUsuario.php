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
			<div class="span12">
				<form action="registroNuevoUsuario.php" method="POST" class="">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" required>
					<label for="apellido">Apellidos:</label>
					<input type="text" name="apellido" required>
					<label for="empresa">Empresa:</label>
					<input type="text" name="empresa" required>
					<label for="usuario">Usuario:</label>
					<input type="text" name="usuario" required>
					<br><br>
					<label for="password">Contraseña:</label>
					<input type="password" name="password" required>
					<br>
					<input type="submit" value="Registrame" class="btn">
					
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>