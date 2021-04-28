<?php
	
	//User controller
	//Manage connected user request
	

	session_start();



	if ( isset($_GET['action']) ) {


		//User request want the dashboard page
		if ( $_GET["action"] == "dashboard" ) {
			
			include_once('../../models/book/book-manager.class.php');
			$userBookManager = new BookManager();

			$books = $userBookManager->getBooksByUserId( $_SESSION["auth"]['user_id'] );
			//print_r($books);

			include_once("../../views/auth/dashboard/books.html.php");

		}elseif ( $_GET["action"] == "create" ) {

			//User request to create a new book


			include_once("../../views/auth/dashboard/create-book.html.php");

		}elseif ( $_GET["action"] == "update" ) {

			//User request to update his profile data

		}elseif ( $_GET["action"] == "update_image" ) {

			//User request to update his profile image

		}
	}