<?php
	include('includes/header.php');
$valid = true;
if (isset($_SESSION['idusers'])) {
    
     //Si ya esta logeado, se redirige al index.php
    header('Location: ../index.php');
    
    
} else {
   //Si no esta logeado, se procede a comparar
   if (isset($_REQUEST['email']) && isset($_REQUEST['passw'])) {
    	$email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    	$passw = md5($_REQUEST['passw'] . "2j5");
	    $sql = "SELECT * FROM users WHERE email = '$email' AND '$passw';";
	    $rs = mysqli_query($db,$sql);
	    $getid = mysqli_fetch_array($rs);
	    $comparepass = $getid['passw'];
	    //Verificacion
	    if ($passw == $comparepass) {
	        $_SESSION['idusers'] = $getid['idusers'];
	        $_SESSION['nickname'] = $getid['nickname'];
	        $_SESSION['imglink'] = $getid['imglink'];
	        $_SESSION['idjuegos'] = $getid['idjuegos'];
	        header('Location: ../index.php');
	    } else {
	        $valid = false;
	    }
   }
}

?>
			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2>Iniciar sesión</h2>
							<p>Es bueno verte de nuevo :P
							</p>
						</header>
						<section>
								<form method="post" action="login.php">
									<div class="row uniform 50%">
										<div class="12u$">
											<input type="email" name="email" id="email" placeholder="Email" required/>
										</div>
										<div class="12u$">
											<input type="password" name="passw" id="passw" placeholder="Password" required/>
										</div>
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" value="Iniciar sesión" class="special" /></li>
												<li><input type="reset" value="Reiniciar campos" /></li>
											</ul>
										</div>
										<?php
										if (!$valid) {
											echo "<div class='dcenter'><h3>Datos inválidos</h3></div>";
										}
										
										?>
									</div>
								</form>
							</section>
					</div>
				</section>

			
<!-- INCLUDE FOOTER-->
			<?php 
			include('includes/footer.php');
			?>