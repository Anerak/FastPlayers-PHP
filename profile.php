<?php
	include('includes/header.php');

	if (!isset($_SESSION['idusers'])) {
		header('Location: register.php');
	} else {
		$profid = $_GET['idusers'];

		$sql = "SELECT * FROM `users` WHERE idusers = '$profid' ;";
		$rs = mysqli_query($db, $sql);

		$getdata = mysqli_fetch_array($rs);
	}
?>
			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<div class="row">
								<div class="4u 12u$(medium) dcenter">
									<?php
									if ($getdata['imglink'] != null) {
										echo "<div><img class='fit imgacc' src='" . $getdata['imglink']. "'></div>";
									} else {
										echo "<div class='noimg'><h3>Sin imagen</h3></div>";
									}
								?>
								</div>
								<div class="4u 12u$(medium) dcenter">
									<h2 class="accnick"><?php echo $getdata['nickname'];?></h2>
									<ul class="alt">
										<li>
											<i class='fa fa-steam-square' aria-hidden='true'></i>
												<?php
													if (isset($getdata['steam_acc'])) {
														echo "<a href='" . $getdata['steam_acc'] . "' target='_blank'>Perfil de Steam</a>";
													} else {
														echo "Sin perfil de Steam :(";
													}
												?>
											</i>
										</li>
									</ul>
								</div>
								<div class="4u$ 12u$(medium) dcenter">
									<h3>Deseando jugar...</h3>
									<?php
									$game = $getdata['idjuegos'];
									$game2 = $getdata['para_jugar'];
									$game3 = $getdata['own_game'];
									
									if (($game == null) && ($game2 == null) && ($game3 == null)) {
										echo "<h3>Este usuario no ha elegido ningún juego :/</h3>";
									} else {
										if ($game != null) {
											$sql = "SELECT * FROM `juegos` WHERE idjuegos = '$game';";
	                                    	$rs = mysqli_query($db,$sql);
	                                    	$gamedata = mysqli_fetch_array($rs);
	                                    	echo "<a href='".$gamedata['steam_link']."' target='_blank'><div class='imggamediv'><img src='".$gamedata['steam_img']."' class='imggame' /></div></a>";
										}
										
										if ($game2 != null) {
											$sql = "SELECT * FROM `juegos` WHERE idjuegos = '$game2';";
	                                    	$rs = mysqli_query($db,$sql);
	                                    	$gamedata = mysqli_fetch_array($rs);
	                                    	echo "<a href='".$gamedata['steam_link']."' target='_blank'><div class='imggamediv'><img src='".$gamedata['steam_img']."' class='imggame' /></div></a>";
										}
									
									
										if ($game3 != null) {
											$sql = "SELECT * FROM `juegos` WHERE idjuegos = '$game3';";
											$rs = mysqli_query($db,$sql);
											$gamedata = mysqli_fetch_array($rs);
											echo "<a href='".$gamedata['steam_link']."' target='_blank'><div class='imggamediv'><img src='".$gamedata['steam_img']."' class='imggame' /></div></a>";
										}
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
									<?php
									if (!empty($getdata['husohorario'])) {
										$searchhuso = "SELECT * FROM `husoshorarios` WHERE idhuso = ".$getdata['husohorario'].";";
										$dbhuso = mysqli_query($db,$searchhuso);
										$fetchhuso = mysqli_fetch_array($dbhuso);
										
										echo "<h2>" .$fetchhuso['text'] . "</h2>";
									} else {
										echo "<h2>GMT no especificado</h2>";
									}
									?>
									<div class="row">
											<div class="12u$ 12u$(medium)">
												<div class="table-wrapper">
													<table>
														<thead>
															<tr>
																<th></th>
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
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '1';";
															$rs = mysqli_query($db, $sql);
															$hdesde = mysqli_fetch_array($rs);
															if (isset($hdesde['hora_desde'])) {
																echo $hdesde['hora_desde'];
															} else {
																echo "-";
															}
															?></td>
															<td><?php
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '2';";
															$rs = mysqli_query($db, $sql);
															$hdesde = mysqli_fetch_array($rs);
															if (isset($hdesde['hora_desde'])) {
																echo $hdesde['hora_desde'];
															} else {
																echo "-";
															}
															?></td>
															<td><?php
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '3';";
															$rs = mysqli_query($db, $sql);
															$hdesde = mysqli_fetch_array($rs);
															if (isset($hdesde['hora_desde'])) {
																echo $hdesde['hora_desde'];
															} else {
																echo "-";
															}
															?></td>
															<td><?php
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '4';";
															$rs = mysqli_query($db, $sql);
															$hdesde = mysqli_fetch_array($rs);
															if (isset($hdesde['hora_desde'])) {
																echo $hdesde['hora_desde'];
															} else {
																echo "-";
															}
															?></td>
															<td><?php
																$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '5';";
															$rs = mysqli_query($db, $sql);
															$hdesde = mysqli_fetch_array($rs);
															if (isset($hdesde['hora_desde'])) {
																echo $hdesde['hora_desde'];
															} else {
																echo "-";
															}
															?></td>
															<td><?php
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '6';";
															$rs = mysqli_query($db, $sql);
															$hdesde = mysqli_fetch_array($rs);
															if (isset($hdesde['hora_desde'])) {
																echo $hdesde['hora_desde'];
															} else {
																echo "-";
															}
															?></td>
															<td><?php
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '7';";
															$rs = mysqli_query($db, $sql);
															$hdesde = mysqli_fetch_array($rs);
															if (isset($hdesde['hora_desde'])) {
																echo $hdesde['hora_desde'];
															} else {
																echo "-";
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
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '1';";
															$rs = mysqli_query($db, $sql);
															$hhasta = mysqli_fetch_array($rs);
															if (isset($hhasta['hora_hasta'])) {
																echo $hhasta['hora_hasta'];
															} else {
																echo "-";
															}
															?></td>
															<td><?php
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '2';";
															$rs = mysqli_query($db, $sql);
															$hhasta = mysqli_fetch_array($rs);
															if (isset($hhasta['hora_hasta'])) {
																echo $hhasta['hora_hasta'];
															} else {
															echo "-";
															}
															?></td>
															<td><?php
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '3';";
															$rs = mysqli_query($db, $sql);
															$hhasta = mysqli_fetch_array($rs);
															if (isset($hhasta['hora_hasta'])) {
																echo $hhasta['hora_hasta'];
															} else {
																echo "-";
															}
															?></td>
															<td><?php
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '4';";
															$rs = mysqli_query($db, $sql);
															$hhasta = mysqli_fetch_array($rs);
															if (isset($hhasta['hora_hasta'])) {
																echo $hhasta['hora_hasta'];
															} else {
																echo "-";
															}
															?></td>
															<td><?php
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '5';";
															$rs = mysqli_query($db, $sql);
															$hhasta = mysqli_fetch_array($rs);
															if (isset($hhasta['hora_hasta'])) {
																echo $hhasta['hora_hasta'];
															} else {
																echo "-";
															}
															?></td>
															<td><?php
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '6';";
															$rs = mysqli_query($db, $sql);
															$hhasta = mysqli_fetch_array($rs);
															if (isset($hhasta['hora_hasta'])) {
																echo $hhasta['hora_hasta'];
															} else {
																echo "-";
															}
															?></td>
															<td><?php
															$sql = "SELECT * FROM `horarios` WHERE idusers = '$profid' AND dia = '7';";
															$rs = mysqli_query($db, $sql);
															$hhasta = mysqli_fetch_array($rs);
															if (isset($hhasta['hora_hasta'])) {
																echo $hhasta['hora_hasta'];
															} else {
																echo "-";
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