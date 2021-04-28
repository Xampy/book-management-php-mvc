<div id="menu-primary">
	<div id="menu-primary-brand">
		<span>BooBook</span>
	</div>
	<div id="menu-primary-links">

		<?php

			if (isset($_SESSION['auth']["logged"]) AND  $_SESSION['auth']["logged"] == true) {
		?>
			<div style="display: flex; flex-direction: row; align-items: center; border-radius: 50%">

			<?php

				if ( strlen( $_SESSION['auth']['user-image'] ) > 0 ) {
					# code...
			?>
					<img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/app/bookoob/storage/public/uploads/<?php echo $_SESSION['auth']['user-image'];  ?>" width='50' height="50" style="border-radius: 50%;">
			<?php
				}else {
			?>
					<img src="http://localhost/app/bookoob/views/assets/images/default-user.png" width='50' height="50" style="border-radius: 50%;">

			<?php
				}
			?>

				<span style="margin-left: 10px"><?php echo $_SESSION['auth']["fullname"] ?></span>
			</div>
		<?php
			}else {
		?>
				<span><a class="menu-link" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/app/bookoob/controllers/auth/auth.controller.php?action=login" >Se connecter</a></span>

		<?php
			}

		?>


		
	</div>
</div>