<?php include('./inc/header.php'); ?>
<div class="container">
	<main>
		<div class="row">
				<div class="twelve columns">
					<h1>Editar horarios</h1>
					<form action="./inc/processhorario.php" method="POST">
						<div class="ov">
							<table class="u-full-width">
								<thead>
									<tr>
										<th>&nbsp;</th>
										<th>D</th>
										<th>L</th>
										<th>M</th>
										<th>X</th>
										<th>J</th>
										<th>V</th>
										<th>S</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Desde</td>
										<?php for ($x = 0; $x < 7; $x++) { ?>
											<td>
											<input type="time" value="<?php 
												if ((isset($_SESSION['horarios'][$x][0]['desde'])) && ($_SESSION['horarios'][$x][0]['desde'] !== ":")) {
													echo $_SESSION['horarios'][$x][0]['desde'];
												} ?>" name="desde[]"></td>
										<?php } ?>
									</tr>
									<tr>
										<td>Hasta</td>
										<?php for ($x = 0; $x < 7; $x++) { ?>
											<td>
											<input type="time" value="<?php 
												if ((isset($_SESSION['horarios'][$x][0]['hasta'])) && ($_SESSION['horarios'][$x][0]['hasta'] !== ":")) {
													echo $_SESSION['horarios'][$x][0]['hasta'];
												} ?>" name="hasta[]"></td>
										<?php } ?>
									</tr>
									<tr>
										<td>Desde</td>
										<?php for ($x = 7; $x < 14; $x++) { ?>
											<td>
											<input type="time" value="<?php 
												if ((isset($_SESSION['horarios'][$x][1]['desde'])) && ($_SESSION['horarios'][$x][1]['desde'] !== ":")) {
													echo $_SESSION['horarios'][$x][1]['desde'];
												} ?>" name="desde[]"></td>
										<?php } ?>
									</tr>
									<tr>
										<td>Hasta</td>
										<?php for ($x = 7; $x < 14; $x++) { ?>
											<td>
											<input type="time" value="<?php 
												if ((isset($_SESSION['horarios'][$x][1]['hasta'])) && ($_SESSION['horarios'][$x][1]['hasta'] !== ":")) {
													echo $_SESSION['horarios'][$x][1]['hasta'];
												} ?>" name="hasta[]"></td>
										<?php } ?>
									</tr>
								</tbody>
							</table>
						</div>
						<button class="button button-primary" name="submit"><i class="fa fa-save v"></i> Guardar</button>
						<button class="button button-primary" type="reset">Deshacer <i class="fa fa-undo"></i></button>
					</form>
				</div>
			</div>
		</main>
	</div>

	<?php include('./inc/footer.php'); ?>