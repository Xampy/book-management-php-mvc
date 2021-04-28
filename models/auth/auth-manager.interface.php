<?php


	interface AuthManagerInterface {
		public function loginUser($username, $pass);
		public function registerUser($inputs);
	}