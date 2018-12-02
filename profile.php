<?php
include('./inc/header.php');
if (isset($_GET['id'])) {
	$idother = $_GET['id'];
} else {
	header('Location: login.php');
}


	try {
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$sql = "SELECT nickname, steam_acc, para_jugar, imglink, horarios FROM users WHERE idusers = '$idother';";
		$rs = mysqli_query($db, $sql);
		$r = mysqli_fetch_array($rs);
		if ($r) {
			$steamacc = $r['steam_acc'];			
			$ltp = $r['para_jugar'];
			$foo = $r['nickname'];
			$imglink= $r['imglink'];
			$otrohorarios = json_decode($r['horarios'], true);
		} else {
			throw new Exception('No entré');
		}
		

	} catch (Exception $e) {
		echo $e->getMessage();
	} finally {
		$db->close();
	}
?>

<main>
	<div class="container g t">
		<div class="row">
			<div class="four columns offset-by-half">
			<?php if ((isset($imglink)) && ($imglink !== "")) {?>
					<img src="<?php echo $imglink;?>" class="profileimg">
			<?php } else { ?>
				<i class="fa fa-image n r"></i>
			<?php } ?>
			</div>
			<div class="four columns offset-by-one">
				<h1 class="w"><i class="fa fa-user"></i> <?php echo $foo; ?></h1>
				<p>
				<?php if ((isset($steamacc)) && ($steamacc !== "")) {?>
					<a href="<?php $steamacc; ?>" class="r" target="blank"><i class="fab fa-steam b"></i> <?php echo $steamacc; ?></a>
				<?php } else { ?>
					<p>Sin cuenta de Steam</p>
				<?php } ?>
				</p>
				
			</div>
			<div class="two columns">
				<div>
					<?php if ((isset($ltp)) && ($ltp !== "0")) {?>
						<a href="https://store.steampowered.com/app/<?php echo $ltp; ?>" target="blank"><img class="lookingtoplay" src="http://cdn.akamai.steamstatic.com/steam/apps/<?php echo $ltp;?>/header.jpg"></a>
					<?php  } else {?>
							<i class="fa fa-cookie-bite n r"></i>
					<?php } ?>
				</div>
			</div>
		</div>
		<hr>
		<div class="row ov">
			<div class="twelve columns">
				<table class="u-full-width">
					<thead>
						<tr>
							<th></th>
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
								<td><?php if (isset($otrohorarios)) {
									if (($otrohorarios[$x][0]['desde'] !== ":") && ($otrohorarios[$x][0]['desde'] !== "")) {
										echo $otrohorarios[$x][0]['desde'];
									} else {
										echo "-";
									}
								} else {
									echo "-";
								}
								?></td>
							<?php } ?>
						</tr>
						<tr>
							<td>Hasta</td>
							<?php for ($x = 0; $x < 7; $x++){?>
								<td><?php if (isset($otrohorarios)) {
									if (($otrohorarios[$x][0]['hasta'] !== ":") && ($otrohorarios[$x][0]['hasta'] !== "")) {
										echo $otrohorarios[$x][0]['hasta'];
									} else {
									echo "-";
									}
								} else {
									echo "-";
								}
								?></td>
							<?php }?>
						</tr>

						<tr>
							<td>Desde</td>
							<?php for ($x = 7; $x < 14; $x++) {?>
								<td><?php if (isset($otrohorarios)) {
									if (($otrohorarios[$x][1]['desde'] !== ":") && ($otrohorarios[$x][1]['desde'] !== "")) {
										echo $otrohorarios[$x][1]['desde'];
									} else {
									echo "-"; }
								} else {
									echo "-";
								}?></td>
							<?php } ?>
						</tr>
						<tr>
							<td>Hasta</td>
							<?php for ($x = 7; $x < 14; $x++) { ?>
								<td><?php if (isset($otrohorarios)) {
									if (($otrohorarios[$x][1]['hasta'] !== ":") && ($otrohorarios[$x][1]['hasta'] !== "")) {
											echo $otrohorarios[$x][1]['hasta'];
										} else {
											echo "-";
										}
									} else {
										echo "-";
									}
								?></td>
							<?php } ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
<?php include('./inc/footer.php'); ?>