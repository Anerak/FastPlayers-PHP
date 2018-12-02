<?php
include('./inc/header.php');
?>

<main>
	<div class="container g t">
		<div class="row">
			<div class="twelve columns">
				<h1>
				<?php if(isset($_GET['error'])) {
					switch ($_GET['error']) {
					case 0:
						echo 'Ingrese datos para buscar';
						break;
					case 1:
						echo 'Error al buscar datos';
						break;
					default:
						// code...
						break;
					}
				}  else {?>
				Buscar <i class="fa fa-search"></i>
			<?php } ?>
			</h1>
				<form action="" method="get">
					<div class="row">
						<div class="five columns offset-by-one">
							<input type="search" class="u-full-width" name="n" placeholder="Ingrese el nombre de usuario" value="<?php if (isset($_GET['n'])) {
								echo $_GET['n'];
							} ?>">
						</div>
						<div class="five columns offset-by-half">
							<select name="g" class="u-full-width">
								<option value="0" <?php if (isset($_GET['g'])) {
									if ($_GET['g'] === '0') {
										echo 'selected';
									}
								} ?>>Todos</option>
								<option value="24240" <?php if (isset($_GET['g'])) {
									if ($_GET['g'] === '24240') {
										echo 'selected';
									}
								} ?>>PAYDAY:The Heist</option>
								<option value="620" <?php if (isset($_GET['g'])) {
									if ($_GET['g'] === '620') {
										echo 'selected';
									}
								} ?>>Portal 2</option>
								<option value="105600" <?php if (isset($_GET['g'])) {
									if ($_GET['g'] === '105600') {
										echo 'selected';
									}
								} ?>>Terraria</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="columns four offset-by-four">
							<button class="button button-primary u-full-width" name="ok" type="submit">Buscar <i class="fa fa-search"></i></button>
						</div>
					</div>
				</form>
				<div class="row ov">
					<div class="twelve columns">
						<?php if ((isset($_REQUEST['n'])) || (isset($_REQUEST['g']))) {
							include('./inc/sprocess.php');
						}?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include('./inc/footer.php'); ?>

