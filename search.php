<?php
	include('includes/header.php');
?>
			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2>Buscar</h2>
							<p>Aquí se encuentra la magia</p>
						</header>
						<section>
							<form method="get" action="search.php">
								<div class="row uniform 50%">
									<div class="12u$">
										<div class="search">
											<span class="fa fa-search"></span>
											<input type="search" name="search" id="search" placeholder="Buscar..." required/>
										</div>
									</div>
									<div class="12u$">
										<div class="select-wrapper">
											<select name="type-search">
												<option value="juego">Juego</option>
												<option value="user">Usuario</option>
											</select>
										</div>
									</div>
									<div class="12u$">
										<ul class="actions">
											<li><input type="submit" value="Buscar" class="special" /></li>
											<li><input type="reset" value="Reiniciar campos" /></li>
										</ul>
									</div>
								</div>
							</form>
						</section>
						
						
						<!--Search results-->
						<section>
							<div class="row">
								<div class="12u$">
									<?php
										if (isset($_GET['search'])) {
											$search = filter_var($_GET['search'], FILTER_SANITIZE_STRING);
											if (($search == '') || ($search == ' ')) {
												echo "<h2>Buen intento, pero intenta con datos existentes</h2>";
											} else {
												//Búscar por juegos
												if ($_GET['type-search'] == 'juego') {
													//Buscar juego en DB
													$dbgame = "SELECT * FROM `juegos` WHERE game_name LIKE '%$search%' ;";
													$dbrs = mysqli_query($db,$dbgame);
													$r = mysqli_fetch_array($dbrs);
													if ($r) {
														$gameid = $r['idjuegos'];
														//Buscar usuarios con ese juego
														$sql = "SELECT * FROM `users` WHERE idjuegos = '$gameid' OR para_jugar = '$gameid' OR own_game = '$gameid';";
														$rs2 = mysqli_query($db,$sql);
														if ($rs2) {
															echo "<div class='table-wrapper'>
															<table>
																<thead>
																	<th class='dcenter'>Usuario</th>
																	<th class='dcenter'>Domingo</th>
																	<th class='dcenter'>Lunes</th>
																	<th class='dcenter'>Martes</th>
																	<th class='dcenter'>Miércoles</th>
																	<th class='dcenter'>Jueves</th>
																	<th class='dcenter'>Viernes</th>
																	<th class='dcenter'>Sábado</th>
																</thead>";
															while ($row = mysqli_fetch_assoc($rs2)) {
																	// Fila Usuarios y Hora desde
																	echo "<tbody><tr>
																	<td class='dcenter'><a href='profile.php?idusers=". $row['idusers']."'><strong> ". $row['nickname'] ."</strong> </a></td>";
																	
																	//Hora desde - Domingo
																	echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
																	 $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '1';";
																	$rs = mysqli_query($db, $sql);
																	$hdesde = mysqli_fetch_array($rs);
																	if (isset($hdesde['hora_desde'])) {
																		echo $hdesde['hora_desde'] . "</td>";
																	} else {
																		echo '-' . "</td>";
																	}
																	// Hora desde - Lunes
																	echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
																	$sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '2';";
																	$rs = mysqli_query($db, $sql);
																	$hdesde = mysqli_fetch_array($rs);
																	if (isset($hdesde['hora_desde'])) {
																		echo $hdesde['hora_desde'] . "</td>";
																	} else {
																		echo '-' . "</td>";
																	}
																	// Hora desde - Martes
																	echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '3';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                // Hora desde - Miércoles
									                                echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '4';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                // Hora desde - Jueves
									                                echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '5';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                // Hora desde - Viernes
									                                echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '6';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                // Hora desde - Sábado
									                                echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '7';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td></tr>";
									                            	} else {
									                                    echo '-' . "</td></tr>";
									                                }



									                                //Fila de Hora Hasta
									                                echo "<tr><td class='dleft'>";
									                                if (!empty($row['husohorario'])) {
																			$searchhuso = "SELECT * FROM `husoshorarios` WHERE idhuso = ".$row['husohorario'].";";
																			$dbhuso = mysqli_query($db,$searchhuso);
																			$fetchhuso = mysqli_fetch_array($dbhuso);
																			echo $fetchhuso['text'];
																		} else {
																			echo "GMT no especificado";
																		}
																	echo "</td>";
									                                //Hora hasta - Domingo
									                                echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '1';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Lunes
									                                echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '2';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Martes
									                                echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '3';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Miercoles
									                                echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '4';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Jueves
									                                echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '5';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Viernes
									                                echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '6';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Sábado
									                                echo "<td class='dcenter'>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '7';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td></tr>";
									                            	} else {
									                                    echo '-' . "</td></tr>";
									                                }

															}
															echo "</tbody></table></div>";

														} else {
															echo "<h2>No hay resultados :(</h2>";
														}
													} else {
														echo "<h2>El juego no se encuentra en la base de datos</h2>";
													}
												}

												if ($_GET['type-search'] == 'user') {
													//Busqueda por usuario
													$dbuser = "SELECT * FROM `users` WHERE nickname LIKE '%$search%';";
													$dbrs = mysqli_query($db,$dbuser);
													if ($dbrs) {
														echo "<div class='table-wrapper'>
															<table>
																<thead>
																	<th>Usuario</th>
																	<th>Domingo</th>
																	<th>Lunes</th>
																	<th>Martes</th>
																	<th>Miércoles</th>
																	<th>Jueves</th>
																	<th>Viernes</th>
																	<th>Sábado</th>
																</thead>";
														while ($row = mysqli_fetch_assoc($dbrs)) {
														// Fila Usuarios y Hora desde
																	echo "<tbody><tr>
																	<td><a href='profile.php?idusers=". $row['idusers']."'> ". $row['nickname'] ." </a></td>";
																	
									                                //Hora desde - Domingo
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '1';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                // Hora desde - Lunes
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '2';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                // Hora desde - Martes
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '3';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                // Hora desde - Miércoles
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '4';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                // Hora desde - Jueves
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '5';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                // Hora desde - Viernes
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '6';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                // Hora desde - Sábado
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '7';";
									                                $rs = mysqli_query($db, $sql);
									                                $hdesde = mysqli_fetch_array($rs);
									                                if (isset($hdesde['hora_desde'])) {
									                                    echo $hdesde['hora_desde'] . "</td></tr>";
									                            	} else {
									                                    echo '-' . "</td></tr>";
									                                }



									                                //Fila de Hora Hasta
									                                echo "<tr><td></td>";
									                                //Hora hasta - Domingo
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '1';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Lunes
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '2';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Martes
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '3';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Miercoles
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '4';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Jueves
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '5';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Viernes
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '6';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td>";
									                            	} else {
									                                    echo '-' . "</td>";
									                                }
									                                //Hora hasta - Sábado
									                                echo "<td>";
																	$showid = $row['idusers'];
									                                $sql = "SELECT * FROM `horarios` WHERE idusers = '$showid' AND dia = '7';";
									                                $rs = mysqli_query($db, $sql);
									                                $hhasta = mysqli_fetch_array($rs);
									                                if (isset($hhasta['hora_hasta'])) {
									                                    echo $hhasta['hora_hasta'] . "</td></tr>";
									                            	} else {
									                                    echo '-' . "</td></tr>";
									                                }
														}
														echo "</tbody></table></div>";
													}
												}
											}
										}
									?>
								</div>
							</div>
						</section>
					</div>
				</section>

			
<!-- INCLUDE FOOTER-->
			<?php 
			
			include('includes/footer.php');
				
			?>