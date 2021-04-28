<?php 
	//session_start();

	if ( isset($_COOKIE['logged']) ) {
		//header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/crox/pages/dashboard/books.php");
	}else{
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BooBook - Register</title>
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

			<h1>Créer mon compte</h1>
			<small>Vous avez déjà un compte?<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/app/bookoob/controllers/auth/auth.controller.php?action=login"> Connectez vous </a></small>

			<form action="http://<?php echo $_SERVER['HTTP_HOST'] ?>/app/bookoob/controllers/auth/auth.controller.php" method="POST">
				<div class="form-group">
					<label>Nom complet</label>
					<input type="text" class="form-control" name="fullname">
				</div>
				<div class="form-group">
					<label>Nom d'utilisateur</label>
					<input type="text" class="form-control" name="username">
					<div style="color: red">
						<?php
							if (isset($_SESSION["auth_errors"]) AND !is_null($_SESSION["auth_errors"]["register"]["username"])) {
						?>
							<small> 
								<?php echo $_SESSION["auth_errors"]["register"]["username"]
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
				</div>
				<div class="form-group">
					<label>Confirmer mot de passe</label>
					<input type="password" class="form-control" name="confirm-password">
					<div style="color: red">
						<?php
							if (isset($_SESSION["auth_errors"]) AND !is_null($_SESSION["auth_errors"]["register"]["password"])) {
						?>
							<small> 
								<?php echo $_SESSION["auth_errors"]["register"]["password"]
								?>
							</small>
						<?php
							}
						?>
						
					</div>
				</div>
				<div class="form-group">
					<label>Date de naissance</label>
					<input type="date" class="form-control" name="birthday">
				</div>
				<div class="" style="margin-top: 20px">
					<div>
						<label>Sexe</label>
					</div>
					<input type="radio" value="H" name="sexe">
					<label>Homme</label>
					<input type="radio" value="F" name="sexe">
					<label>Femme</label>
				</div>
				
				<div class="form-group" style="margin-top: 50px">
					<input type="submit" name="register" value="Créer mon compte">
					
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