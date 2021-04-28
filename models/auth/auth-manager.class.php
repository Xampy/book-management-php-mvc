<?php

	include_once('auth-manager.interface.php');
	include_once('../../models/database.init.php');

	/**
	  * Authentication management
	  * Login a user
	  * Register a user
	  * 
	  */
	 class AuthManager implements AuthManagerInterface {
	 	
	 	function __construct()
	 	{
	 		//
	 	}
	 	


	 	/*
		 * Check user username and password
		 * @param username
		 * @param $pass
		 * 
		 * @return <UserArray | Errors | null>  
		 *
	 	*/
		public function loginUser($username, $pass) {

			global $database;


			//We return user informations if we've got a
			//user
			$userInformations = array();
			$errors = array();
			$dataType = "failure";

			if (isset($database) AND !is_null($database)) {
				/*$userRequest = $database->prepare('
					SELECT *
					FROM users
					INNER JOIN logins
					ON users.user_id = logins.user_id
					WHERE  users.username=:username AND logins.pass=:pass');*/

				$userRequest = $database->prepare('
					SELECT user_id, username, fullname, image
					FROM users
					WHERE username=:username');
				$userRequest->execute(
					array(
						"username" => $username
					)
				);
				$user = $userRequest->fetch();
				print_r( $userRequest->errorInfo() );

				if ($user) {
					//We have a user name
					$passRequest = $database->prepare('
						SELECT *
						FROM logins
						WHERE pass=:pass AND user_id=:id');
						
						$passRequest->execute(
							array(
								"pass" => $pass,
								"id" => $user["user_id"]
							)
						);

						$login = $passRequest->fetch();

						print_r( $passRequest->errorInfo() );

						if ($login) {
							//We have an authenticated user


							return array(
										"type" => "success",
										"data" => $user
							);

						}else {

							//The password is not correct
							$errors = array(
								"password" => "Mot de passe incorrect",
								"username" => ""
							);

							return array(
										"type" => "errors",
										"data" => $errors
							);
						}
				}else {
					//User name not found
					$errors = array(
								"username" => "Nom d'utilisateur incorrect",
								"password" => ""
							);

							return array(
										"type" => "errors",
										"data" => $errors
							);
				}
			}
						
		}




		public function registerUser($inputs){

			global $database;

			if (isset($database) AND !is_null($database)) {


				$insertUserrequest = $database->prepare(
					'INSERT INTO users(fullname, username, sexe, birthday)
					VALUES (:fullname, :username, :sexe, :birthday)');
				$insertUserrequest->execute(
					array(
						"fullname" => $inputs["fullname"],
						"username" => $inputs["username"],
						"sexe" => $inputs["sexe"],
						"birthday" => $inputs["birthday"]
					)
				);

				$insertUserrequest->closeCursor();

				$errors = $insertUserrequest->errorInfo(); 
				print_r($errors);

				if ($errors[0] =="00000" AND is_null($errors[1])) {
					
					$getUserIDrequest = $database->prepare(
						'SELECT user_id FROM users
						 WHERE fullname=:fullname AND username=:username');
					
					$getUserIDrequest->execute(
						array(
							"fullname" => $inputs["fullname"],
							"username" => $inputs["username"],
						)
					);

					$id = $getUserIDrequest->fetch()['user_id'];

					$errors = $getUserIDrequest->errorInfo(); 
					print_r($errors);

					$getUserIDrequest->closeCursor();

					$insertUserLoginrequest = $database->prepare(
						'INSERT INTO logins(pass, user_id)
						 VALUES (:pass, :user_id)');
					$insertUserLoginrequest->execute(
						array(
							"pass" => $inputs["password"],
							"user_id" => $id,
						)
					);

					//We saved the user with success
					return array(
						"type" => "success",
						"data" => array(
							"username" => $inputs["username"],
							"password" => $inputs["password"]
						)
					);

				}else {

					return array(
						"type" => "errors",
						"data" => array(
							"fullname" => "Vérifier votre nom ou le nom est déjà pris",
							"username" => "Ce nom d'utilisateur est déjà utilisé"
						)
					);
				}
			}


		}
	}