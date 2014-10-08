<?php 
	include("datos/conexion.php");
	session_start();
	if($_SESSION == NULL)
		header("Location:index.php");
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
					<li class="active"><a href="#">Paso 1</a><span class="divider"> >>> </span></li>
					<li><a href="registrarEstrategias.php">Paso 2</a><span class="divider"> >>> </span></li>
					<li><a href="#">Paso 3</a><span class="divider"></span></li>
				</ul>
			</div>
		</div>
		<!--Registro de F,O,D, A-->
		<div class="row-fluid">
			<div class="span12">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab"  href="#fortalezas" >Fortalezas</a></li>
					<li><a data-toggle="tab" href="#oportunidades" >Oportunidades</a></li>
					<li><a  data-toggle="tab" href="#debilidades">Debilidades</a></li>
					<li><a data-toggle="tab" href="#amenazas" >Amenazas</a></li>
				</ul>
				<div class="tab-content">
					<!-- Tab Fortalezas-->
					<div id="fortalezas" class="tab-pane active">
						<!--Registro de Fortalezas-->
						<div class="span6 formfortalezas">
							<h2>Registre Fortalezas</h2>
							
							<form action="regFortaleza.php" method="POST" class="">
								<label for="txtFortaleza">Fortaleza: </label><br>
								<textarea name="txtFortaleza" id="txtFortaleza" required cols="30" rows="3" >
								
								</textarea><br>
								<input type="button" value="Registrar F" class="btn" onclick="javascript:ajaxFortaleza();">
							</form>
						</div>
						<!-- End Registo Fortalezas-->

						<!--Lista Fortalezas Ingresadas-->
						<div class="span6 listaFortalezas">
							<h2>Lista de Fortalezas</h2>
							<table class="table table-bordered table-striped table-hover table-condensed">
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
											<td></td>
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
						<!-- End Lista Fortalezas Ingresadas-->
					</div>
					<!-- End Tab Fortalezas-->
					<!-- Tab Oportunidades-->
					<div id="oportunidades" class="tab-pane">
						<!-- Registro Oportunidades-->
						<div class="span6 formoportunidades">
							<h2>Registre Oportunidades</h2>
							
							<form action="regOportunidad.php" method="POST" class="">
								<label for="txtOportunidad">Oportunidad: </label><br>
								<textarea name="txtOportunidad" id="txtOportunidad" cols="30" rows="3">
								
								</textarea><br>
								<input type="button" value="Registrar O" class="btn" onclick="javascript:ajaxOPortunidad();">
							</form>
						</div>
						<!-- End Registro Oportunidades -->
						<!--Lista Oportunidades Ingresadas-->
						<div class="span6 listaOportunidades">
							<h2>Lista de Oportunidades</h2>
							<table class="table table-bordered table-striped table-hover table-condensed">
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
												<td></td>
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
						<!-- End Lista Oportunidades Ingresadas-->
					</div>
					<!-- End Tab Oportunidades-->
					
					<!-- Tab Debilidade-->
					<div id="debilidades" class="tab-pane">
						<!-- Registro Debilidades-->
						<div class="span6 formdebilidades">
							<h2>Registre Debilidades</h2>
							
							<form action="#" method="POST" class="">
								<label for="txtDebilidad">Debilidad: </label><br>
								<textarea name="txtDebilidad" id="txtDebilidad" cols="30" rows="3">
								
								</textarea><br>
								<input type="button" class="btn" value="Registrar D" onclick="javascript:ajaxDebilidades();">
							</form>
						</div>
						<!-- End Registro Debilidades-->
						
						<!--Lista Debilidades Ingresadas-->
						<div class="span6 listaDebilidades">
							<h2>Lista de Debilidades</h2>
							<table class="table table-bordered table-striped table-hover table-condensed">
								<tr>
									<th>#</th>
									<th>Descripción</th>
									<th>-</th>
								</tr>
								<?php 
									$sqlDebilidades="SELECT * FROM debilidad WHERE EMP_codigo=".$_SESSION['emprCodigo'];
									$resDebilidades=mysqli_query($dbcon,$sqlDebilidades);
									$numDebilidades=mysqli_num_rows($resDebilidades);
									if($numDebilidades>0){
										$cont=1;
										while($filaDebilidades=mysqli_fetch_row($resDebilidades)){
											echo '<tr>
												<td>'.$cont.'</td>
												<td>'.$filaDebilidades[1].'</td>
												<td></td>
											</tr>';
											$cont++;
										}
									}else{
											echo '<tr>
													<td colspan="3">Ninguna Debilidad Registrada</td>
												</tr>';
											}
								 ?>
							</table>
							
						</div>
						<!-- End Lista DebilidadesIngresadas-->

					</div>
					<!-- Tab End Debilidades -->

					<!-- Tab Amenazas-->
					<div id="amenazas" class="tab-pane">
						<!-- Registro Amenazas-->
						<div class="span6 formamenazas">
							<h2>Registre Amenazas</h2>
							
							<form action="regAmenaza.php" method="POST" class="">
								<label for="txtAmenaza">Amenaza: </label><br>
								<textarea name="txtAmenaza" id="txtAmenaza" cols="30" rows="3">
								
								</textarea><br>
								<input type="submit" value="Registrar A" class="btn">
							</form>
						</div>
						<!-- end Registro Amenazas-->

						<!--Lista Amenazas Ingresadas-->
						<div class="span6 listaAmenazas">
							<h2>Lista de Amenazas</h2>
							<table class="table table-bordered table-striped table-hover table-condensed" >
								<tr>
									<th>#</th>
									<th>Descripción</th>
									<th>-</th>
								</tr>
								<?php 
									$sqlAmenazas="SELECT * FROM amenaza WHERE EMP_codigo=".$_SESSION['emprCodigo'];
									$resAmenazas=mysqli_query($dbcon,$sqlAmenazas);
									$numAmenazas=mysqli_num_rows($resAmenazas);
									if($numAmenazas>0){
										$cont=1;
										while($filaAmenazas=mysqli_fetch_row($resAmenazas)){
											echo '<tr>
												<td>'.$cont.'</td>
												<td>'.$filaAmenazas[1].'</td>
												<td></td>
											</tr>';
											$cont++;
										}
									}else{
											echo '<tr>
													<td colspan="3">Ninguna Amenaza Registrada</td>
												</tr>';
											}
								 ?>
							</table>
							
						</div>
						<!-- End Lista AmenazasIngresadas-->
					</div>
					<!-- End Tab Amenazas -->
				</div>
			</div>

		</div>
		<!-- End F, O, D,A-->
		
	</div>
	<script src="js/jquery-2.1.0.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        /*$().ready(function (){
            $("a").tooltip({
                placement: "bottom",
            });
        });*/
		$("#txtFortaleza").val('');
		$("#txtOportunidad").val('');
		$("#txtDebilidad").val('');


     </script>
     <script type="text/javascript">

     function ajaxFortaleza(){

     	if ($("#txtFortaleza").val()==''){
     		alert("Ingreso el texto de la fortaleza");
     		$("#txtFortaleza").val('');
     	}else{
     		var url="regFortaleza.php";
			$.ajax({
				url:url,
				data:{"txtFortaleza":$("#txtFortaleza").val()},
				contentType:"application/x-www-form-urlencoded",
				dataType:"html",//xml,html,script,json
				error:function(){
                    alert("ha ocurrido un error");
                },
				ifModified:false,
				processData:true,
				success:function(datas){
					$("#txtFortaleza").val('');
                    $(".listaFortalezas").html(datas);
                },
				type:"POST",
				timeout:3000
				
			});
		}

     }

      function ajaxOPortunidad(){
      	if ($('#txtOportunidad').val()==''){
      		alert("Ingreso el texto de la oportunidad");
      	}else{
      		var url="regOportunidad.php";
			$.ajax({
				url:url,
				data:{"txtOportunidad":$("#txtOportunidad").val()},
				contentType:"application/x-www-form-urlencoded",
				dataType:"html",//xml,html,script,json
				error:function(){
                    alert("ha ocurrido un error");
                },
				ifModified:false,
				processData:true,
				success:function(datas){
					$("#txtOportunidad").val('');
                    $(".listaOportunidades").html(datas);
                },
				type:"POST",
				timeout:3000
				
			});
      	} 	

     }

     function ajaxDebilidades(){
     	//var debilidad=$("#txtDebilidad").val();
     	if($("#txtDebilidad").val()== '')
     	{
     		alert("Ingreso el texto de la debilidad");
     		$("#txtDebilidad").val('');
     	}else{
     		var url="regDebilidad.php";
			$.ajax({
				url:url,
				data:{"txtDebilidad":$("#txtDebilidad").val()},
				contentType:"application/x-www-form-urlencoded",
				dataType:"html",//xml,html,script,json
				error:function(){
                    alert("ha ocurrido un error");
                },
				ifModified:false,
				processData:true,
				success:function(datas){
					alert("Registro de Debilidad Exitoso");
					$("#txtDebilidad").val('');
                    $(".listaDebilidades").html(datas);
                },
				type:"POST",
				timeout:3000
				
			});
		}


     }

     </script>

	
</body>
</html>