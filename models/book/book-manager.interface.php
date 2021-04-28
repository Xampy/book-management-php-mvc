<?php

	interface BookManagerInterface {
		public function getBooks();
		public function createBook($inputs);


		public function getBooksByUserId($id);

	}