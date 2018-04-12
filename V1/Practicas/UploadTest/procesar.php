<?php 
if ($_FILES) {
	$carpeta = "uploads/";
	$id_usuario = '1538';
	$destino = $carpeta . $id_usuario . '.jpg';	
	move_uploaded_file($_FILES['imagen']['tmp_name'], $destino) ;
	?>
	<meta charset='UTF-8';>
	Datos del archivo:<br />
	Tipo:  <?php echo $_FILES['imagen']['type']; ?><br />
	Tama�o:  <?php echo $_FILES['imagen']['size']; ?><br />
	<?php 
	if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/png") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg")) {
		?>
			<img src="<?php echo $destino; ?>" >
		<?php
	}
}
?>
