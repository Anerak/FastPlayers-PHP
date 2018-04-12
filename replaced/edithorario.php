<?php
	include('includes/header.php');

	if (!isset($_SESSION['idusers'])) {
		header('Location: index.php');
	}

?>
			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<div class="dcenter">
								<h2>Editar horarios</h2>
								<p>Dejalo vacío para borrar el horario</p>
							</div>
						</header>
						<section>
								<form method="post" action="includes/modhorario.php">
									<div class="row uniform 50%">
										<div class="12u$">
											<div class="select-wrapper">
												<select name="dia" required>
				                                    <option value="1">Domingo</option>
				                                    <option value="2">Lunes</option>
				                                    <option value="3">Martes</option>
				                                    <option value="4">Miércoles</option>
				                                    <option value="5">Jueves</option>
				                                    <option value="6">Viernes</option>
				                                    <option value="7">Sábado</option>
			                               		</select>
			                               	</div>
										</div>


										<div class="12u$">
											<div class="dleft"><h3>Hora desde</h3></div>
											<input type="time" name="hora_desde" id="hora_desde" placeholder="Hora desde"/>
										</div>
										<div class="12u$">
											<div class="dright"><h3>Hora hasta</h3></div>
											<input type="time" name="hora_hasta" id="hora_hasta" placeholder="Hora hasta"/>
										</div>
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" value="Guardar" class="special" /></li>
												<li><input type="reset" value="Reiniciar campos" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
					</div>
				</section>

			
<!-- INCLUDE FOOTER-->
			<?php 
			include('includes/footer.php');
			?>