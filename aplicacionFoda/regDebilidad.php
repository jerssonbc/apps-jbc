<?php 
	include("datos/conexion.php");
	session_start();
	$descDebilidad=$_POST['txtDebilidad'];

	$sqlInserDebilidad="INSERT INTO debilidad VALUES(null,'".$descDebilidad."',".$_SESSION['emprCodigo'].")";
	$resInserDebilidad=mysqli_query($dbcon,$sqlInserDebilidad);
	if($resInserDebilidad){
		//header("Location:registrarDatos.php");
		?><h2>Lista de Debilidades</h2>
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
	<?php }else{
		echo "Erro al guardar la Debilidad";
		echo '<br><br>';
		echo("Error description: " . mysqli_error($dbcon));
		echo '<br><a href="registrarDatos.php">Volver al Registro de F,O,D,A</a>';

	}

 ?>