<?php
	include('includes/header.php');

	if (!isset($_SESSION['idusers'])) {
		header('Location: index.php');
	} else {
		$onlineid = $_SESSION['idusers'];

		$sql = "SELECT * FROM `users` WHERE idusers = '$onlineid' ;";
		$rs = mysqli_query($db, $sql);

		$getdata = mysqli_fetch_array($rs);


		if (isset($_REQUEST['submit'])) {
			
			if ((isset($_REQUEST['husohorario'])) && ($_REQUEST['husohorario'] != '0')) {
				$husohorario = $_REQUEST['husohorario'];
				$dbhuso = "UPDATE `users` SET husohorario = '$husohorario' WHERE idusers='$onlineid';";
				$dbcargarhuso = mysqli_query($db, $dbhuso);
			}
			$hddom = $_REQUEST['hddom'];
			$hhdom = $_REQUEST['hhdom'];

				if (empty($hddom) || empty($hhdom)) {
					$sql = "DELETE FROM `horarios` WHERE idusers = '$onlineid' AND dia = '1';";
					$delhorario = mysqli_query($db,$sql);
				} else {
						$check = "SELECT * FROM `horarios` WHERE idusers='$onlineid' AND dia = '1';";
						$checkhorario = mysqli_query($db,$check);
						$rhorario = mysqli_fetch_array($checkhorario);
						if (!$rhorario) {
							$cargarhorario = "INSERT INTO `horarios` (`idusers`, `dia`, `hora_desde`, `hora_hasta`) VALUES ('$onlineid', '1', '$hddom', '$hhdom');";
							$dbcargarhorario = mysqli_query($db,$cargarhorario);
						} else {
							$updatehorario = "UPDATE `horarios` SET hora_desde = '$hddom', hora_hasta = '$hhdom' WHERE idusers = '$onlineid' AND dia = '1';";
							$dbupdatehorario = mysqli_query($db,$updatehorario);
						}
					}

			$hdlun = $_REQUEST['hdlun'];
			$hhlun = $_REQUEST['hhlun'];

				if (empty($hdlun) || empty($hhlun)) {
					$sql = "DELETE FROM `horarios` WHERE idusers = '$onlineid' AND dia = '2';";
					$delhorario = mysqli_query($db,$sql);
				} else {
					$check = "SELECT * FROM `horarios` WHERE idusers='$onlineid' AND dia = '2';";
					$checkhorario = mysqli_query($db,$check);
					$rhorario = mysqli_fetch_array($checkhorario);
					
					if (!$rhorario) {
						$cargarhorario = "INSERT INTO `horarios` (`idusers`, `dia`, `hora_desde`, `hora_hasta`) VALUES ('$onlineid', '2', '$hdlun', '$hhlun');";
						$dbcargarhorario = mysqli_query($db,$cargarhorario);
					} else {
						$updatehorario = "UPDATE `horarios` SET hora_desde = '$hdlun', hora_hasta = '$hhlun' WHERE idusers = '$onlineid' AND dia = '2';";
						$dbupdatehorario = mysqli_query($db,$updatehorario);
					}
				}


			$hdmar = $_REQUEST['hdmar'];
			$hhmar = $_REQUEST['hhmar'];

				if (empty($hdmar) || empty($hhmar)) {
					$sql = "DELETE FROM `horarios` WHERE idusers = '$onlineid' AND dia = '3';";
					$delhorario = mysqli_query($db,$sql);
				} else {
					$check = "SELECT * FROM `horarios` WHERE idusers='$onlineid' AND dia = '3';";
					$checkhorario = mysqli_query($db,$check);
					$rhorario = mysqli_fetch_array($checkhorario);
					
					if (!$rhorario) {
						$cargarhorario = "INSERT INTO `horarios` (`idusers`, `dia`, `hora_desde`, `hora_hasta`) VALUES ('$onlineid', '3', '$hdmar', '$hhmar');";
						$dbcargarhorario = mysqli_query($db,$cargarhorario);
					} else {
						$updatehorario = "UPDATE `horarios` SET hora_desde = '$hdmar', hora_hasta = '$hhmar' WHERE idusers = '$onlineid' AND dia = '3';";
						$dbupdatehorario = mysqli_query($db,$updatehorario);
					}
				}

			$hdmie = $_REQUEST['hdmie'];
			$hhmie = $_REQUEST['hhmie'];

				if (empty($hdmie) || empty($hhmie)) {
					$sql = "DELETE FROM `horarios` WHERE idusers = '$onlineid' AND dia = '4';";
					$delhorario = mysqli_query($db,$sql);
				} else {
					$check = "SELECT * FROM `horarios` WHERE idusers='$onlineid' AND dia = '4';";
					$checkhorario = mysqli_query($db,$check);
					$rhorario = mysqli_fetch_array($checkhorario);
					
					if (!$rhorario) {
						$cargarhorario = "INSERT INTO `horarios` (`idusers`, `dia`, `hora_desde`, `hora_hasta`) VALUES ('$onlineid', '4', '$hdmie', '$hhmie');";
						$dbcargarhorario = mysqli_query($db,$cargarhorario);
					} else {
						$updatehorario = "UPDATE `horarios` SET hora_desde = '$hdmie', hora_hasta = '$hhmie' WHERE idusers = '$onlineid' AND dia = '4';";
						$dbupdatehorario = mysqli_query($db,$updatehorario);
					}
				}

			$hdjue = $_REQUEST['hdjue'];
			$hhjue = $_REQUEST['hhjue'];

				if (empty($hdjue) || empty($hhjue)) {
					$sql = "DELETE FROM `horarios` WHERE idusers = '$onlineid' AND dia = '5';";
					$delhorario = mysqli_query($db,$sql);
				} else {
					$check = "SELECT * FROM `horarios` WHERE idusers='$onlineid' AND dia = '5';";
					$checkhorario = mysqli_query($db,$check);
					$rhorario = mysqli_fetch_array($checkhorario);
					
					if (!$rhorario) {
						$cargarhorario = "INSERT INTO `horarios` (`idusers`, `dia`, `hora_desde`, `hora_hasta`) VALUES ('$onlineid', '5', '$hdjue', '$hhjue');";
						$dbcargarhorario = mysqli_query($db,$cargarhorario);
					} else {
						$updatehorario = "UPDATE `horarios` SET hora_desde = '$hdjue', hora_hasta = '$hhjue' WHERE idusers = '$onlineid' AND dia = '5';";
						$dbupdatehorario = mysqli_query($db,$updatehorario);
					}
				}

			$hdvie = $_REQUEST['hdvie'];
			$hhvie = $_REQUEST['hhvie'];

				if (empty($hdvie) || empty($hhvie)) {
					$sql = "DELETE FROM `horarios` WHERE idusers = '$onlineid' AND dia = '6';";
					$delhorario = mysqli_query($db,$sql);
				} else {
					$check = "SELECT * FROM `horarios` WHERE idusers='$onlineid' AND dia = '6';";
					$checkhorario = mysqli_query($db,$check);
					$rhorario = mysqli_fetch_array($checkhorario);
					
					if (!$rhorario) {
						$cargarhorario = "INSERT INTO `horarios` (`idusers`, `dia`, `hora_desde`, `hora_hasta`) VALUES ('$onlineid', '6', '$hdvie', '$hhvie');";
						$dbcargarhorario = mysqli_query($db,$cargarhorario);
					} else {
						$updatehorario = "UPDATE `horarios` SET hora_desde = '$hdvie', hora_hasta = '$hhvie' WHERE idusers = '$onlineid' AND dia = '6';";
						$dbupdatehorario = mysqli_query($db,$updatehorario);
					}
				}

			$hdsab = $_REQUEST['hdsab'];
			$hhsab = $_REQUEST['hhsab'];

				if (empty($hdsab) || empty($hhsab)) {
					$sql = "DELETE FROM `horarios` WHERE idusers = '$onlineid' AND dia = '7';";
					$delhorario = mysqli_query($db,$sql);
				} else {
					$check = "SELECT * FROM `horarios` WHERE idusers='$onlineid' AND dia = '7';";
					$checkhorario = mysqli_query($db,$check);
					$rhorario = mysqli_fetch_array($checkhorario);
					
					if (!$rhorario) {
						$cargarhorario = "INSERT INTO `horarios` (`idusers`, `dia`, `hora_desde`, `hora_hasta`) VALUES ('$onlineid', '7', '$hdsab', '$hhsab');";
						$dbcargarhorario = mysqli_query($db,$cargarhorario);
					} else {
						$updatehorario = "UPDATE `horarios` SET hora_desde = '$hdsab', hora_hasta = '$hhsab' WHERE idusers = '$onlineid' AND dia = '7';";
						$dbupdatehorario = mysqli_query($db,$updatehorario);
					}
				}
			}

		}


?>
			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<section>
							<div class="container">
								<div class="row">
									<form method=POST action="edithorario.php">
										<div class="12u 12u$(medium) horariotitle">
											<h2>Editar horarios</h2>
											<p>Dejalo vacío para borrar el horario</p>
												<div class="row">
													<div class="12u$ 12u$(medium)">
														<div class="table-wrapper">
															<table>
																<thead>
																	<tr>
																		<th class="thalign">
																			<div class="select-wrapper">
																				<select name="husohorario">
																					<option value="0"><?php
																					if ($getdata['husohorario'] != null) {
																						$searchhuso = "SELECT * FROM `husoshorarios` WHERE idhuso = ".$getdata['husohorario'].";";
																						$dbhuso = mysqli_query($db,$searchhuso);
																						$fetchhuso = mysqli_fetch_array($dbhuso);
																						echo $fetchhuso['text'];
																					} else {
																						echo "Huso horario";
																						
																					}
																					?></option>
																					<option value="1">GMT+1:00</option>
																					<option value="2">GMT+2:00</option>
																					<option value="3">GMT+3:00</option>
																					<option value="4">GMT+3:30</option>
																					<option value="5">GMT+4:00</option>
																					<option value="6">GMT+5:00</option>
																					<option value="7">GMT+5:30</option>
																					<option value="8">GMT+6:00</option>
																					<option value="9">GMT+7:00</option>
																					<option value="10">GMT+8:00</option>
																					<option value="11">GMT+9:00</option>
																					<option value="12">GMT+9:30</option>
																					<option value="13">GMT+10:00</option>
																					<option value="14">GMT+11:00</option>
																					<option value="15">GMT+12:00</option>
																					<option value="16">GMT-11:00</option>
																					<option value="17">GMT-10:00</option>
																					<option value="18">GMT-9:00</option>
																					<option value="19">GMT-8:00</option>
																					<option value="20">GMT-7:00</option>
																					<option value="21">GMT-6:00</option>
																					<option value="22">GMT-5:00</option>
																					<option value="23">GMT-4:00</option>
																					<option value="24">GMT-3:30</option>
																					<option value="25">GMT-3:00</option>
																					<option value="26">GMT-2:00</option>
																					<option value="27">GMT-1:00</option>
																				</select>
																			</div>
																		</th>
																		<th class="thalign">Domingo</th>
																		<th class="thalign">Lunes</th>
																		<th class="thalign">Martes</th>
																		<th class="thalign">Miércoles</th>
																		<th class="thalign">Jueves</th>
																		<th class="thalign">Viernes</th>
																		<th class="thalign">Sábado</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																	<tr>
																		<td>Hora desde</td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '1';";
																		$rs = mysqli_query($db, $sql);
																		$hdesde = mysqli_fetch_array($rs);
																		if (isset($hdesde['hora_desde'])) {
																		    echo "<input type='time' name='hddom' value='" . $hdesde['hora_desde'] . "' />";
																		} else {
																		    echo "<input type='time' name='hddom' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '2';";
																		$rs = mysqli_query($db, $sql);
																		$hdesde = mysqli_fetch_array($rs);
																		if (isset($hdesde['hora_desde'])) {
																		    echo "<input type='time' name='hdlun' value='" . $hdesde['hora_desde'] . "' />";
																		} else {
																		    echo "<input type='time' name='hdlun' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '3';";
																		$rs = mysqli_query($db, $sql);
																		$hdesde = mysqli_fetch_array($rs);
																		if (isset($hdesde['hora_desde'])) {
																		    echo "<input type='time' name='hdmar' value='" . $hdesde['hora_desde'] . "' />";
																		} else {
																	    	echo "<input type='time' name='hdmar' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '4';";
																		$rs = mysqli_query($db, $sql);
																		$hdesde = mysqli_fetch_array($rs);
																		if (isset($hdesde['hora_desde'])) {
																		    echo "<input type='time' name='hdmie' value='" . $hdesde['hora_desde'] . "' />";
																		} else {
																		    echo "<input type='time' name='hdmie' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '5';";
																		$rs = mysqli_query($db, $sql);
																		$hdesde = mysqli_fetch_array($rs);
																		if (isset($hdesde['hora_desde'])) {
																		    echo "<input type='time' name='hdjue' value='" . $hdesde['hora_desde'] . "' />";
																		} else {
																		    echo "<input type='time' name='hdjue' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '6';";
																		$rs = mysqli_query($db, $sql);
																		$hdesde = mysqli_fetch_array($rs);
																		if (isset($hdesde['hora_desde'])) {
																		    echo "<input type='time' name='hdvie' value='" . $hdesde['hora_desde'] . "' />";
																		} else {
																		    echo "<input type='time' name='hdvie' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '7';";
																		$rs = mysqli_query($db, $sql);
																		$hdesde = mysqli_fetch_array($rs);
																		if (isset($hdesde['hora_desde'])) {
																		    echo "<input type='time' name='hdsab' value='" . $hdesde['hora_desde'] . "' />";
																		} else {
																		    echo "<input type='time' name='hdsab' value='-' />";
																		}
																		?></td>
																	</tr>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																	<tr>
																		<td>Hora hasta</td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '1';";
																		$rs = mysqli_query($db, $sql);
																		$hhasta = mysqli_fetch_array($rs);
																		if (isset($hhasta['hora_hasta'])) {
																		    echo "<input type='time' name='hhdom' value='" . $hhasta['hora_hasta'] . "' />";
																		} else {
																		    echo "<input type='time' name='hhdom' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '2';";
																		$rs = mysqli_query($db, $sql);
																		$hhasta = mysqli_fetch_array($rs);
																		if (isset($hhasta['hora_hasta'])) {
																		    echo "<input type='time' name='hhlun' value='" . $hhasta['hora_hasta'] . "' />";
																		} else {
																		    echo "<input type='time' name='hhlun' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '3';";
																		$rs = mysqli_query($db, $sql);
																		$hhasta = mysqli_fetch_array($rs);
																		if (isset($hhasta['hora_hasta'])) {
																		    echo "<input type='time' name='hhmar' value='" . $hhasta['hora_hasta'] . "' />";
																		} else {
																		    echo "<input type='time' name='hhmar' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '4';";
																		$rs = mysqli_query($db, $sql);
																		$hhasta = mysqli_fetch_array($rs);
																		if (isset($hhasta['hora_hasta'])) {
																		    echo "<input type='time' name='hhmie' value='" . $hhasta['hora_hasta'] . "' />";
																		} else {
																		    echo "<input type='time' name='hhmie' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '5';";
																		$rs = mysqli_query($db, $sql);
																		$hhasta = mysqli_fetch_array($rs);
																		if (isset($hhasta['hora_hasta'])) {
																		    echo "<input type='time' name='hhjue' value='" . $hhasta['hora_hasta'] . "' />";
																		} else {
																		    echo "<input type='time' name='hhjue' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '6';";
																		$rs = mysqli_query($db, $sql);
																		$hhasta = mysqli_fetch_array($rs);
																		if (isset($hhasta['hora_hasta'])) {
																		    echo "<input type='time' name='hhvie' value='" . $hhasta['hora_hasta'] . "' />";
																		} else {
																		    echo "<input type='time' name='hhvie' value='-' />";
																		}
																		?></td>
																		<td><?php
																		$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '7';";
																		$rs = mysqli_query($db, $sql);
																		$hhasta = mysqli_fetch_array($rs);
																		if (isset($hhasta['hora_hasta'])) {
																			echo "<input type='time' name='hhsab' value='" . $hhasta['hora_hasta'] . "' />";
																		} else {
																			echo "<input type='time' name='hhsab' value='-' />";
																		}
																	?></td>
																	</tr>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																</tbody>
															</table>
													<input type="submit" value="Guardar" name="submit" class="special" />
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</section>
				</div>
			</section>

			
<!-- INCLUDE FOOTER-->
			<?php 
			include('includes/footer.php');
			?>