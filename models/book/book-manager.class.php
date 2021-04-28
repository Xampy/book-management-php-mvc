<?php

	include_once('book-manager.interface.php');
	include_once('../../models/database.init.php');
	
	/**
	 *  Book manager class
	 *  register all actions on a book
	 */
	class BookManager implements BookManagerInterface
	{
		
		function __construct()
		{
			# code...
		}

		public function getBooks() {
			global $database;

			#Check the set of the database
			if (isset($database) AND !is_null($database)) {
				$getBooksrequest = $database->prepare(
					'SELECT * FROM books LIMIT 10');
				$getBooksrequest->execute(
					array(
						
					)
				);


				$errors = $getBooksrequest->errorInfo();
				if(is_null($errors[1])){
					//Errors array is null
					//means that things go right
					return $getBooksrequest->fetchAll();
				}
				//We have errors from our database
				return false;
			}else {
				//Error on database initialization
				//or have not our database
				//we return false
				return false;
			}
		}


		/**
		 * create a new book
		 * @param $input book fillable field
		 *
		*/
		public function createBook($inputs){
			global $database;

			$insertBookrequest = $database->prepare(
				'INSERT INTO books(title, description, author, page_cover, shop_link, user_id)
				 VALUES (:title, :description, :author, :page_cover, :shop_link, :user_id)');


			

				$insertBookrequest->execute(
					array(
						"title" => $inputs["title"],
						"description" => $inputs["description"],
						"author" => $inputs["author"],
						"shop_link" => $inputs["shop_link"],
						"page_cover" => $inputs["page_cover"],
						"user_id" => $inputs["user_id"]
					)
				);



				$errors = $insertBookrequest->errorInfo();

				if(is_null($errors[1])){
					//Errors array is null
					//means that things go right
					return true;
				}

			return false;
		}





		public function getBooksByUserId($id) {
			global $database;

			#Check the set of the database
			if (isset($database) AND !is_null($database)) {
				$getBooksrequest = $database->prepare(
					'SELECT * FROM books WHERE user_id=:user_id LIMIT 10');

				$getBooksrequest->execute(
					array(
						"user_id" => $id
				));


				$errors = $getBooksrequest->errorInfo();
				if(is_null($errors[1])){
					//Errors array is null
					//means that things go right
					return $getBooksrequest->fetchAll();
				}
			}

			return false;
		}
	}