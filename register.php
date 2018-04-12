<?php
	include('includes/header.php');
$valid = true;
if (isset($_SESSION['idusers'])) {
        header('Location: ../index.php'); 
    } else {
        $nickname = filter_var($_REQUEST['nickname'], FILTER_SANITIZE_STRING);
        $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
        $passw = md5($_REQUEST['passw'] . "2j5");
    
        $sql = "SELECT * FROM users WHERE email = '$email' OR nickname = '$nickname';";
    
        $rs = mysqli_query($db,$sql);
        $r = mysqli_fetch_array($rs);
        
        if ($r) {
            $valid = false;
        
        } else {
            if ($nickname == $r['nickname']) {
            	
            } else {
                $into = "INSERT INTO `users` (`email`,`passw`,`nickname`) VALUES ('$email','$passw','$nickname');";
                $reg = mysqli_query($db, $into);
                $sql = "SELECT * FROM users WHERE email = '$email';";
                $rs = mysqli_query($db, $sql);
                $getid = mysqli_fetch_array($rs);
                $_SESSION['idusers'] = $getid['idusers'];
                $_SESSION['nickname'] = $getid['nickname'];
                header('Location: ../index.php');
        }
    } 
}

?>
			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2>Registrarse</h2>
							<p>Estas a un paso de formar parte de FastPlayers :D
							</p>
						</header>
						<section>
								<form method="post" action="register.php">
									<div class="row uniform 50%">
										<div class="6u 12u$(xsmall)">
											<input type="text" name="nickname" id="nickname" placeholder="Nickname" required/>
										</div>
										<div class="6u$ 12u$(xsmall)">
											<input type="email" name="email" id="email" placeholder="Email" required/>
										</div>
										<div class="12u$">
											<input type="password" name="passw" id="passw" placeholder="Password" required/>
										</div>
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" value="Registrarse" class="special" /></li>
												<li><input type="reset" value="Reiniciar campos" /></li>
											</ul>
										</div>
										<?php
										if (!$valid) {
											echo "<div class='dcenter'><h3>El e-mail o nickname ya están registrados</h3></div>";
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