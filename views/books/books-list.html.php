<?php
	//session_start();
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

			//$books = null;
			//include('../controllers/books/books.controller.php');
			
		?>
		<div id="data-container" style="<?php
		

			if ( isset($_SESSION['auth']['logged']) ) {
				
			}else {
				echo "margin-top: 70px";
			}

			
		?>">
			
			<div id="left-container">

				<div id="search-div">
					<input type="search" name="search">
					<input type="submit" value="Rechercher">
				</div>

				<div id="categories-container">

					<h3>Categories</h3>
					<div>
						<h4>Littérrature</h4>
						<div class="category-item">
							<span>Drame</span>
							<span>Epopée</span>
							<span>Romantique</span>
							<span>AutoBiographie</span>
						</div>
						<h4>Sciences Fictions</h4>
						<div class="category-item">
							<span>Drame</span>
							<span>Epopée</span>
							<span>Romantique</span>
							<span>AutoBiographie</span>
						</div>
						<h4>Histoire</h4>
						<div class="category-item">
							<span>Drame</span>
							<span>Epopée</span>
							<span>Romantique</span>
							<span>AutoBiographie</span>
						</div>
					</div>
					
				</div>
				
			</div>

			<div id="right-container">

				<div id="up-items-container">
					<span class="up-item">Top</span>
					<span class="up-item">Recommandé</span>
					<span class="up-item">Plus vus</span>
				</div>
				
				<div id="books-list-container">


					<?php

						foreach ($books as $book) { 
					?>

					<div class="book-item-container">
						<img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/app/bookoob/storage/public/uploads/<?php echo $book['page_cover'];  ?>" width="230" height="300">
						<div class="book-item-description">
							<h4><?php echo $book['author'];  ?></h4>
							<p>
								<?php echo $book['description'];  ?>
							</p>

							<p>4 stars</p>
						</div>
						<div class="book-item-more">
							<a href="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/app/bookoob/controllers/books/books.controller.php?action=book&amp;image=<?php echo $book['page_cover'];  ?>&amp;author=<?php echo $book['author'];  ?>&amp;title=<?php echo $book['title'];  ?>">Read</a>
						</div>
					</div>

					<?php
						}
					?>
					
				</div>

			</div>

		</div>


	</div>
</body>
</html>