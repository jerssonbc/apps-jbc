<?php 
	session_start();
	include("datos/conexion.php");
	if($_SESSION == NULL)
		header("Location:index.php");
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Registro Estrategias FO,FA, DO, DA</title>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
</head>
<body>
	<div class="container">
		<div class="row-fluid">
			<!--header-->
			<div class="span12">
				<div class="page-header">
					<h3>Genera la Matriz DOFA de tu empresa "
						<?php 
							echo $_SESSION['emprNombre'];
						 ?>
						 " en 3 pasos
					 </h3>
					 <br>
					 <a href="cerrarSesion.php">Cerrar Sesión</a>
				</div>
			</div>
			<!--header-->
		</div>

		<div class="row-fluid">
			<div class="span12">
				<ul class="breadcrumb">
					<li class="active"><a href="registrarDatos.php">Paso 1</a><span class="divider"> >>> </span></li>
					<li><a href="registrarEstrategias.php">Paso 2</a><span class="divider"> >>> </span></li>
					<li><a href="#">Paso 3</a><span class="divider"></span></li>
				</ul>
			</div>
		</div>

		<!-- Registro Estrategias FO, FA, DO, DA-->
			<div class="row-fluid">
				<div class="span12">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab"  href="#fortalezas" >Estrategia FO</a></li>
						<li><a data-toggle="tab" href="#estrategiaFO" >Estrategia FA</a></li>
						<li><a  data-toggle="tab" href="#debilidades">Estrategia DO</a></li>
						<li><a data-toggle="tab" href="#amenazas" >Estrategia DA</a></li>
					</ul>
					<div class="tab-content">

						<!-- Tab EstrategiaFO-->
						<div id="estrategiaFO" class="tab-pane active">
							<!-- Form EstrategiaFO-->
							<form action="regEstrategiaFO.php" post="POST" class="">
								<div class="row-fluid">
									<div class="span12">
										<!--Table Fortalezas-->
										<div class="span6 listFortalezas">
											<!--<h3>ListaFortalezas</h3>-->
											<table class="table table-bordered table-striped table-hover table-condensed">
												<caption>Fortalezas</caption>
												<tr>
													<th>#</th>
													<th>Descripción</th>
													<th>-</th>
												</tr>
												<?php 
													$sqlFortalezas="SELECT * FROM fortaleza WHERE EMP_codigo=".$_SESSION['emprCodigo'];
													$resFortalezas=mysqli_query($dbcon,$sqlFortalezas);
													$numFortalezas=mysqli_num_rows($resFortalezas);
													if($numFortalezas>0){
														$cont=1;
														while($filaFortalezas=mysqli_fetch_row($resFortalezas)){
															echo '<tr>
																<td>'.$cont.'</td>
																<td>'.$filaFortalezas[1].'</td>
																<td><input type="checkbox" name="fortalezas[]" value="'.$filaFortalezas[0].'"></td>
															</tr>';
															$cont++;
														}
													}else{
															echo '<tr>
																	<td colspan="3">Ninguna Fortaleza Registrada</td>
																</tr>';
															}
												 ?>
											</table>

										</div>
										<!--End Table Fortalezas -->
										<!-- Table Oportunidades-->
										<div class="span6 listOportunidades">
											<table class="table table-bordered table-striped table-hover table-condensed">
												<caption>Oportunidades</caption>
												<tr>
													<th>#</th>
													<th>Descripción</th>
													<th>-</th>
												</tr>
												<?php 
													$sqlOportunidades="SELECT * FROM oportunidad WHERE EMP_codigo=".$_SESSION['emprCodigo'];
													$resOportunidades=mysqli_query($dbcon,$sqlOportunidades);
													$numOportunidades=mysqli_num_rows($resOportunidades);
													if($numOportunidades>0){
														$cont=1;
														while($filaOportunidades=mysqli_fetch_row($resOportunidades)){
															echo '<tr>
																<td>'.$cont.'</td>
																<td>'.$filaOportunidades[1].'</td>
																<td><input type="checkbox" name="oportunidades[]" value="'.$filaOportunidades[0].'"></td>
															</tr>';
															$cont++;
														}
													}else{
															echo '<tr>
																	<td colspan="3">Ninguna Oportunidad Registrada</td>
																</tr>';
															}
												 ?>
											</table>
										</div>
										<!-- End Table Oportunidade-->
										
									</div>
								</div>

								<div class="row-fluid">
									<div class="span12">
										<div class="span3"></div>
										<div class="span6">
											<!--Datos Estrategia FO -->
											<div class="datosEstrategiaFO">
													<label for="txtEstrategiaFO">Estrategia FO:</label>
													<textarea name="txtEstrategiaFO" id="txtEstrategiaFO" cols="30" rows="3"></textarea>
													<br>
													<input type="submit" class="btn" value="Registre E-FO">
												
											</div>
											<!--Datos Estrategia FO -->
										</div>
										<div class="span3"></div>
									</div>
								</div>
								
							</form>
							<!-- End Form EstrategiaFO -->


							

						</div>
						<!-- End Tab EstrategiaFO-->

					</div>
				</div>
			</div>
		<!-- End Registro Estrategia FO, FA, DO, DA-->

			

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