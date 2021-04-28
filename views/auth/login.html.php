<?php 
	//session_start();


	//Session already started in
	//the controller

	if ( isset($_COOKIE['logged']) OR isset($_SESSION['auth']['logged'] )) {
		header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/bookoob/controllers/user/users.controller.php?action=dashboard");
	}else{
		//See session
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BooBook - Login</title>
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/menu/primary.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/auth/styles.css">
</head>
<body>

	<div id="main">
		
		<?php
			include('../../views/components/menu-primary.php');
		?>

		<div id="auth-data-container">

			<h1>Connexion</h1>
			<small>Vous n'avez pas de compte?<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/app/bookoob/controllers/auth/auth.controller.php?action=register"> Créer votre compte</a></small>

			<form action="http://<?php echo $_SERVER['HTTP_HOST'] ?>/app/bookoob/controllers/auth/auth.controller.php" method="POST">
				<div class="form-group">
					<label>Nom d'utilisateur</label>
					<input type="text" class="form-control" name="username">
					<div style="color: red">
						<?php
							if (isset($_SESSION["auth_errors"]) AND isset($_SESSION["auth_errors"]["login"]["username"])) {
						?>
							<small> 
								<?php echo $_SESSION["auth_errors"]["login"]["username"]
								?>
							</small>
						<?php
							}
						?>
						
					</div>
				</div>
				<div class="form-group">
					<label>Mot de passe</label>
					<input type="password" class="form-control" name="password">
					<div style="color: red">
						<?php
							if (isset($_SESSION["auth_errors"]) AND isset($_SESSION["auth_errors"]["login"]["password"])) {
						?>
							<small> 
								<?php echo $_SESSION["auth_errors"]["login"]["password"]
								?>
							</small>
						<?php
							}
						?>
						
					</div>
				</div>
				<div class="check-group" style="margin-top: 50px">
					<input type="checkbox" name="remember-me">
					<label>Se souvenir de moi pendant une semaine</label>
					
				</div>
				<div class="form-group" style="margin-top: 50px">
					<input type="submit" name="login" value="Se connecter">
					
				</div>
			</form>

		</div>


	</div>

</body>
</html>

<?php

	
	//Start session
	
	unset($_SESSION['auth_errors'])
?>