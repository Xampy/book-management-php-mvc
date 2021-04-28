<?php
	
	//Get books data from the database
	//We use the book manager
	
	session_start();

	include_once('../../models/book/book-manager.class.php');
	$bookManager = new BookManager();


	if ( isset($_GET['action']) ) {

		if ( $_GET['action'] == "books" ) {

			//Show books list
			$books = $bookManager->getBooks();


			//print_r($books);

			include_once('../../views/books/books-list.html.php');


		}else if ( $_GET['action'] == "book" ) {

			//Redrirect on the single view book view
			include_once('../../views/books/book-single.html.php');
		}

	}elseif ( isset($_POST['create']) ) {
		
		//User request to create a new book
		include_once('../../tools/file_process.php');

		//Process the image
		$image = handleFile('page-cover', $_SESSION['auth']["username"]);


		if ( is_null($image) ) {

			//Set error on image
			$_SESSION["book"]["create"]["message"] = "Une erreur s'est produite avec l'image";



		}else {


			$result = $bookManager->createBook(
				array(
					"title" => (string) $_POST['title'],
					"description" => (string) $_POST['description'],
					"author" => (string) $_POST['author'],
					"shop_link" => (string) $_POST['shop-link'],
					"page_cover" => $image,
					"user_id" => $_SESSION['auth']['user_id']

				)
			);

			//Successfully created
			if ($result) {
				
				//Set success create message
				$_SESSION["book"]["create"]["message"] = "Le livre a été enrégistré avec succès.";

			}else {


				//Set errors message
				$_SESSION["book"]["create"]["message"] = "Une erreur s'est produite";
			}

		}

		header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/bookoob/controllers/user/users.controller.php?action=dashboard");
	}
	
	