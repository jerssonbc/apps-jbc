<?php 
	include("datos/conexion.php");
	session_start();
	$descOportunidad=$_POST['txtOportunidad'];

	$sqlInserOportunidad="INSERT INTO oportunidad VALUES(null,'".$descOportunidad."',".$_SESSION['emprCodigo'].")";
	$resInserOportunidad=mysqli_query($dbcon,$sqlInserOportunidad);
	if($resInserOportunidad){
		//header("Location:registrarDatos.php");
		?><h2>Lista de Oportunidades</h2>
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
	<?php }else{
		echo "Erro al guardar la Oportunidad";
		echo '<br><br>';
		echo("Error description: " . mysqli_error($dbcon));
		echo '<br><a href="registrarDatos.php">Volver al Registro de F,O,D,A</a>';

	}

 ?>