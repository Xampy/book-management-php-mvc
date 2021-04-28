<?php 
	//session_start();

	//Session already started in the controller

	if ( isset($_SESSION["auth"]['logged']) ) {
		
	}else{
		header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/bookoob/controllers/auth/auth.controller.php");
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
</head>
<body>

	<div id="main">
		
		<?php
			include('../../views/components/menu-primary.php');
			include('../../views/components/menu-secondary.php');
		?>

		<div id="books-data-container">
			
			<div id="items-list-container">
				
				<div>
					<a href="http://<?php echo($_SERVER['HTTP_HOST'])  ?>/app/bookoob/controllers/user/users.controller.php?action=create">Ajouter un livre</a>
				</div>

				<div style="text-align: center;">
					<?php 
						if ( isset($_SESSION["book"]["create"]) )
							echo $_SESSION["book"]["create"]["message"] 
					?>
				</div>
				
				<h4><?php echo count($books);  ?> Arcticles</h4>

				<table>
					<thead>
						<th>Id</th>
						<th>Titre</th>
						<th>Auteur</th>
						<th>Description</th>						
						<th>Couverture</th>
						<th>Actions</th>

					</thead>
					<tbody>

						<?php 
							foreach ($books as $book) {
						?>

							<tr class="item-row">
								<td># <?php echo $book['book_id'];  ?> </td>
								<td><?php echo $book['title'];  ?></td>
								<td><?php echo $book['author'];  ?></td>
								<td><?php echo $book['description'];  ?></td>

								<td>
									<img src="http://<?php echo $_SERVER['HTTP_HOST'];  ?>/app/bookoob/storage/public/uploads/<?php echo $book['page_cover'];  ?>" width="100" height="100" style="border-radius: 50%">
								</td>
								<td class="book-action-container">
									<a class="item-update-link" href="#!">Modifier</a>

									<form class="delete-book-from" action="http://<?php echo($_SERVER['HTTP_HOST'])  ?>/app/crox/controllers/dashboard/delete-book.controller.php" method="POST">
										
										<input type="hidden" name="book-id" value="<?php echo $book['book_id'];  ?>" />
										<input class="item-delete-link" type="submit" name="submit" value="Muprimer" disabled />
									</form>
									
								</td>
								
							</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>

		</div>


	</div>

</body>
</html>

<?php
	unset( $_SESSION["book"]["create"] );
?>