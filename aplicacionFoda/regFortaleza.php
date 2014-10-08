<?php 
	include("datos/conexion.php");
	session_start();
	$descFortalezas=$_POST['txtFortaleza'];

	$sqlInserFortaleza="INSERT INTO fortaleza VALUES(null,'".$descFortalezas."',".$_SESSION['emprCodigo'].")";
	$resInserFortaleza=mysqli_query($dbcon,$sqlInserFortaleza);
	if($resInserFortaleza){
		//header("Location:registrarDatos.php");
							?><h2>Lista de Fortalezas</h2>
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
	<?php }else{
		echo "Erro al guardar la fortaleza";
		echo '<br><br>';
		echo("Error description: " . mysqli_error($dbcon));
		echo '<br><a href="registrarDatos.php">Volver al Registro de F,O,D,A</a>';

	}

 ?>