<?php
	include('includes/header.php');

	if (!isset($_SESSION['idusers'])) {
		header('Location: index.php');
	} else {
		$onlineid = $_SESSION['idusers'];

		$sql = "SELECT * FROM `users` WHERE idusers = '$onlineid' ;";
		$rs = mysqli_query($db, $sql);

		$getdata = mysqli_fetch_array($rs);
	}
?>
			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<div class="row">
								<div class="4u 12u$(medium)">
									<?php
									if ($getdata['imglink'] != null) {
										echo "<div><img class='fit imgacc' src='" . $getdata['imglink']. "'> <div><a href='editaccount.php'>Cambiar foto <i class='fa fa-edit' aria-hidden='true'></i></a></div></div>";
									} else {
										echo "<div class='noimg'><a href='editaccount.php'>Ingresar foto de usuario <i class='fa fa-edit' aria-hidden='true'></i></a></div>";
									}
								?>
								</div>
								<div class="4u 12u$(medium)">
									<h2 class="accnick"><?php echo $getdata['nickname'];?></h2>
									<ul class="alt">
										<li>
											<i class='fa fa-steam' aria-hidden='true'></i>
												<?php
													if (isset($getdata['steam_acc'])) {
														echo "<a href='" . $getdata['steam_acc'] . "' target='_blank'>Tu perfil de Steam </a><a href='editaccount.php'><i class='fa fa-edit' aria-hidden='true'></i></a>";
													} else {
														echo "<a href='editaccount.php'>Ingresar perfil de Steam <i class='fa fa-edit' aria-hidden='true'></i></a>";
													}
												?>
											</i>
										</li>
									</ul>
								</div>
								<div class="4u$ 12u$(medium)">
									<h3>Deseando jugar...</h3>
									<?php
									$game = $getdata['idjuegos'];
									if ($game != '0') {
										$sql = "SELECT * FROM `juegos` WHERE idjuegos = '$game';";
                                    	$rs = mysqli_query($db,$sql);
                                    	$gamedata = mysqli_fetch_array($rs);
                                    	echo "<a href='".$gamedata['steam_link']."' target='_blank'><div class='imggamediv'><img src='".$gamedata['steam_img']."' class='imggame' /></div></a> &nbsp; <a href='editaccount.php'>Cambiar juego <i class='fa fa-edit' aria-hidden='true'></i></a>";
									} else {
										echo "<a href='editaccount.php'>Elegir juego <i class='fa fa-edit' aria-hidden='true'></i></a>";
									}
									?>
								</div>
							</div>
						</header>
						
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>

			<!-- One -->
				<section id="one" class="spotlight style1 top">
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="12u 12u$(medium) horariotitle">
										<h2>Horarios</h2>
										<div class="row">
												<div class="12u$ 12u$(medium)">
													<div class="table-wrapper">
														<table>
															<thead>
																<tr>
																	<th class="thalign"><a href="edithorario.php">Editar horarios<i class="fa fa-edit" aria-hidden="true"></i></a></th>
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
																    echo "<input type='time' value='" . $hdesde['hora_desde'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '2';";
																$rs = mysqli_query($db, $sql);
																$hdesde = mysqli_fetch_array($rs);
																if (isset($hdesde['hora_desde'])) {
																    echo "<input type='time' value='" . $hdesde['hora_desde'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '3';";
																$rs = mysqli_query($db, $sql);
																$hdesde = mysqli_fetch_array($rs);
																if (isset($hdesde['hora_desde'])) {
																    echo "<input type='time' value='" . $hdesde['hora_desde'] . "' />";
																} else {
															    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '4';";
																$rs = mysqli_query($db, $sql);
																$hdesde = mysqli_fetch_array($rs);
																if (isset($hdesde['hora_desde'])) {
																    echo "<input type='time' value='" . $hdesde['hora_desde'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '5';";
																$rs = mysqli_query($db, $sql);
																$hdesde = mysqli_fetch_array($rs);
																if (isset($hdesde['hora_desde'])) {
																    echo "<input type='time' value='" . $hdesde['hora_desde'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '6';";
																$rs = mysqli_query($db, $sql);
																$hdesde = mysqli_fetch_array($rs);
																if (isset($hdesde['hora_desde'])) {
																    echo "<input type='time' value='" . $hdesde['hora_desde'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '7';";
																$rs = mysqli_query($db, $sql);
																$hdesde = mysqli_fetch_array($rs);
																if (isset($hdesde['hora_desde'])) {
																    echo "<input type='time' value='" . $hdesde['hora_desde'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
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
																    echo "<input type='time' value='" . $hhasta['hora_hasta'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '2';";
																$rs = mysqli_query($db, $sql);
																$hhasta = mysqli_fetch_array($rs);
																if (isset($hhasta['hora_hasta'])) {
																    echo "<input type='time' value='" . $hhasta['hora_hasta'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '3';";
																$rs = mysqli_query($db, $sql);
																$hhasta = mysqli_fetch_array($rs);
																if (isset($hhasta['hora_hasta'])) {
																    echo "<input type='time' value='" . $hhasta['hora_hasta'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '4';";
																$rs = mysqli_query($db, $sql);
																$hhasta = mysqli_fetch_array($rs);
																if (isset($hhasta['hora_hasta'])) {
																    echo "<input type='time' value='" . $hhasta['hora_hasta'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '5';";
																$rs = mysqli_query($db, $sql);
																$hhasta = mysqli_fetch_array($rs);
																if (isset($hhasta['hora_hasta'])) {
																    echo "<input type='time' value='" . $hhasta['hora_hasta'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '6';";
																$rs = mysqli_query($db, $sql);
																$hhasta = mysqli_fetch_array($rs);
																if (isset($hhasta['hora_hasta'])) {
																    echo "<input type='time' value='" . $hhasta['hora_hasta'] . "' />";
																} else {
																    echo "<input type='time' value='-' />";
																}
																?></td>
																<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$onlineid' AND dia = '7';";
																$rs = mysqli_query($db, $sql);
																$hhasta = mysqli_fetch_array($rs);
																if (isset($hhasta['hora_hasta'])) {
																	echo "<input type='time' value='" . $hhasta['hora_hasta'] . "' />";
																} else {
																	echo "<input type='time' value='-' />";
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
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--<a href="#footer" class="goto-next scrolly">Next</a>-->
				</section>


<!-- INCLUDE FOOTER-->
			<?php 
			include('includes/footer.php');
			?>