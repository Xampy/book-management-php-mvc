<?php 

	if ( isset($_SESSION["auth"]['logged']) ) {
		
	}else{
		header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/crox/pages/auth/login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Crox products</title>
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/products.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/menu/primary.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/menu/secondary.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/dashboard/styles.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/dashboard/board.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/dashboard/products.css">
	<link rel="stylesheet" type="text/css" href="../../views/assets/css/dashboard/single-product.css">
</head>
<body>

	<div id="main">
		
		<?php
			include('../../views/components/menu-primary.php');
			include('../../views/components/menu-secondary.php');
		?>

		<div id="second-data-container">

			<h2>Ajout d'un livre</h2>

			<div id="data">
				<div id="image-container">
					 <img id="imageContainer" src="../assets/images/shoe.png" width="200" height="350">
				</div>
				<div id="update-from-container">

					<form action="http://<?php echo($_SERVER['HTTP_HOST'])  ?>/app/bookoob/controllers/books/books.controller.php" method="POST" enctype="multipart/form-data">
						<div class="from-group">
							<label>Titre</label>
							<input class="form-control" type="text" name="title" placeholder="book title" required>
						</div>
						<div class="from-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="book title" required></textarea>
						</div>
						<div class="from-group">
							<label>Nom de l'auteur</label>
							<input class="form-control" type="text" name="author" placeholder="author name" required>
						</div>
						<div class="from-group">
							<label>Page de couverture</label>
							<input class="form-control" type="file" onchange="changeFile(event)" name="page-cover" placeholder="cover image" required>
						</div>
						<div class="from-group">
							<label>Lien de boutique</label>
							<input class="form-control" type="text" name="shop-link" placeholder="shop link" required>
						</div>
						<div class="from-group">
							<input class="form-control submit-btn" type="submit" name="create" value="Créer mon livre" required >
						</div>
					</form>
					
				</div>
			</div>
			
			
		</div>


	</div>

	<script type="text/javascript">
		var imageInput = document.querySelector("input[type='file']");
		var imageContainer = document.getElementById('imageContainer');

		console.log(imageInput);
		console.log(imageContainer);


		var changeFile = function(event){
			imageContainer.src = URL.createObjectURL(imageInput.files[0]);
		}


	</script>

</body>
</html>