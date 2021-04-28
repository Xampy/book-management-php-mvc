<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Crox products</title>
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/products.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/menu/primary.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/menu/secondary.css">
</head>
<body>

	<div id="main">
		
		<?php
		
			include('../../views/components/menu-primary.php');

			if ( isset($_SESSION['auth']['logged']) ) {
				include('../../views/components/menu-secondary.php');
			}
			
		?>
		<div id="data-container" style="<?php
		

			if ( isset($_SESSION['auth']['logged']) ) {
				
			}else {
				echo "margin-top: 70px";
			}

			
		?>">
			
			<div id="left-container">
				
			</div>

			<div id="right-container">

				
				
				<div id="book-container">

					<img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/app/bookoob/storage/public/uploads/<?php echo $_GET['image'];  ?>" width="230" height="300">

					<div id="book-data-container">
						<h1><?php echo $_GET['title'];  ?></h1>
						<h3><?php echo $_GET['author'];  ?></h3>
						<p>
							description
						</p>
						 
					</div>


					
				</div>

			</div>

		</div>


	</div>
</body>
</html>